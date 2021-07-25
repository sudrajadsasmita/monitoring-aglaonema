<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard
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

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Monitoring_model', 'monitor');
		$this->load->model('Lokasi_tanaman_model', 'lokasi_tanaman');
		$this->load->model('Lokasi_alat_model', 'lokasi_alat');
	}

	public function index()
	{
		// $url1 = $_SERVER['REQUEST_URI'];
		// header("Refresh: 5; URL=$url1");
		check_not_login();
		$this->load->view('layouts/default', [
			'title'	=> 'Dashboard',
			'pages'	=> 'pages/dashboard/index',
			'user'	=> $this->session->userdata('nama'),
			'statusPage' => 'Dashboard'
		]);
	}
	public function status()
	{
		$data = $this->monitor->latestRecord();
		if ($data ==  null) {
			$dataReplace = [
				'humidity' => 0,
				'temperature' => 0,
				'lux' => 0,
				'ph' => 0,
				'moisture' => 0,
			];
			$this->load->view('includes/status', [
				'data' => $dataReplace
			]);
		} else {
			$this->load->view('includes/status', [
				'data' => $data
			]);
		}
	}
	public function gpsTanaman()
	{
		$data = $this->lokasi_tanaman->latestRecord();
		if ($data ==  null) {
			$dataReplace = [
				'longitude' => 0,
				'latitude' => 0,
			];
			$this->load->view('includes/gps_tanaman', [
				'data' => $dataReplace
			]);
		} else {
			$this->load->view('includes/gps_tanaman', [
				'data' => $data
			]);
		}
	}

	public function gpsAlat()
	{
		$data = $this->lokasi_alat->latestRecord();
		if ($data ==  null) {
			$dataReplace = [
				'longitude' => 0,
				'latitude' => 0,
			];
			$this->load->view('includes/gps_alat', [
				'data' => $dataReplace
			]);
		} else {
			$this->load->view('includes/gps_alat', [
				'data' => $data
			]);
		}
	}
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
