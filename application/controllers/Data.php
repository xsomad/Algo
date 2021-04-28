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






}