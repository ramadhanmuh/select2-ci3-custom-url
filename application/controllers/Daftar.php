<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Objek untuk daftar mahasiswa
 */
class Daftar extends CI_Controller {

	public function __construct() {
		parent::__construct();
		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';

		// Periksa apakah telah masuk sebegai calon mahasiswa
        if ($this->session->has_userdata('calon_mahasiswa')) {
            redirect('calon-mahasiswa/pendaftaran');
        }
	}
	
	/**
	 * Menampilkan halaman daftar mahasiswa
	 */
	public function index()
	{ 
		$this->buatAturanFormulir();

		if (!$this->form_validation->run())
		{
			$data['csrf'] = [
				'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
			];

			$this->load->view('autentikasi/daftar', $data);
			return;
		}

		$this->prosesRegistrasi();
	}

	/**
	 * Memproses input
	 */
	private function prosesRegistrasi()
	{
		$this->load->model('Daftar_model', 'daftar');

		$input = $this->dapatkanInputFormulir();

		// Buat data mahasiswa
		$id_mahasiswa = $this->daftar->buatPengguna($input);

		if (!$id_mahasiswa) {
			$this->output->set_status_header(503);
			return;
		}

		$kode_verifikasi = buat_string_acak(30);

		// Buat data verifikasi email berdasarkan data mahasiswa
		$buat_verifikasi = $this->daftar->buatVerifikasi(
			$id_mahasiswa, $kode_verifikasi
		);

		if (!$buat_verifikasi) {
			$this->daftar->hapusMahasiswa($id_mahasiswa);
			$this->output->set_status_header(503);
			return;
		}

		// Konfigurasi kirim email
		$this->load->library('email');
		$urlAktifkan = base_url('verifikasi-email');
		$urlAktifkan .= '?email=' . urlencode($input['email']);
		$urlAktifkan .= '&kode=' . $kode_verifikasi;

		$viewEmail = $this->load->view(
			'email/verification',
			[
				'url' => $urlAktifkan,
				'id_mahasiswa' => $id_mahasiswa
			],
			true
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
		// $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only

		$mail->setFrom($this->config->item('email_username'), ''); // user email
		$mail->addReplyTo($this->config->item('email_username'), ''); //user email

		// Add a recipient
		$mail->addAddress($input['email']); //email tujuan pengiriman email

		// Email subject
		$mail->Subject = 'Verifikasi Email'; //subject email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = $viewEmail;
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			$this->daftar->hapusMahasiswa($id_mahasiswa);
			$this->output->set_status_header(503);
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			// var_dump('gagal kirim email');die;
		} else {
			$this->load->view('autentikasi/daftar-sukses');
		}
		
	}

	/**
	 * Membuat aturan formulir
	 */
	private function buatAturanFormulir()
	{
		$this->form_validation->set_rules(
			'email', 'Email',
			'required|valid_email|max_length[255]|is_unique[calon_mahasiswa.email]'
		);
		
		$this->form_validation->set_rules(
			'kata_sandi', 'Kata Sandi', 'required|max_length[200]'
		);

		$this->form_validation->set_rules(
			'konfirmasi_kata_sandi', 'Konfirmasi Kata Sandi',
			'required|max_length[200]|matches[kata_sandi]'
		);
	}

	/**
	 * Mendapatkan input formulir
	 */
	private function dapatkanInputFormulir()
	{
		$input = [];

		$input['email'] = $this->input->post('email', true);

		$input['kata_sandi'] = md5(
			$this->input->post('kata_sandi', true)
		);

		return $input;
	}
}
