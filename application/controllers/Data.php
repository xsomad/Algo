<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Data_model');
        $this->load->library('form_validation');
    }

    public function jam()
    {
        $data['title'] = 'Master Jam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jam/index', $data);
            $this->load->view('templates/footer');
        
    }

    public function jamList()
    {
    	// POST data dari view
    	$postData = $this->input->post();

    	// get data dari model
    	$data = $this->Data_model->getMaster($postData);

    	echo json_encode($data);
    	

    }

    public function hari()
    {
        $data['title'] = 'Master Hari';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hari/index', $data);
            $this->load->view('templates/footer');
        
    }

    public function hariList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getHariMaster($postData);
        
        echo json_encode($data);
        

    }

    public function t_akademik()
    {
        $data['title'] = 'Master Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ta/index', $data);
            $this->load->view('templates/footer');
        
    }

    public function taList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getTAMaster($postData);
        
        echo json_encode($data);
    }

    public function dosen()
    {
        $data['title'] = 'Master Dosen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dosen/index', $data);
            $this->load->view('templates/footer');
    }

     public function dosenList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getDosenMaster($postData);
        
        echo json_encode($data);
    }

    public function ruangan()
    {
        $data['title'] = 'Master Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ruangan/index', $data);
            $this->load->view('templates/footer');
    }

    public function ruangList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getRuangMaster($postData);
        
        echo json_encode($data);
    }

    public function jenisruangan()
    {
        $data['title'] = 'Master Jenis Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ruangan/jenis_ruangan', $data);
            $this->load->view('templates/footer');
    }

    public function jenisruangList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getJenisRuangMaster($postData);
        
        echo json_encode($data);
    }

    public function typematkul()
    {
        $data['title'] = 'Master Type Matakuliah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('typemapel/index', $data);
            $this->load->view('templates/footer');
    }

    public function typeList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getTypeMaster($postData);
        
        echo json_encode($data);
    }

    public function matkul()
    {
        $data['title'] = 'Master Matakuliah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('matakuliah/index', $data);
            $this->load->view('templates/footer');
    }

    public function matkulList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getMatkulMaster($postData);
        
        echo json_encode($data);
    }

    public function kelmatkul()
    {
        $data['title'] = 'Master Kelompok Matakuliah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 
        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('matakuliah/kelompok_matakuliah', $data);
            $this->load->view('templates/footer');
    }

    public function kelmatkulList()
    {
        // POST data dari view
        $postData = $this->input->post();

        // get data dari model
        $data = $this->Data_model->getKelMatkulMaster($postData);
        
        echo json_encode($data);
    }






}