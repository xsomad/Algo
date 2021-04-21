<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
* This is Data Model
*/
class Identitas_model extends CI_Model
{
	
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->database();
	// }
 
	public function iDent()
	{
		return $this->db->get('identitas')->row_array();
	}

	public function get_No()
	{
        // $q = $this->db->query("SELECT MAX(RIGHT(id,4)) AS kd_max FROM user");
        // $kd = "";
        // if($q->num_rows()>0){
        //     foreach($q->result() as $k){
        //         $tmp = ((int)$k->kd_max)+1;
        //         $kd = sprintf("P".date('ym')."%04s", $tmp);
        //     }
        // }else{
        //     $kd = "0001";
        // }
        // date_default_timezone_set('Asia/Jakarta');
        // return $kd;

        $this->db->select('RIGHT(user.no,4) as kode', FALSE);
		$this->db->order_by('no','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('user');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}
		else {      
		   //jika kode belum ada      
		   $kode = 1;    
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "P-".date('m')."/".date('yy')."/".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
    }

    public function get_Noi()
	{
        
 
        $this->db->select('RIGHT(no_anggota.niad,4) as kode', FALSE);
		$this->db->order_by('idaaa','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('no_anggota');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}
		else {      
		   //jika kode belum ada      
		   $kode = 1;    
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = ".".date('m').".".date('Y').".".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
    }

    // function autoNumber($id, $table)
    // {
    // 	$cari = date('ym');
		  // $query = 'SELECT MAX(RIGHT('.$id.', 5)) as max_id FROM '.$table.' WHERE '.$id.' LIKE "P'.$cari.'%"';
		  // $result = mysql_query($query);
		  // $data = mysql_fetch_array($result);
		  // $id_max = $data['max_id'];
		  // $sort_num = (int) substr($id_max, 0, 5);
		  // $sort_num++;
		  // $new_code = sprintf("P".date('ym')."%03s", $sort_num);
		  // return $new_code;

    // }
		  
}