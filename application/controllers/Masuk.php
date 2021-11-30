<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Objek untuk masuk mahasiswa
 */
class Masuk extends CI_Controller {

	private $calon_mahasiswa = null;

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
		$page = $this->input->get('p');

		$this->inisiasiAturanFormulir();

		if (!$this->form_validation->run())
		{
			$data['berkas_captcha'] = $this->buatCaptcha();

			$this->load->view('autentikasi/masuk', $data);

			return;
		}

		$this->session->set_userdata(
			'calon_mahasiswa', $this->calon_mahasiswa
		);

		if (!empty($page)) {
			redirect($page);
		} else {
			redirect('calon-mahasiswa/pendaftaran');
		}
	}

	private function inisiasiAturanFormulir()
	{
		$this->form_validation->set_rules(
			'email', 'Email',
			'required|valid_email|max_length[255]|callback_periksa_email_sandi'
		);

		$this->form_validation->set_rules(
			'captcha', 'Captcha', 'required|callback_periksa_captcha'
		);
	}

	private function buatCaptcha()
	{
		$options = [
			// 'word' => 'Random Word',
			'img_path' => './captcha/',
			'img_url' => base_url('captcha/'),
			// 'font_path' => './assets/font-family/sfmono/regular.ttf',
			'img_width' => 200,
			'img_height' => 50,
			'expiration' => 7200,
			'word_length' => 4,
			// 'font_size' => 25,
			// 'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'pool' => '0123456789',
		];

		// var_dump($options);die;

		$cap = create_captcha($options);
		// var_dump($cap);die;
		$filename = $cap['filename'];
		
		$this->session->set_userdata(
			'captchaword', $cap['word']
		);

		return $filename;
	}

	public function periksa_captcha($input = false)
	{
		if ($input !== $this->session->userdata('captchaword')) {
			$this->form_validation->set_message(
				'periksa_captcha', 'Captcha tidak benar.'
			);

			return false;
		}

		return true;
	}

	public function periksa_email_sandi($input = '')
	{
		$this->calon_mahasiswa = $this->db->where(
			'email', $input
		)->where(
			'kata_sandi', md5($this->input->post('kata_sandi'))
		)->where(
			'waktu_verifikasi is NOT NULL', NULL, FALSE
		)->get(
			'calon_mahasiswa'
		)->row();
		
		if (empty($this->calon_mahasiswa)) {
			$this->form_validation->set_message(
				'periksa_email_sandi', 'Akun tidak ditemukan.'
			);

			return false;
		}

		return true;
	}

	public function refresh_captcha_json()
	{
		// json_encode($this->buatCaptcha());
		// json_encode('test');
		echo $this->buatCaptcha();
	}
}
