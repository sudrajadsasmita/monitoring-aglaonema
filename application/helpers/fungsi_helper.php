<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Fungsi_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

function check_already_login()
{
	$ci = &get_instance();
	$user_sessoin = $ci->session->userdata('username');
	if ($user_sessoin) {
		redirect('Dashboard');
	}
}
function check_not_login()
{
	$ci = &get_instance();
	$user_sessoin = $ci->session->userdata('username');
	if (!$user_sessoin) {
		redirect('Auth');
	}
}

// ------------------------------------------------------------------------

/* End of file Fungsi_helper.php */
/* Location: ./application/helpers/Fungsi_helper.php */
