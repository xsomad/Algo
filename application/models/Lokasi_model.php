<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
* This is Data Model
*/
class Lokasi_model extends CI_Model
{

	public function getCabang()
	{
		
		$this->db->select('*');
		$this->db->FROM('propinsi');
		
		$this->db->JOIN('kota', 'kota.propinsi_id = propinsi.propinsi_id', 'left');
		
		$this->db->where('propinsi.propinsi_id', '19');
		$this->db->order_by('kota', 'ACS');
		
		$query = $this->db->get();

		return $query->result();
	}


}