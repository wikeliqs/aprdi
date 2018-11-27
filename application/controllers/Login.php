<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ini_set('display_errors', 'On');
error_reporting(E_ALL);
define('MP_DB_DEBUG', true);  

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
		  $this->load->library('google');
        $this->load->database();
        $this->load->library('session');
		$this->load->library('image_lib');
		if(!$this->session->userdata('user_login')){
			
			// redirect(site_url('home'), 'refresh');
		}elseif(!$this->session->userdata('admin_login')){
			
			
		}
		
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		// print_r($this->session->userdata());
    }
	
	
    public function is_logged_in()
    {
        $user = $this->session->userdata('user_login');
        return isset($user);
    }

    public function index() {
        if ($this->session->userdata('admin_login') == true) {
            redirect(site_url('admin/dashboard'), 'refresh');
        }else {
            $this->load->view('backend/login.php');
        }
    }

	
	
	public function verification() {
		 $data['kd_verify'] = random_string('numeric', 6);
       $this->load->view('email/verification.php',$data );
    }
	
	
	
	public function confirmation() {
		 $page_data['page_name'] = "confirmation";
        $page_data['page_title'] = get_phrase('confirmation');
        $this->load->view('frontend/default/index', $page_data);
    }
	
	public function ajax_confirmation() {
		  $kode = $this->input->post('kode_konfirmasi');
		  $email = $this->input->post('email');
		  $query = $this->db->get_where('users' , array('email' => $email, 'kd_verify' => $kode));
		  $this->db->last_query();
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->db->where('email' , $email);
            $result =  $this->db->update('users' , array('is_verify' => 1));
			$this->session->set_userdata('is_verify', 1);
			 $this->session->set_userdata('user_id', $row->id);
			  $this->session->set_userdata('role_id', $row->role_id);
			  
			  $this->session->set_userdata('email', $row->email);
			  $this->session->set_userdata('role', get_user_role('user_role', $row->role_id));
			  $this->session->set_userdata('name', $row->first_name.' '.$row->last_name);
			 if ($row->role_id == 1) {
             $this->session->set_userdata('admin_login', '1');
			 }else{
			   $this->session->set_userdata('user_login', '1');
			 }
		 }else{
			 $result = 0;
		 }
		 
		 echo $result;
    }
	
	public function resend_confirmation() {
		 
		 $email = $email = $this->session->userdata('email');
        //resetting user password here
        $new_token = random_string('numeric', 6);

        // Checking credential for admin
        $query = $this->db->get_where('users' , array('email' => $email));
        if ($query->num_rows() > 0)
        {
            $this->db->where('email' , $email);
            $this->db->update('users' , array('kd_verify' => $new_token));
			$data['email']=$email;
			$data['kd_verify']=$new_token;
            $this->email_model->do_email($new_token, 'Email verification', $data['email']);
			// $mesg = $this->load->view('email/verification.php',$data,true);
			// $this->email_model->do_email($mesg, 'Email verification', $data['email']);
            // $this->session->set_flashdata('flash_message', get_phrase('please_check_your_email_for_new_password'));
            // redirect($this->uri->uri_string());
			redirect($_SERVER['HTTP_REFERER']);
        }else {
            
			$this->session->set_flashdata('error_message', get_phrase('password_reset_failed'));
            if ($from == 'backend') {
                redirect(site_url('login'), 'refresh');
            }else {
                redirect(site_url('home'), 'refresh');
            }
        }
    }
	
	
	
    public function validate_login($from = "") {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $credential = array('email' => $email, 'password' => sha1($password));

    // Checking login credential for admin
    $query = $this->db->get_where('users', $credential);

        if ($query->num_rows() > 0) {
          $row = $query->row();

          $this->session->set_userdata('user_id', $row->id);
          $this->session->set_userdata('role_id', $row->role_id);
          $this->session->set_userdata('is_verify', $row->is_verify);
          $this->session->set_userdata('email', $row->email);
          $this->session->set_userdata('role', get_user_role('user_role', $row->role_id));
          $this->session->set_userdata('name', $row->first_name.' '.$row->last_name);
		 
          if ($row->role_id == 1) {
             $this->session->set_userdata('admin_login', '1');
			 redirect(site_url('admin/dashboard'), 'refresh');
			/*   if($row->is_verify != ''){
             
			  }else{
			$page_data['page_name'] = "confirmation";
			$page_data['page_title'] = get_phrase('confirmation');
			$page_data['email'] = $row->email;
			$this->load->view('frontend/default/index', $page_data);
				  
			  } */
          }else if($row->role_id == 2){
             $this->session->set_userdata('user_login', '1');
			  redirect(site_url('home'), 'refresh');
			  
			/*   if($row->is_verify != ''){
            
			  }else{
			$page_data['page_name'] = "confirmation";
			$page_data['page_title'] = get_phrase('confirmation');
			$page_data['email'] = $row->email;
			$this->load->view('frontend/default/index', $page_data);
				  
			  } */
          }
         
			
			  
		   
      }else {
          $this->session->set_flashdata('error_message',get_phrase('invalid_login_credentials'));
          if ($from == "user")
            redirect(site_url('home'), 'refresh');
          else
            redirect(site_url('login'), 'refresh');

      }

    }

	
	public function auth(){
		
		 
		$data['google_login_url']=$this->google->get_login_url();
		  print_r($this); 
		// $this->load->view('frontend/default/index', $page_data);
	}
	
	public function oauth2callback(){
		$google_data=$this->google->validate();
		$session_data=array(
				'name'=>$google_data['name'],
				'email'=>$google_data['email'],
				'source'=>'google',
				'profile_pic'=>$google_data['profile_pic'],
				'link'=>$google_data['link'],
				'sess_logged_in'=>1
				);
			$this->session->set_userdata($session_data);
			// print_r($google_data['name']);
			// redirect(base_url());
	}
	
    public function register_prsh() {
	
	
	$data = $this->input->post('data');
	$user['email'] = $data['email'];
	$user['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
	$user['date_added'] = strtotime("now");
	$user['first_name'] = $data['pic'];
	 
	// $user['kd_verify'] = random_string('numeric', 6);
		
        $user['wishlist'] = json_encode(array()); 
        $user['watch_history'] = json_encode(array());
        $social_links = array(
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        );
        $user['social_links'] = json_encode($social_links);
        $user['role_id']  = 3;
	$validity = $this->user_model->check_duplication('on_create', $data['email']);	
	 // echo $this->db->last_query();
	if($validity){
		
	$config['upload_path']   = './uploads/institusi/sk/'; 
	$config['allowed_types'] = 'jpg|jpeg'; 
	   
	$file_ext = pathinfo($_FILES['sk_ojk']['name'],PATHINFO_EXTENSION);
	$config['file_name'] = $data['no_sk_ojk'].'.'.$file_ext ;
   
    $this->load->library('upload',$config); 
	$this->upload->overwrite = true;
      	
   
    if($this->upload->do_upload('sk_ojk')){ 
		$error = array('error' => $this->upload->display_errors());
		$data_upload = $this->upload->data();
		$user_id =  $this->user_model->register_user($user); 
	  
		$data['sk_ojk'] = $data_upload['file_name'];;
		$data['email_pic'] = $data['email'];
		if($user_id){
				$mesg = $this->load->view('email/info_verification_prsh.php',$data,true);
				$this->email_model->do_email($mesg, 'Email verification', $data['email']);
				unset($data['email'],$data['password']);
				$this->user_model->register_prsh($data); 
				// echo $this->db->last_query();
				    $data['page_name'] = "info";
					$data['page_title'] = get_phrase('info');
					$this->load->view('frontend/default/index', $data);
			 }
		
		
	   	 
			 
			
	}
		
		 
			
	// redirect(site_url('home/info'), 'refresh');	
		 
		
	}else{
		$this->session->set_flashdata('error_message', get_phrase('email_duplication'));
	}
	
 
	
		
		
	
	
		
		
	}
	
    public function register() {
		
		 $data = $this->input->post('data');
		 
		 $user['email'] = $data['email'];
		 $user['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
		 $user['date_added'] = strtotime("now");
		 $user['first_name'] = $data['first_name'];
	 
		$user['kd_verify'] = random_string('numeric', 6);
		$data['kd_verify'] = $user['kd_verify'];
		
		
		print_r($data); exit;
		
        $user['wishlist'] = json_encode(array()); 
        $user['watch_history'] = json_encode(array());
        $social_links = array(
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        );
        $user['social_links'] = json_encode($social_links);
        $user['role_id']  = 2;
		// var_dump($data);
		$config_photo['upload_path']   = './uploads/user_image/photo/'; 
		$config_ktp['upload_path']   = './uploads/user_image/ktp/'; 
		$config_photo['allowed_types'] = 'gif|jpg|png'; 
		$config_ktp['allowed_types'] = 'gif|jpg|png'; 
		// $config['max_size']      = 1024;
		$config_photo['encrypt_name'] = TRUE;
		$config_ktp['encrypt_name'] = TRUE;
		$this->load->library('upload', $config_photo);
		$this->load->library('upload', $config_ktp);  
     
	  
				// $mesg = $this->load->view('email/verification.php',$data,true);
				// $this->email_model->do_email($mesg, 'Email verification', $data['email']);
		// var_dump($data);
        $validity = $this->user_model->check_duplication('on_create', $data['email']);
	 
        if ($validity) {
		 
		
				  
			$this->upload->initialize($config_photo);
			
			 if ($this->upload->do_upload('photo')) {
				
				
				 

				$data_upload = $this->upload->data();
			 	$data['photo'] = $data_upload['file_name'];
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './uploads/user_image/photo/'. $data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '80%',
					'width' => 150 
                ));
				$this->image_lib->resize();
			

			}
			  
				$this->upload->initialize($config_ktp);
			 if ($this->upload->do_upload('file_ktp')) {
				
				

				$data_upload_ktp = $this->upload->data();
				$data['file_ktp'] = $data_upload_ktp['file_name'];
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './uploads/user_image/ktp/'. $data_upload_ktp['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
					'quality' => '80%',
					'width' => 150
                ));
				$this->image_lib->resize();
			

			}
			  
		  
             $user_id = $this->user_model->register_user($user);
			 // echo $this->db->last_query();
			 if($user_id){
				$mesg = $this->load->view('email/verification.php',$data,true);
				$this->email_model->do_email($mesg, 'Email verification', $data['email']);
				unset($data['email'],$data['password']);
				$this->user_model->user_profile($data); 
				 $data['page_name'] = "confirmation";
				 $data['page_title'] = get_phrase('confirmation');
				 $this->load->view('frontend/default/index.php',$data);
			 }
			 
			 
			
          /*  $this->session->set_userdata('user_login', '1');
            $this->session->set_userdata('user_id', $user_id);
            $this->session->set_userdata('role_id', 2);
            $this->session->set_userdata('role', get_user_role('user_role', 2));
            $this->session->set_userdata('name', $data['first_name'].' '.$data['last_name']);
            $this->session->set_flashdata('flash_message', get_phrase('your_registration_has_been_successfully_done')); */
        }else {
			 
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
		
		
		
		
    }
	
 public function register11() {
		
		 $data = $this->input->post('data');
		 
		   
		
		$data['first_name'] = html_escape($data['first_name']);
        $data['last_name']  = html_escape($data['first_name']);
        $data['kelamin']  = html_escape($data['first_name']);
        $data['marital']  = html_escape($data['first_name']);
        $data['tgl_lahir']  = html_escape($data['first_name']);
        $data['pendidikan']  = html_escape($data['first_name']);
        $data['id_pengenal']  = html_escape($data['first_name']);
        $data['no_ktp']  = html_escape($data['first_name']);
        $data['kwn']  = html_escape($data['first_name']);
        $data['nm_rdc']  = html_escape($data['first_name']);
        $data['tlp_perusahaan']  = html_escape($data['first_name']);
        $data['kota_perusahaan']  = html_escape($data['first_name']);
        $data['kode_pos_perusahaan']  = html_escape($data['first_name']);
        $data['alamat_perusahaan']  = html_escape($data['first_name']);
        $data['nm_prsh']  = html_escape($data['first_name']);
        
        $data['kabupaten']  = html_escape($data['first_name']);
        $data['kecamatan']  = html_escape($data['first_name']);
        $data['kelurahan']  = html_escape($data['first_name']);
        $data['kode_pos']  = html_escape($data['first_name']);
        $data['rtrw']  = html_escape($data['first_name']);
        $data['alamat_rumah']  = html_escape($data['first_name']);
       
		$data['photo']  = html_escape($data['photo']);
		$data['file_ktp']  = html_escape($data['file_ktp']);
		 // move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/user_image/logo.png');
		
		
        $data['rdc']  = html_escape($this->input->post('course'));
        $data['email']  = html_escape($this->input->post('email'));
        $data['password']  = sha1($this->input->post('password'));
		$data['kd_verify'] = random_string('numeric', 6);
		
        $data['wishlist'] = json_encode(array()); 
        $data['watch_history'] = json_encode(array());
        $social_links = array(
            'facebook' => "",
            'twitter'  => "",
            'linkedin' => ""
        );
        $data['social_links'] = json_encode($social_links);
        $data['role_id']  = 3;
		// var_dump($data);
		$config_photo['upload_path']   = './uploads/user_image/photo/'; 
		$config_ktp['upload_path']   = './uploads/user_image/ktp/'; 
		$config_photo['allowed_types'] = 'gif|jpg|png'; 
		$config_ktp['allowed_types'] = 'gif|jpg|png'; 
		// $config['max_size']      = 1024;
		$config_photo['encrypt_name'] = TRUE;
		$config_ktp['encrypt_name'] = TRUE;
		$this->load->library('upload', $config_photo);
		$this->load->library('upload', $config_ktp);  
     
	  
				// $mesg = $this->load->view('email/verification.php',$data,true);
				// $this->email_model->do_email($mesg, 'Email verification', $data['email']);
		// var_dump($data);
        $validity = $this->user_model->check_duplication('on_create', $data['email']);
	 
        if ($validity) {
		 
		 
				  
			$this->upload->initialize($config_photo);
			
			 if ($this->upload->do_upload($data['photo'])) {
				
				

				$data_upload = $this->upload->data();
				$data['photo'] = $data_upload['file_name'];
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './uploads/user_image/photo/'. $data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '80%',
					'width' => 150 
                ));
				$this->image_lib->resize();
			

			}
			
			$this->upload->initialize($config_ktp);
			 if ($this->upload->do_upload('file_ktp')) {
				
				

				$data_upload_ktp = $this->upload->data();
				$data['file_ktp'] = $data_upload_ktp['file_name'];
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './uploads/user_image/ktp/'. $data_upload_ktp['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
					'quality' => '80%',
					'width' => 150
                ));
				$this->image_lib->resize();
			

			}
			  
		  
             $user_id = $this->user_model->register_user($data);
			 
			 if($user_id){
				$mesg = $this->load->view('email/verification.php',$data,true);
				$this->email_model->do_email($mesg, 'Email verification', $data['email']);
				 $data['page_name'] = "confirmation";
				 $data['page_title'] = get_phrase('confirmation');
				 $this->load->view('frontend/default/index.php',$data);
			 }
			 
			 
			
          /*  $this->session->set_userdata('user_login', '1');
            $this->session->set_userdata('user_id', $user_id);
            $this->session->set_userdata('role_id', 2);
            $this->session->set_userdata('role', get_user_role('user_role', 2));
            $this->session->set_userdata('name', $data['first_name'].' '.$data['last_name']);
            $this->session->set_flashdata('flash_message', get_phrase('your_registration_has_been_successfully_done')); */
        }else {
			 
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
		
		
        // redirect(site_url('home'), 'refresh');
		
		
		 
		
		
		
    }

    public function logout($from = "") {
      //destroy sessions of specific userdata. We've done this for not removing the cart session
      $this->session_destroy();

      if ($from == "user")
        redirect(site_url('home'), 'refresh');
      else
        redirect(site_url('login'), 'refresh');
    }

    public function session_destroy() {
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('role_id');
      $this->session->unset_userdata('role');
      $this->session->unset_userdata('name');
      if ($this->session->userdata('admin_login') == 1) {
        $this->session->unset_userdata('admin_login');
      }else {
        $this->session->unset_userdata('user_login');
      }
    }

    function forgot_password($from = "") {
        $email = $this->input->post('email');
        //resetting user password here
        $new_password = substr( md5( rand(100000000,20000000000) ) , 0,7);

        // Checking credential for admin
        $query = $this->db->get_where('users' , array('email' => $email));
        if ($query->num_rows() > 0)
        {
            $this->db->where('email' , $email);
            $this->db->update('users' , array('password' => sha1($new_password)));
            // send new password to user email
            $this->email_model->password_reset_email($new_password, $email);
            $this->session->set_flashdata('flash_message', get_phrase('please_check_your_email_for_new_password'));
            if ($from == 'backend') {
                redirect(site_url('login'), 'refresh');
            }else {
                redirect(site_url('home'), 'refresh');
            }
        }else {
            $this->session->set_flashdata('error_message', get_phrase('password_reset_failed'));
            if ($from == 'backend') {
                redirect(site_url('login'), 'refresh');
            }else {
                redirect(site_url('home'), 'refresh');
            }
        }
    }
}
