<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MLogin');

		// $this->load->helper('captcha');
	}

	public function index()
	{
		// if (isset($_SESSION['captcha_str'])) {
		// 	$filename = base_url() . './assets/captcha/' . $_SESSION['captcha_str'];
		// 	unlink($filename);
		// }

		if (isset($_POST['login']) && $_SESSION['captcha_str'] == $_POST['captcha']) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$level = $_POST['level'];
			$notif = $this->MLogin->GoLogin($username, $password, $level);
			if ($notif) {
				$this->load->library('session');
				$this->session->set_userdata('Login', 'OnLogin');
				redirect(site_url('Welcome'));
			} else {
				$this->load->library('session');
				$this->session->unset_userdata('Login');
				redirect(site_url('Login'));
			}
		}

		$path = './assets/captcha/';

		// if (!file_exists($path)) {
		// 	// $buat = mkdir($path, 0777);
		// 	if (!$buat) {
		// 		return;
		// 	}
		// }


		$kata = array_merge(range('0', '9'), range('A', 'Z'));
		$acak = shuffle($kata);
		$str = substr(implode($kata), 0, 5);

		$data_ses = array('captcha_str' => $str);
		$this->session->set_userdata($data_ses);

		$vals = array(
			'word' => $str,
			'img_path' => $path,
			'img_url' => base_url() . './assets/captcha/',
			// 'img_width' => 150,
			// 'img_height' => 400,
			'expiration' => 7200
		);

		$capc = create_captcha($vals);
		// $capc = $this->buatCaptca();
		$data['captcha_image'] = $capc['image'];

		$this->load->view('VLogin', $data);
	}
}
