<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
* This is Data Model
*/
class Domisili_model extends CI_Model
{
	 public function getDomisiliAnggota()
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

	public function TambahDomisiliAnggota($datadomisili)
	    { 
            
            $this->db->insert('domisili', $datadomisili);
		}

	public function EditDomisiliAnggota($id_domisili)
	    {
	    	
	    		$id_domisili = htmlspecialchars($this->input->post('idu', true));
	    		$alamat2 = htmlspecialchars($this->input->post('alamat', true));
                $provinsi2 = htmlspecialchars($this->input->post('provdom', true));
                $kota2 = htmlspecialchars($this->input->post('kotadom', true));
                $kecamatan2 = htmlspecialchars($this->input->post('kecdom', true));
                $kelurahan2 = htmlspecialchars($this->input->post('keldom', true));
                $nama_perusahaan = htmlspecialchars($this->input->post('idu', true));
                $sip = htmlspecialchars($this->input->post('nsip', true));
                $thn_masuk = htmlspecialchars($this->input->post('tmasuk', true));
                $date_update = time();

                $this->db->set('alamat2', $alamat2);
                $this->db->set('provinsi2', $provinsi2);
                $this->db->set('kota2', $kota2);
                $this->db->set('kecamatan2', $kecamatan2);
                $this->db->set('kelurahan2', $kelurahan2);
                $this->db->set('nama_perusahaan', $nama_perusahaan);
                $this->db->set('sip', $sip);
                $this->db->set('thn_masuk', $thn_masuk);
                $this->db->set('date_update', $date_update);

            	$this->db->where('id_domisili', $id_domisili);
            	$this->db->update('domisili');
		}

	public function showall()
		  {
		    $email = $this->session->userdata('email');
	    	$this->db->select('*');
			$this->db->FROM('user');
			$this->db->JOIN('anggota', 'anggota.id_user = user.id');
			$this->db->JOIN('domisili', 'domisili.id_user = anggota.id_user');
			// $this->db->JOIN('no_anggota', 'no_anggota.idaa = anggota.ida');
			
			$this->db->where('email',$email);
			$this->db->order_by('thn_masuk', 'DESC');

			$query = $this->db->get();
			return $query->result();
		  }

    
  

	public function get_domisili($id_domisili = '')
	{
		return $this->db->get_where('domisili', array('id_domisili' => $id_domisili))->row();
		// $query = $this->db->get('domisili');
		// return $query;	
	}

	public function getDomisiliById($id_domisili)
    {
        // $this->db->query('SELECT * FROM ' . $this->domisili . ' WHERE id_domisili=:id_domisili');
        // $this->db->bind('id_domisili', $id_domisili);
        // return $this->db->single();
        $query = $this->db->get_where('domisili', array('id_domisili' =>  $id_domisili));
		return $query;
    }

	public function DellDataDomisili($id_domisili)
    {
        $this->db->delete('domisili', ['id_domisili' => $id_domisili]);
    }

    public function Get_Info($id_domisili)
    {
    	// return $this->db->get_where('domisili', array('id_domisili' => $id_domisili))->row();

    	$this->db->select('*');
    	$this->db->FROM('domisili');
    	$this->db->JOIN('anggota', 'anggota.id_user = domisili.id_user');
    	$this->db->WHERE('id_domisili', $id_domisili);
    	$query = $this->db->get();
		return $query->row();


    }


}