<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Lupakatasandi extends CI_Controller
{
    private $calon_mahasiswa;

    public function __construct() {
        parent::__construct();
        $this->calon_mahasiswa = null;
        $this->load->model('lupakatasandi_model', 'lupa_kata_sandi');

        require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
        
        // Periksa apakah telah masuk sebegai calon mahasiswa
        if ($this->session->has_userdata('calon_mahasiswa')) {
            redirect('calon-mahasiswa/pendaftaran');
        }
    }    

    public function index()
    {
        $this->buatAturanFormulir();

		if (!$this->form_validation->run()) {
			$data['csrf'] = [
				'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
			];

			$this->load->view('autentikasi/lupa-kata-sandi', $data);
			return;
		}

        $this->prosesLupaSandi();

    }

    private function prosesLupaSandi()
    {
        // Buat data lupa kata sandi
        $kode_lupa_sandi = buat_string_acak(30);

        $buat_lupa_kata_sandi = $this->lupa_kata_sandi->buatDataLupaSandi(
            [
                'id_calon_mahasiswa' => $this->calon_mahasiswa->id,
                'kode' => $kode_lupa_sandi,
                'waktu_akhir' => time() + (3 * 60 * 60)
            ]
        );

        if (!$buat_lupa_kata_sandi) {
            $this->output->set_status_header(503);
			return;
        }

        // Kirim Email
        $url_email = base_url('/setel-ulang-sandi');
        $url_email .= '?kode=' . $kode_lupa_sandi;
        $url_email .= '&email=' . urlencode($this->calon_mahasiswa->email);
        $view_email = $this->load->view(
            'email/lupa-kata-sandi', [
                'url' => $url_email
            ], true
        );

        $mail = new PHPMailer();
		
		// SMTP configuration
		$mail->isSMTP();	
		$mail->Host     = $this->config->item('email_host'); //sesuaikan sesuai nama domain hosting/server yang digunakan
		$mail->SMTPAuth = $this->config->item('email_auth');
		$mail->Username = $this->config->item('email_username'); // user email
		$mail->Password = $this->config->item('email_password'); // password email
		$mail->SMTPSecure = $this->config->item('email_SMPTPSecure');
		$mail->Port     = $this->config->item('email_port');

		$mail->setFrom($this->config->item('email_username'), ''); // user email
		$mail->addReplyTo($this->config->item('email_username'), ''); //user email

		// Add a recipient
		$mail->addAddress($this->calon_mahasiswa->email); //email tujuan pengiriman email

		// Email subject
		$mail->Subject = 'Lupa Kata Sandi'; //subject email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = $view_email;
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			// echo 'Message could not be sent.';
			// echo 'Mailer Error: ' . $mail->ErrorInfo;
			$this->daftar->hapusMahasiswa($id_mahasiswa);
			$this->output->set_status_header(503);
		} else {
			$this->load->view('autentikasi/lupa-kata-sandi-sukses');
		}
    }

    private function buatAturanFormulir()
    {
        $this->form_validation->set_rules(
			'email', 'Email',
			'required|valid_email|max_length[255]|callback_periksa_ketersediaan_email'
		);
    }

    public function periksa_ketersediaan_email($email = false)
    {
        if (!$email) {
            show_404();
            return;
        }

        $this->calon_mahasiswa = $this->lupa_kata_sandi->dapatkanAkunPerEmail(
            $email
        );

        if (empty($this->calon_mahasiswa)) {
            $this->form_validation->set_message(
                'periksa_ketersediaan_email',
                '{field} tidak ditemukan.'
            );
            return FALSE;
        }

        if (empty($this->calon_mahasiswa->waktu_verifikasi)) {
            $this->form_validation->set_message(
                'periksa_ketersediaan_email',
                '{field} belum diverifikasi.'
            );
            return FALSE;
        }

        return TRUE;
            
    }
}
