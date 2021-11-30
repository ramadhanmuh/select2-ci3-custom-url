<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

	public function __construct() {
        parent::__construct();

        // Periksa apakah telah masuk sebegai calon mahasiswa
        if (!$this->session->has_userdata('calon_mahasiswa')) {
            redirect('');
        }
	}
	
	/**
	 * Menampilkan halaman daftar mahasiswa
	 */
	public function index()
	{ 
        if ($this->input->method() !== 'post') {
            show_404();
            return;
        }

        unset($_SESSION['calon_mahasiswa']);
        redirect('');
	}
}
