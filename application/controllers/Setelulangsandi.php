<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Objek untuk masuk mahasiswa
 */
class Setelulangsandi extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Setelulangsandi_model', 'setel_ulang_sandi');
        
        // Periksa apakah telah masuk sebegai calon mahasiswa
        if ($this->session->has_userdata('calon_mahasiswa')) {
            redirect('calon-mahasiswa/pendaftaran');
        }
	}
	
	/**
	 * Menampilkan halaman masuk mahasiswa
	 */
	public function index()
	{
		$input['email'] = $this->input->get('email', true);
		$input['kode'] = $this->input->get('kode', true);

        if ($input['email'] === null || $input['kode'] === null) {
            show_404();
            return;
        }

        $pengguna = $this->setel_ulang_sandi->dapatkanPengguna(
            $input['email'], $input['kode']
        );

        if (empty($pengguna)) {
            show_404();
            return;
        }

        if (time() > $pengguna->waktu_akhir) {
            show_404();
            return;
        }

        $this->inisiasiAturanFormulir();

        if (!$this->form_validation->run())
		{
			$data['csrf'] = [
				'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
			];

            $this->load->view('autentikasi/setel-ulang-sandi', $data);

			return;
		}

        $this->prosesKataSandi($pengguna);
	}

    private function inisiasiAturanFormulir()
    {
        $this->form_validation->set_rules(
			'kata_sandi', 'Kata Sandi', 'required|max_length[200]'
		);

		$this->form_validation->set_rules(
			'konfirmasi_kata_sandi', 'Konfirmasi Kata Sandi',
			'required|max_length[200]|matches[kata_sandi]'
		);
    }

    private function prosesKataSandi($pengguna)
    {
        // Dapatkan input
        $input['kata_sandi'] = $this->input->post('kata_sandi', true);
        
        // Ubah kata sandi calon mahasiswa
        $ubah_sandi = $this->setel_ulang_sandi->ubahPengguna(
            $pengguna->email, md5($input['kata_sandi'])
        );

        if (!$ubah_sandi) {
            $this->output->set_status_header(503);
			return;
        }

        $this->setel_ulang_sandi->hapusLupaSandi($pengguna->id);

        $this->load->view('autentikasi/setel-ulang-sandi-sukses');
    }
}
