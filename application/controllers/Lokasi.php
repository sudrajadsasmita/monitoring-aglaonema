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
		$this->load->model('Lokasi_tanaman_model', 'lokasi_tanaman');
		$this->load->model('Lokasi_alat_model', 'lokasi_alat');
	}

	public function index()
	{
		echo "Kosongan Mas";
	}

	public function Tanaman()
	{
		check_not_login();
		$this->load->view('layouts/default', [
			'title'	=> 'Lacak Lokasi',
			'pages'	=> 'pages/lokasi/tanaman/index',
			'user'	=> $this->session->userdata('nama'),
			'statusPage' => "lokasiTanaman"
		]);
	}


	public function addTanaman()
	{
		$data = [
			'longitude'	=> $this->input->post('longitude'),
			'latitude'	=> $this->input->post('latitude'),
		];
		$response = $this->lokasi_tanaman->create($data);
		echo $response;
	}



	public function getAjaxTanaman()
	{
		$list = $this->lokasi_tanaman->getDataTables();
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
			'recordsTotal'		=> $this->lokasi_tanaman->count_all(),
			'recordsFiltered'	=> $this->lokasi_tanaman->count_filtered(),
			'data' 				=> $data
		];

		echo json_encode($output);
	}

	public function Alat()
	{
		check_not_login();
		$this->load->view('layouts/default', [
			'title'	=> 'Lacak Lokasi',
			'pages'	=> 'pages/lokasi/alat/index',
			'user'	=> $this->session->userdata('nama'),
			'statusPage' => "lokasiAlat"
		]);
	}

	public function addAlat()
	{
		$data = [
			'longitude'	=> $this->input->post('longitude'),
			'latitude'	=> $this->input->post('latitude'),
		];
		$response = $this->lokasi_alat->create($data);
		echo $response;
	}

	public function getAjaxAlat()
	{
		$list = $this->lokasi_alat->getDataTables();
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
			'recordsTotal'		=> $this->lokasi_alat->count_all(),
			'recordsFiltered'	=> $this->lokasi_alat->count_filtered(),
			'data' 				=> $data
		];

		echo json_encode($output);
	}
}


/* End of file Lokasi.php */
/* Location: ./application/controllers/Lokasi.php */
