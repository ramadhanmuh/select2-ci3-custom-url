<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_pendaftaran extends CI_Controller {

	public function __construct() {        
		parent::__construct();

        // Periksa apakah telah masuk sebegai calon mahasiswa
        if (!$this->session->has_userdata('calon_mahasiswa')) {
            redirect('');
        }

        $this->load->model(
            'Ajaxpendaftaranmahasiswa_model', 'ajax_pendaftaran'
        );
	}

    public function dapatkan_biodata()
    {
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $data = $this->ajax_pendaftaran->dapatkanBiodataDenganIdCalonMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        echo json_encode($data);
    }

    public function dapatkan_berkas()
    {
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $data = $this->ajax_pendaftaran->dapatkanBerkasDenganIdCalonMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        echo json_encode($data);
    }

    public function dapatkan_prodi()
    {
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $data = $this->ajax_pendaftaran->dapatkanProdiDenganIdCalonMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        echo json_encode($data);
    }

    public function inisiasi_form_slip_pembayaran()
    {
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $data['slip_pembayaran'] = $this->ajax_pendaftaran->dapatkanSlipPembayaranDenganIdGelombangIdCalonMahasiswa(
            $gelombang->id, $this->session->calon_mahasiswa->id
        );

        if (!empty($data['slip_pembayaran'])) {
            $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDenganIdCalonMahasiswaIdGelombang(
                $this->session->calon_mahasiswa->id, $gelombang->id
            );

            $data['slip_pembayaran']->id_setor = $pendaftaran->nomor_pra_registrasi;
        }

        $data['kelas'] = $this->ajax_pendaftaran->dapatkanKelompokBerdasarkanIdGelombangIdCalonMahasiswa(
            $gelombang->id, $this->session->calon_mahasiswa->id
        );

        echo json_encode($data);
    }

    public function dapatkan_pendaftaran()
    {
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $data = $this->ajax_pendaftaran->dapatkanPendaftaranDenganIdCalonMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        echo json_encode($data);
    }

    public function dapatkan_kabupaten()
    {
        $id_provinsi = $this->input->get('id_provinsi');

        $data = $this->db->where('id_provinsi', $id_provinsi)->get('kota')->result();

        echo json_encode($data);
    }

    public function dapatkan_kecamatan()
    {
        $id_kabupaten = $this->input->get('id_kabupaten');
        
        $data = $this->db->where('id_kota', $id_kabupaten)->get('kecamatan')->result();

        echo json_encode($data);
    }

	public function buat_biodata()
	{ 
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        if (!empty($pendaftaran) && !empty($pendaftaran->nomor_pra_registrasi)) {
            show_404();
            return;
        }

        $_POST = json_decode($this->input->raw_input_stream, true);

        $this->form_validation->set_rules(
			'nama', 'Nama',
			'required|max_length[255]'
		);

        $this->form_validation->set_rules(
			'nama_ibu', 'Nama Ibu',
			'required|max_length[255]'
		);

        $this->form_validation->set_rules(
			'nomor_pengenal', 'KTP / NIK',
			'required|max_length[255]'
		);

        $this->form_validation->set_rules(
			'kewarnegaraan', 'Kewarnegaraan',
			'required|max_length[255]|in_list[Asing,Indonesia]'
		);

        $this->form_validation->set_rules(
			'jenis_kelamin', 'Jenis Kelamin',
			'required|max_length[255]|in_list[Laki-laki,Perempuan]'
		);

        $this->form_validation->set_rules(
			'agama', 'Agama',
			'required|max_length[255]|in_list[Budha,Hindu,Islam,Kristen,Katolik,Konghucu]'
		);

        $this->form_validation->set_rules(
			'tempat_lahir', 'Tempat Lahir',
			'required|max_length[255]'
		);
        
        $this->form_validation->set_rules(
			'tanggal_lahir', 'Tanggal Lahir',
			'required|max_length[255]|callback_periksa_tanggal'
		);

        $this->form_validation->set_rules(
			'nisn', 'NISN',
			'required|max_length[255]|numeric'
		);

        $this->form_validation->set_rules(
			'nomor_ukg', 'Nomor UKG',
			'max_length[255]|callback_periksa_ukg'
		);

        $this->form_validation->set_rules(
			'jalan', 'Alamat Jalan',
			'required|max_length[255]'
		);

        $this->form_validation->set_rules(
			'dusun', 'Dusun',
			'max_length[255]'
		);

        $this->form_validation->set_rules(
			'rt', 'RT',
			'required|max_length[2]'
		);

        $this->form_validation->set_rules(
			'rw', 'RW',
			'required|max_length[2]'
		);

        $this->form_validation->set_rules(
			'kelurahan', 'Kelurahan',
			'required|max_length[255]'
		);

        $this->form_validation->set_rules(
			'id_kecamatan', 'Kecamatan',
			'required|callback_periksa_kecamatan'
		);

        $this->form_validation->set_rules(
			'kode_pos', 'Kode POS',
			'required|max_length[255]'
		);

        $this->form_validation->set_rules(
			'telepon', 'Telepon',
			'max_length[255]'
		);

        $this->form_validation->set_rules(
			'hp', 'HP',
			'required|max_length[255]'
		);

        $validasiSumberInformasi = false;

        $input['sumber_informasi'] = $this->input->post('sumber_informasi');

        if (!$this->form_validation->run()) {
            $this->output->set_status_header(400);
            echo validation_errors('<p class="m-0">', '</p>');

            if ( !$this->periksa_sumber_informasi($input['sumber_informasi']) ) {
                $this->output->set_status_header(400);
                echo '<p class="m-0">Kolom Sumber Informasi perlu diisi.</p>';
                $validasiSumberInformasi = true;
            }

            return;
            
        }

        if ( !$validasiSumberInformasi && !$this->periksa_sumber_informasi($input['sumber_informasi']) ) {
            $this->output->set_status_header(400);
            echo '<p class="m-0">Kolom Sumber Informasi perlu diisi.</p>';
            return;
        }        

        // Dapatkan semua input

        $input['biodata'] = [
            'nama' => $this->input->post('nama'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nomor_pengenal' => $this->input->post('nomor_pengenal'),
            'kewarnegaraan' => $this->input->post('kewarnegaraan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nisn' => $this->input->post('nisn'),
            'nomor_ukg' => $this->input->post('nomor_ukg'),
        ];

        $input['alamat'] = [
            'jalan' => $this->input->post('jalan'),
            'kelurahan' => $this->input->post('kelurahan'),
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'dusun' => $this->input->post('dusun'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kode_pos' => $this->input->post('kode_pos'),
            'telepon' => $this->input->post('telepon'),
            'hp' => $this->input->post('hp'),
        ]; 

        $input['pendaftaran'] = [
            'id_calon_mahasiswa' => $this->session->calon_mahasiswa->id,
            'id_gelombang' => $gelombang->id,
            'nomor_urut' => $this->ajax_pendaftaran->hitungJumlahPendaftaranDenganIdGelombang(
                $gelombang->id
            ) + 1
        ];

        if (empty($pendaftaran)) {
            $id_pendaftaran = $this->ajax_pendaftaran->buatPendaftaran(
                $input['pendaftaran']
            );

            $input['biodata']['id_pendaftaran_calon_mahasiswa'] = $id_pendaftaran;
            $input['alamat']['id_pendaftaran_calon_mahasiswa'] = $id_pendaftaran;

            $this->ajax_pendaftaran->buatBiodataAlamatSumberInformasi($input);
        } else {
            $this->ajax_pendaftaran->ubahBiodataAlamatSumberInformasi($input, $pendaftaran->id);
        }

        $this->output->set_status_header(200);
        return;
	}

    public function periksa_tanggal($str = ''){
        if (!DateTime::createFromFormat('Y-m-d', $str)) { //yes it's YYYY-MM-DD
            $this->form_validation->set_message('periksa_tanggal', 'Kolom {field} perlu berformat tanggal');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function periksa_ukg($str = ''){
        if ($str == '') {
            return true;
        }

        if (!is_numeric($str)) { //yes it's YYYY-MM-DD
            $this->form_validation->set_message('periksa_ukg', 'Kolom {field} perlu berformat angka');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function periksa_kecamatan ($str = '') {
        $data = $this->db->where(
            'id', $str
        )->get(
            'kecamatan'
        )->row();

        if (empty($data)) { //yes it's YYYY-MM-DD
            $this->form_validation->set_message('periksa_kecamatan', 'Kecamatan tidak ditemukan.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function periksa_sumber_informasi ($input = '') {
        
        if (!is_array($input)){
            show_404();
            return;
        }

        if (count($input) < 1) {
            $this->form_validation->set_message('periksa_sumber_informasi', 'Kolom Sumber Informasi perlu diisi.');
            return FALSE;
        }

        $status = true;

        foreach ($input as $key => $value) {
     
            $data = $this->db->where(
                'id', $value
            )->limit(
                1
            )->get(
                'sumber_informasi'
            )->row();
            

            if (empty($data)) {
                $status = false;
            }
        }

        if (!$status) {
            $this->form_validation->set_message('periksa_sumber_informasi', 'Sumber Informasi tidak dikenal.');
            return FALSE;
        }

        return TRUE;
    }

    public function buat_berkas()
    {
        // Validasi ketersediaan formulir
        if ($this->input->method() !== 'post') {
            show_404();
            return;
        }

        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        if (empty($pendaftaran) || !empty($pendaftaran->nomor_pra_registrasi)) {
            show_404();
            return;
        }

        $id_berkas_pendaftaran = $this->input->get('id_berkas_pendaftaran');

        if (empty($id_berkas_pendaftaran)) {
            show_404();
            return;
        }

        $berkasPendaftaran =
            $this
            ->ajax_pendaftaran
            ->dapatkanBerkasPendaftaranDenganIdJadwalIdBerkasPendaftaran(
                $gelombang->id, $id_berkas_pendaftaran
            );

        if (empty($berkasPendaftaran)) {
            show_404();
            return;
        }

        $berkasPendaftaran->berkas = $this->ajax_pendaftaran->dapatkanBerkasDenganId(
            $berkasPendaftaran->id_berkas
        );

        $berkasPendaftaran->berkas->tipe_berkas = $this->ajax_pendaftaran->dapatkanTipeBerkasDenganIdBerkas(
            $berkasPendaftaran->id_berkas
        );

        // Konfigurasi Unggah Berkas
        $allowed_types = '';

        foreach ($berkasPendaftaran->berkas->tipe_berkas as $key => $value) {
            if ($key > 0) {
                $allowed_types .= '|' . $value->nama;
            } else {
                $allowed_types .= $value->nama;
            }    
        }

        $config['upload_path']      = './uploads/pendaftaran/berkas/';
		$config['allowed_types']    = $allowed_types;
		$config['max_size']         = 5000;
        $config['encrypt_name']     = true;    
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('file') ) {
			$errorText = $this->upload->display_errors();
            $this->output->set_status_header(400);
            echo $errorText;
            return;
		}

        $hasilUngggah = $this->upload->data();

        $input['alamat'] = 'uploads/pendaftaran/berkas/' . $hasilUngggah['file_name'];
        $input['id_pendaftaran_calon_mahasiswa'] = $pendaftaran->id;
        $input['id_berkas_pendaftaran'] = $id_berkas_pendaftaran;

        $berkas_calon_mahasiswa = $this->ajax_pendaftaran->dapatkanBerkasCalonMahasiswa(
            $id_berkas_pendaftaran, $pendaftaran->id
        );

        if (empty($berkas_calon_mahasiswa)) {
            $this->ajax_pendaftaran->buatBerkasCalonMahasiswa($input);
        } else {
            $this->ajax_pendaftaran->ubahBerkasCalonMahasiswa(
                $input, $berkas_calon_mahasiswa->id
            );
        }

        echo $input['alamat'];        
        return;
    }

    public function buat_berkas_slip_setor()
    {
        // Validasi ketersediaan formulir
        if ($this->input->method() !== 'post') {
            show_404();
            return;
        }

        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        if (empty($pendaftaran)) {
            show_404();
            return;
        }

        // Konfigurasi unggah
        $config['upload_path']      = './uploads/pendaftaran/slip-setor/';
		$config['allowed_types']    = 'png|jpg|jpeg|PNG|JPEG|JPG';
		$config['max_size']         = 5000;
        $config['encrypt_name']     = true;    
 
		$this->load->library('upload', $config);

        // Unggah berkas dan periksa berhasil atau tidak
		if ( ! $this->upload->do_upload('file') ) {
			$errorText = $this->upload->display_errors();
            $this->output->set_status_header(400);
            echo $errorText;
            return;
		}

        $hasilUngggah = $this->upload->data();

        $input['alamat'] = 'uploads/pendaftaran/slip-setor/' . $hasilUngggah['file_name'];

        // Beri output berupa alamat berkas yang terunggah
        echo $input['alamat'];        
        return;
    }

    public function inisiasi_berkas_pendaftaran()
    {
        if ($this->input->method() !== 'post') {
            show_404();
            return;
        }

        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        $berkas_pendaftaran = $this->ajax_pendaftaran->dapatkanBerkasPendaftaranDenganIdJadwal(
            $gelombang->id
        );

        foreach ($berkas_pendaftaran as $key => $value) {
            $this->ajax_pendaftaran->hapusBerkasCalonMahasiswaDenganIdPendaftaranIdBerkasPendaftaran(
                $pendaftaran->id, $value->id
            );
        }

        return;
    }

    public function validasi_input_unggah_berkas()
    {
        // Periksa gelombang pendaftaran ada atau tidak berdasarkan hari ini
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        if (empty($pendaftaran)) {
            show_404();
            return;
        }

        // Periksa input berkas lengkap atau tidak
        $berkas_pendaftaran = $this->ajax_pendaftaran->dapatkanBerkasPendaftaranDenganIdJadwal(
            $gelombang->id
        );

        $berkasLengkap = 1;

        foreach ($berkas_pendaftaran as $key => $value) {
            $data = $this->ajax_pendaftaran->dapatkanBerkasCalonMahasiswaDenganIdPendaftaranIdBerkasPendaftaran(
                $pendaftaran->id, $value->id
            );

            if ( empty($data) ) {
                $berkasLengkap = 0;
            }
        }

        if (!$berkasLengkap) {
            $this->output->set_status_header(400);

            echo json_encode([
                'status' => false
            ]);

            return;
        }

        echo json_encode([
            'status' => true
        ]);
    }

    public function dapatkan_kabupaten_asal_sekolah()
    {
        echo json_encode(
           $this->ajax_pendaftaran->dapatkanKabupatenSekolahDenganKodeProp(
                $this->input->get('kode_prop')
           )
        );
    }

    public function dapatkan_kecamatan_asal_sekolah()
    {
        echo json_encode(
           $this->ajax_pendaftaran->dapatkanKecamatanSekolahDenganKodeKab(
                $this->input->get('kode_kab')
           )
        );
    }

    public function dapatkan_sekolah()
    {
        echo json_encode(
           $this->ajax_pendaftaran->dapatkanSekolahDenganKodeKec(
                $this->input->get('kode_kec')
           )
        );
    }

    public function dapatkan_program_studi()
    {
        echo json_encode(
           $this->ajax_pendaftaran->dapatkanProdiDenganIdKelompok(
                $this->input->get('id_kelompok')
           )
        );
    }

    public function buat_program_studi()
    {
        // Periksa gelombang pendaftaran ada atau tidak untuk hari ini
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        if (empty($pendaftaran) || !empty($pendaftaran->nomor_pragistrasi)) {
            show_404();
            return;
        }

        // Periksa berkas pendaftaran sudah diunggah atau belum
        $berkas_pendaftaran = $this->ajax_pendaftaran->dapatkanBerkasPendaftaranDenganIdJadwal(
            $gelombang->id
        );

        $berkasLengkap = 1;

        foreach ($berkas_pendaftaran as $key => $value) {
            $data = $this->ajax_pendaftaran->dapatkanBerkasCalonMahasiswaDenganIdPendaftaranIdBerkasPendaftaran(
                $pendaftaran->id, $value->id
            );

            if ( empty($data) ) {
                $berkasLengkap = 0;
            }
        }

        if (!$berkasLengkap) {
            show_404();
            return;
        }

        // Dapatkan input tipe json
        $_POST = json_decode($this->input->raw_input_stream, true);

        $this->form_validation->set_rules(
			'id_program_studi', 'Program Studi',
			'required|callback_periksa_program_studi'
		);

        $this->form_validation->set_rules(
			'id_sekolah', 'Sekolah',
			'required|callback_periksa_sekolah'
		);

        $this->form_validation->set_rules(
			'id_kelas', 'Kelas',
			'required|in_list[1]'
		);

        $this->form_validation->set_rules(
			'tanggal_lulus', 'Tanggal Lulus',
			'required|callback_periksa_tanggal'
		);

        $this->form_validation->set_rules(
			'nomor_ijazah', 'Nomor Ijazah',
			'required|max_length[255]'
		);

        if (!$this->form_validation->run()) {
            $this->output->set_status_header(400);

            echo validation_errors('<p class="m-0">', '</p>');

            return;
        }

        $input['prodi'] = [
            'id_pendaftaran_calon_mahasiswa' => $pendaftaran->id,
            'id_program_studi' => $this->input->post('id_program_studi'),
            'id_kelas' => $this->input->post('id_kelas'),
        ];

        $input['asal_sekolah'] = [
            'id_pendaftaran_calon_mahasiswa' => $pendaftaran->id,
            'id_sekolah' => $this->input->post('id_sekolah'),
            'tanggal_lulus' => $this->input->post('tanggal_lulus'),
            'nomor_ijazah' => $this->input->post('nomor_ijazah'),
        ];

        $prodi = $this->ajax_pendaftaran->dapatkanProdiDenganIdPendaftaran(
            $pendaftaran->id
        );

        if (empty($prodi)) {
            $this->ajax_pendaftaran->buatProgramStudi(
                $input
            );
        } else {
            $this->ajax_pendaftaran->ubahProgramStudi(
                $input
            );
        }

        return;
    }

    public function periksa_program_studi($input = '')
    {
        if (empty($input)) {
            return true;
        }

        if (!is_string($input)) {
            $this->form_validation->set_message('periksa_program_studi', 'Kolom {field} perlu berformat tulisan.');
            return false;
        }

        $data = $this->ajax_pendaftaran->dapatkanProdiDenganId(
            $input
        );

        if (empty($data)) {
            $this->form_validation->set_message('periksa_program_studi', '{field} tidak ditemukan.');
            return false;
        }

        return true;
    }

    public function periksa_sekolah($input = '')
    {
        if (empty($input)) {
            return true;
        }

        if (!is_string($input)) {
            $this->form_validation->set_message('periksa_sekolah', 'Kolom {field} perlu berformat tulisan.');
            return false;
        }

        $data = $this->ajax_pendaftaran->dapatkanSekolahDenganId(
            $input
        );

        if (empty($data)) {
            $this->form_validation->set_message('periksa_sekolah', '{field} tidak ditemukan.');
            return false;
        }

        return true;
    }

    public function buat_slip_pembayaran()
    {
       // Periksa gelombang pendaftaran ada atau tidak untuk hari ini
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        if (empty($pendaftaran)) {
            show_404();
            return;
        }

        // Dapatkan input tipe json
        $_POST = json_decode($this->input->raw_input_stream, true);

        $this->form_validation->set_rules(
			'id_bank', 'Kode Bank',
			'required|in_list[1,2,3]'
		);  

        $this->form_validation->set_rules(
			'tanggal_bayar', 'Tanggal Bayar',
			'required|callback_periksa_tanggal'
		);

        $this->form_validation->set_rules(
			'berkas', 'Berkas',
			'required|callback_periksa_berkas'
		);

        $this->form_validation->set_rules(
			'id_setor', 'ID Setor',
			'required|callback_periksa_id_setor'
		);

        if (!$this->form_validation->run()) {
            $this->output->set_status_header(400);

            echo validation_errors('<p class="m-0">', '</p>');

            return;
        }

        $input['id_bank'] = $this->input->post('id_bank');
        $input['tanggal_bayar'] = $this->input->post('tanggal_bayar');
        $input['berkas'] = $this->input->post('berkas');
        $input['id_pendaftaran_calon_mahasiswa'] = $pendaftaran->id;

        $slipPembayaran = $this->ajax_pendaftaran->dapatkanSlipPembayaranDenganIdPendaftaran(
            $pendaftaran->id
        );

        if (empty($slipPembayaran)) {
            $this->ajax_pendaftaran->buatSlipPembayaran($input);
        } else {
            $this->ajax_pendaftaran->ubahSlipPembayaran(
                $input, $slipPembayaran->id
            );
        }
        
    }

    public function periksa_berkas($input = '')
    {
        if (empty($input)) {
            return true;
        }

        if (file_exists($input)) {
            return true;
        }

        $this->form_validation->set_message('periksa_berkas', 'Kolom {field} isinya tidak ditemukan.');
        return FALSE;
    }

    public function periksa_id_setor($input = '')
    {
        if (empty($input)) {
            return true;
        }

        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            $this->form_validation->set_message('periksa_id_setor', 'Pendaftaran belum dibuka.');
            return FALSE;
        }

        $data = $this->ajax_pendaftaran->dapatkanPendaftaranDenganNomorPraRegistrasiIDGelombangIdCalonMahasiswa(
            $input, $gelombang->id, $this->session->calon_mahasiswa->id
        );

        if (!empty($data)) {
            return true;
        }

        $this->form_validation->set_message('periksa_id_setor', '{field} tidak ditemukan.');
        return FALSE;
    }

    public function cetak_kartu_ujian()
    {
        // Periksa gelombang pendaftaran ada atau tidak untuk hari ini
        $gelombang = $this->ajax_pendaftaran->dapatkanGelombang(
            date('Y-m-d')
        );

        if (empty($gelombang)) {
            show_404();
            return;
        }

        $pendaftaran = $this->ajax_pendaftaran->dapatkanPendaftaranDengenIdMahasiswaIdGelombang(
            $this->session->calon_mahasiswa->id, $gelombang->id
        );

        if (empty($pendaftaran)) {
            show_404();
            return;
        }

        $input['cetak_kartu_ujian'] = 1;

        if (!$this->ajax_pendaftaran->UbahPendaftaranCalonMahasiswa($pendaftaran->id, $input)) {
            $this->output->set_status_header(503);
            return;
        }

        return;
    }
}
