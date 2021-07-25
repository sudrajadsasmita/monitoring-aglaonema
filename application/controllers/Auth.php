<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Auth
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		check_already_login();
		$this->load->view('layouts/auth');
	}
	public function login()
	{
		check_already_login();
		$post = $this->input->post(null, TRUE);
		$user = $this->user->getWhere($post);
		if ($user->num_rows() > 0) {
			$row = $user->row();
			$params = [
				'username' => $row->username,
				'nama' => $row->nama
			];
			$this->session->set_userdata($params);
			redirect('Dashboard');
		} else {
			echo '<script>
					alert("Maaf, Login Gagal, username atau password salah");
					window.location = `' . site_url('Auth') . '`;
				</script>';
		}
	}
	public function logout()
	{
		$params = [
			'username',
			'nama',
		];
		$this->session->unset_userdata($params);
		redirect('Auth');
	}
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
