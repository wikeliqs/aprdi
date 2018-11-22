<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
 
	 public function kodepos($param1 = "") {
        if ($param1 != "") {
            $this->db->where('kodepos', $param1);
        }
        $this->db->where('kodepos', '');
        return $this->db->get('kodepos');
    }
	
}