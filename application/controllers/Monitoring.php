<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Monitoring
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

class Monitoring extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Monitoring_model', 'monitor');
	}

	public function index()
	{
		$this->load->view('layouts/default', [
			'title'	=> 'Monitoring',
			'pages'	=> 'pages/monitoring/index',
			'user'	=> 'Admin'
		]);
	}

	public function add()
	{
		$data = [
			'humidity' => $this->input->post('humidity'),
			'temperature' => $this->input->post('temperature'),
			'lux' => $this->input->post('lux'),
			'ph' => $this->input->post('ph'),
		];
		echo $this->monitor->create($data);
	}

	public function getAjax()
	{
		$list = $this->monitor->getDataTables();
		$data = [];
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = $item->humidity;
			$row[] = $item->temperature;
			$row[] = $item->lux;
			$row[] = $item->ph;
			$row[] = $item->created;

			$data[] = $row;
		}
		$output = [
			'draw'				=> @$_POST['draw'],
			'recordsTotal'		=> $this->monitor->count_all(),
			'recordsFiltered'	=> $this->monitor->count_filtered(),
			'data' 				=> $data
		];

		echo json_encode($output);
	}
}


/* End of file Monitoring.php */
/* Location: ./application/controllers/Monitoring.php */
