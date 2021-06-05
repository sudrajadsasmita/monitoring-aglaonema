<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Monitoring_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Monitoring_model extends CI_Model
{

	var $column_order = [null, 'humidity', 'temperature', 'lux', 'ph', 'created'];
	var $column_search = ['humidity', 'temperature', 'lux', 'ph', 'created'];

	var $order = ['id' => 'asc'];

	public function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from('tb_sensor');

		$i = 0;

		foreach ($this->column_search as $item) {
			if (@$_POST['search']['value']) {
				if ($i == 0) {
					$this->db->group_start();

					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) {
					$this->db->group_end();
				}
			}
			$i++;
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} elseif (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function getDataTables()
	{
		$this->_get_datatables_query();

		if (@$_POST['length'] != 1) {
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tb_sensor');
		return $this->db->count_all_results();
	}

	public function create($post)
	{

		$this->db->insert('tb_sensor', $post);
		return $this->db->affected_rows();
	}

	// ------------------------------------------------------------------------
	public function latestRecord()
	{
		$query = $this->db->query("SELECT * FROM tb_sensor WHERE id IN (SELECT MAX(id) FROM tb_sensor)")->row_array();
		return $query;
	}
}

/* End of file Monitoring_model.php */
/* Location: ./application/models/Monitoring_model.php */
