<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
* This is Data Model
*/
class Permohonan_model extends CI_Model
{
	
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->database();
	// }

	

	public function get_NoPermohonanRekomSTRTKK()
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

        $this->db->select('RIGHT(rekom.id_surat,4) as kode', FALSE);
		$this->db->order_by('id_surat','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('rekom');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		$kodejadi = "Rek-STRTTK".$kodemax."/PD.PAFI/BABEL/".date('M')."/".date('yy');    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
    }

    public function get_Anggota()
    {
    	$email = $this->session->userdata('email');
    	$this->db->select('*');
		$this->db->FROM('user');
		$this->db->JOIN('anggota', 'anggota.id_user = user.id');
		// $this->db->JOIN('no_anggota', 'no_anggota.idaa = anggota.ida');
		
		$this->db->where('email',$email);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function getIdAnggota()
	{
		$email = $this->session->userdata('email');
		$this->db->select('*');
		$this->db->FROM('user');
		$this->db->JOIN('anggota', 'anggota.id_user = user.id');
		$this->db->JOIN('no_anggota', 'no_anggota.idaa = anggota.ida');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getDomProv()
	{
		// $email = $this->session->userdata('email');
		$this->db->select('*');
		$this->db->FROM('propinsi');
		
		$this->db->where('propinsi_id', '19');
		$query = $this->db->get();

		return $query->result();
		
	}

		public function getDomisiliProvkota()
	{
		// $email = $this->session->userdata('email');
		$this->db->select('*');
		$this->db->FROM('propinsi');
		
		$this->db->JOIN('kota', 'kota.propinsi_id = propinsi.propinsi_id', 'left');
		
		$this->db->where('propinsi.propinsi_id', '19');
		$this->db->order_by('kota', 'ACS');
		
		$query = $this->db->get();

		return $query->result();
	}

	public function getDomKec()
	{
		// $email = $this->session->userdata('email');
		$this->db->select('*');
		$this->db->FROM('propinsi');
		
		$this->db->JOIN('kota', 'kota.propinsi_id = propinsi.propinsi_id', 'left');
		$this->db->JOIN('kecamatan', 'kecamatan.kota_id = kota.kota_id', 'left');
		
		$this->db->where('propinsi.propinsi_id', '19');
		$this->db->order_by('kecamatan', 'ACS');
		
		$query = $this->db->get();

		return $query->result();
	}

	public function getDomKel()
	{
		// $email = $this->session->userdata('email');
		$this->db->select('*');
		$this->db->FROM('propinsi');
		// $this->db->JOIN('kota', 'kota.propinsi_id = propinsi.propinsi_id');
		$this->db->JOIN('kota', 'kota.propinsi_id = propinsi.propinsi_id', 'left');
		$this->db->JOIN('kecamatan', 'kecamatan.kota_id = kota.kota_id', 'left');
		$this->db->JOIN('kelurahan', 'kelurahan.kecamatan_id = kecamatan.kecamatan_id', 'left');
		$this->db->where('propinsi.propinsi_id', '19');
		$this->db->order_by('kelurahan', 'ACS');
		
		$query = $this->db->get();

		return $query->result();
	}
		  
}