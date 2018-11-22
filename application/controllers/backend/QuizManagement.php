<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizManagement extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->session->userdata('admin_login')) {
			redirect(site_url('login'), 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->view('backend/quiz_management/index');
	}
}