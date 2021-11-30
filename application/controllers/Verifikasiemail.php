<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Objek untuk masuk mahasiswa
 */
class Verifikasiemail extends CI_Controller {

	public function __construct() {
		parent::__construct();

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

        // var_dump($input);die;

        $this->load->model('Verifikasiemail_model', 'verifikasi_email');

        $pengguna = $this->verifikasi_email->dapatkanPengguna(
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

        $ubahPengguna = $this->verifikasi_email->ubahPengguna(
            $pengguna->id
        );

        if (!$ubahPengguna) {
            $this->output->set_status_header(503);
            return;
        }

        $hapusVerifikasiEmail = $this->verifikasi_email->hapusVerifikasiEmail(
            $pengguna->id
        );

        if (!$hapusVerifikasiEmail) {
            $this->output->set_status_header(503);
            return;
        }

        $this->load->view('autentikasi/verifikasi-sukses');
	}
}
