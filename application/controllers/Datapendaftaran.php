<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Objek untuk daftar mahasiswa
 */
class Datapendaftaran extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Menampilkan halaman data pendaftaran calon mahasiswa
	 */
	public function index()
	{
		$this->load->view('data-pendaftaran/index');
	}
}
