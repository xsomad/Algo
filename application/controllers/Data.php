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
 
        // $data['anggota'] = $this->db->get('anggota')->result_array();
        // $data['angg'] = $this->Data_model->GetAnggota();
        // $this->form_validation->set_rules('menu', 'Menu', 'required');

        // if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jam/index', $data);
            $this->load->view('templates/footer');
        // } else {
        //     $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
        //     redirect('menu');
        // }
    }

    public function jamList()
    {
    	// POST data dari view
    	$postData = $this->input->post();

    	// get data dari model
    	$data = $this->Data_model->getMaster($postData);

    	echo json_encode($data);
    	

    }






}