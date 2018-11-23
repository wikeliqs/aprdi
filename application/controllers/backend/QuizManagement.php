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
		$this->session->set_userdata('last_page', 'quiz_management');
	}
	
	public function index()
	{
		$page_data['page_name'] = 'quiz_management/index';
		$page_data['page_title'] = get_phrase('Quiz');
		
		return view('backend.admin.quiz_management.index', $page_data);
	}
}