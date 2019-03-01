<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];

	}
	
	public function get_servertime() {
		$now = new DateTime(); 
        $dt = $now->format("M j, Y H:i:s O"); 

        j($dt);
	}
	
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function view_login(){
        $this->load->view('v_login');
    }

    public function home(){
    	// $user = $this->Auth_model->get_tampil($this->session->userdata('id'));
     //    $data = array(
            
     //        'user_data' => $user
     //    );
    	$this->load->view('inti/header');
    	$this->load->view('inti/index');
    	$this->load->view('inti/footer');
    }

    public function forgot(){
        $this->load->view('v_forgot');
    }

    
}
