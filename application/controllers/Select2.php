<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Objek untuk masuk mahasiswa
 */
class Select2 extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Menampilkan halaman masuk mahasiswa
	 */
	public function index()
	{
        $data['pengguna'] = $this->db->get(
            'pengguna'
        )->result();

        $this->load->view('select2', $data);
	}

    public function getKontak()
    {
        $keyword = $this->input->get('q');
        $idPengguna = $this->input->get('id_pengguna');

        // var_dump($idPengguna);

        $data = $this->db->like(
            'hp', $keyword
        )->where(
            'id_pengguna', $idPengguna
        )->get(
            'kontak'
        )->result();

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $data[$key]->text = $value->hp;
            }
        }

        echo json_encode($data);
    }
}
