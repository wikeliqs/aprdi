<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
    }

    public function index() {
		  
		$page_data['page_name'] = "registration";
        $page_data['page_title'] = get_phrase('registration');
		$query = $this->crud_model->perusahaan();
		$page_data['prsh_assets'] = $query->result();
        // $this->load->view('frontend/default/index', $page_data);
        $this->load->view('frontend/default/registration', $page_data);
    }

     public function kodepos()
	{
		
		 
		 if (isset($_POST['kodepos'])) {
                $id = $this->input->post('kodepos');
				$kodePos = $this->crud_model->kodepos($id)->row_array();
				
            } 
		  echo json_encode($kodePos);
		 
		
	}	
	
	  public function perusahaan()
	{
		
		 
		 if (isset($_POST['perusahaan'])) {
                $id = $this->input->post('perusahaan');
				$perusahaan = $this->crud_model->perusahaan($id)->row_array();
				 
				
            } 
			
			
		  echo json_encode($perusahaan);
		 
		
	}
}
