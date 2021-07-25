<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Lokasi
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

class Lokasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lokasi_model', 'lokasi');
	}

	public function index()
	{
		check_not_login();
		$this->load->view('layouts/default', [
			'title'	=> 'Lacak Lokasi',
			'pages'	=> 'pages/lokasi/index',
			'user'	=> 'Admin',
			'data'	=> null,
			'isGPS' => true
		]);
	}



	public function add()
	{
		$data = [
			'longitude'		=> $this->input->post('longitude'),
			'latitude'	=> $this->input->post('latitude'),
		];
		$response = $this->lokasi->create($data);
		echo $response;
	}



	public function getAjax()
	{
		$list = $this->lokasi->getDataTables();
		$data = [];
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$no++;
			$row = [];
			$row[] = $no;
			$row[] = $item->longitude;
			$row[] = $item->latitude;
			$row[] = $item->created;

			$data[] = $row;
		}
		$output = [
			'draw'				=> @$_POST['draw'],
			'recordsTotal'		=> $this->lokasi->count_all(),
			'recordsFiltered'	=> $this->lokasi->count_filtered(),
			'data' 				=> $data
		];

		echo json_encode($output);
	}
}


/* End of file Lokasi.php */
/* Location: ./application/controllers/Lokasi.php */
