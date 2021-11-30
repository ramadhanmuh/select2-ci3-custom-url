<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartuuj extends CI_Controller {

	public function __construct() {        
		parent::__construct();

        // Periksa apakah telah masuk sebegai calon mahasiswa
        if (!$this->session->has_userdata('calon_mahasiswa')) {
            redirect('?p=kartuuj');
        }

		$this->load->library('Zend');

		$this->load->model('Kartuuj_model', 'model');
	}

	public function index()
	{ 
		$data['gelombang'] = $this->model->dapatkanGelombangDenganWaktu(
			date('Y-m-d')
		);

		if (empty($data['gelombang'])) {
			show_404();
			return;
		}

		$data['pendaftaran'] = $this->model->dapatkanPendaftaranDenganIdGelombangIdCalonMahasiswa(
			$data['gelombang']->id, $this->session->calon_mahasiswa->id
		);

		if (empty($data['pendaftaran'])) {
			show_404();
			return;
		}

		$data['biodata'] = $this->model->dapatkanBiodataDenganIdPendaftaran(
			$data['pendaftaran']->id
		);

		$data['program_studi'] = $this->model->dapatkanProdiDenganIdPendaftaran(
			$data['pendaftaran']->id
		);

		if (empty($data['biodata']) || empty($data['program_studi'])) {
			show_404();
			return;
		}

		$data['kelompok'] = $this->model->dapatkanKelompokDenganId(
			$data['program_studi']->program_studi->id_kelompok
		);

		$data['tahun_ajar'] = $this->model->dapatkanTahunAjarDenganId(
			$data['gelombang']->id_tahun_ajar
		);

		$parseURL = parse_url(base_url('kartuuj'));

		$data['url'] = $parseURL['host'] . $parseURL['path'];

		$data['universitas'] = $this->model->dapatkanUniversitas();

		$this->zend->load('Zend/Barcode');

		// $data['barcode'] = Zend_Barcode::render(
		// 	'code128', 'image', 
		// 	[
		// 		'text' => $data['pendaftaran']->nomor_pra_registrasi
		// 	]
		// );

		$barcodeOptions = [
			'text' => $data['pendaftaran']->nomor_pra_registrasi,
			'barThickWidth' => 3,
			'barThinWidth' => 2
		];

		$rendererOptions = [];

		// $data['barcode'] = Zend_Barcode::draw('code128', 'image', $barcodeOptions, $rendererOptions);
		$imageResource = Zend_Barcode::factory('code128', 'image', $barcodeOptions, array())->draw();

		imagepng($imageResource, 'barcode/' . $data['pendaftaran']->nomor_pra_registrasi . '.png');

		$data['barcode'] = base_url('barcode/' . $data['pendaftaran']->nomor_pra_registrasi . '.png');

		// var_dump($data['barcode']);

        $this->load->view('cetak/kartu-ujian', $data);
	}

}