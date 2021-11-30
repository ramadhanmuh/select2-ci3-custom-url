<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartureg extends CI_Controller {

	public function __construct() {        
		parent::__construct();

        // Periksa apakah telah masuk sebegai calon mahasiswa
        if (!$this->session->has_userdata('calon_mahasiswa')) {
            redirect('?p=prareg');
        }

		$this->load->model('Kartureg_model', 'model');
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

		$data['alamat'] = $this->model->dapatkanAlamatDenganIdPendaftaran(
			$data['pendaftaran']->id
		);

		$data['biodata'] = $this->model->dapatkanBiodataDenganIdPendaftaran(
			$data['pendaftaran']->id
		);

		$data['program_studi'] = $this->model->dapatkanProdiDenganIdPendaftaran(
			$data['pendaftaran']->id
		);

		$data['asal_sekolah'] = $this->model->dapatkanAsalSekolahDenganIdPendaftaran(
			$data['pendaftaran']->id
		);

		if (empty($data['alamat']) || empty($data['biodata']) || empty($data['program_studi']) || empty($data['asal_sekolah'])) {
			show_404();
			return;
		}

		$data['kelompok'] = $this->model->dapatkanKelompokDenganId(
			$data['program_studi']->program_studi->id_kelompok
		);

		$data['tahun_ajar'] = $this->model->dapatkanTahunAjarDenganId(
			$data['gelombang']->id_tahun_ajar
		);

		if (empty($data['pendaftaran']->nomor_praregistrasi)) {
			$data['nomor_pra_registrasi'] = $this->buatNomorPraRegistrasi(
				$data['tahun_ajar'], $data['gelombang'],
				$data['program_studi'], $data['pendaftaran']
			);
		} else {
			$data['nomor_pra_registrasi'] = $data['pendaftaran']->nomor_praregistrasi;
		}

		$parseURL = parse_url(base_url('kartureg'));

		$data['url'] = $parseURL['host'] . $parseURL['path'];

		$data['universitas'] = $this->model->dapatkanUniversitas();

		$data['biaya'] = rupiah($data['kelompok']->biaya);

		$data['terbilang'] = ucfirst(terbilang($data['kelompok']->biaya));
		
        $this->load->view('cetak/pra-registrasi', $data);
	}

	public function buatNomorPraRegistrasi($tahun_ajar, $gelombang, $prodi, $pendaftaran)
	{
		$nomor_pra_registrasi = '';

		$tahun = substr(date('Y'), 2);

		$gelombang = $gelombang->nama;

		$kode_prodi = $prodi->program_studi->kode;

		$nomor_urut = sprintf("%04d", $pendaftaran->nomor_urut);

		$nomor_pra_registrasi = $tahun . $gelombang . $kode_prodi . $nomor_urut;

		$this->model->buatNomorPraRegistrasi(
			$pendaftaran->id, [
				'nomor_pra_registrasi' => $nomor_pra_registrasi
		]);

		return $nomor_pra_registrasi;
	}

}