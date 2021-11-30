<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct() {        
		parent::__construct();

        // Periksa apakah telah masuk sebegai calon mahasiswa
        if (!$this->session->has_userdata('calon_mahasiswa')) {
            redirect('/');
        }

        $this->load->model(
            'Pendaftarancalonmahasiswa_model', 'pendaftaran_mahasiswa'
        );
	}

	public function index()
	{ 
        $data['gelombang'] = $this->pendaftaran_mahasiswa->dapatkanJadwal(
            date('Y-m-d')
        );

        if (empty($data['gelombang'])) {
            $this->load->view('calon-mahasiswa/pendaftaran/tutup', $data);
            return;
        }

        $pendaftaran = $this->pendaftaran_mahasiswa->dapatkanPendaftaranDenganIdCalonMahasiswaIdJadwal(
            $this->session->calon_mahasiswa->id, $data['gelombang']->id
        );

        $data['bank'] = $this->pendaftaran_mahasiswa->dapatkanSemuaBank();

        if (!empty($pendaftaran) && !empty($pendaftaran->nomor_pra_registrasi)) {
            $data['biodata'] = $this->pendaftaran_mahasiswa->dapatkanBiodataDenganIdPendaftaran(
                $pendaftaran->id, 'nama'
            );

            $this->load->view('calon-mahasiswa/pendaftaran/selesai-pra-registrasi/formulir', $data);
            return;
        }

        $data['provinsi'] = $this->pendaftaran_mahasiswa->dapatkanSemuaProvinsi(
            'id,nama'
        );

        $data['berkas_pendaftaran'] = $this->pendaftaran_mahasiswa->dapatkanBerkasPendaftaranDenganIdGelombang(
            $data['gelombang']->id
        );

        $data['sumber_informasi'] = $this->pendaftaran_mahasiswa->dapatkanSemuaSumberInfo();

        $data['kelompok'] = $this->pendaftaran_mahasiswa->dapatkanSemuaKelompok();

        $data['provinsi_asal_sekolah'] = $this->pendaftaran_mahasiswa->dapatkanSemuaProvinsiAsalSekolah(
            'kode_prop,propinsi'
        );

        $this->load->view('calon-mahasiswa/pendaftaran/formulir', $data);
	}
}
