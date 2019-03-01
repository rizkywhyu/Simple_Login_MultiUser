<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Auth extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->db->query("SET time_zone='+7:00'");
        $waktu_sql = $this->db->query("SELECT NOW() AS waktu")->row_array();
        $this->waktu_sql = $waktu_sql['waktu'];
    }

   
    public function registrasi(){
        $this->load->view('regis');
    }
   
    public function insertnew(){
        $this->_rules();
        if ($this->form_validation->run()==FALSE){
            $this->load->view('regis');
        }
        else{
            $data =  array(
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'), 
                'password' => md5($this->input->post('password')), 
                'role' => $this->input->post('role')
                );
            $this->Auth_model->create_data($data);
            $this->session->set_flashdata('message','Registrasi Berhasil!');   
            // $this->output->enable_profiler(TRUE);
            redirect(site_url('welcome/view_login'));
        }
    }

    public function login(){
        $this->_ruless();
        if ($this->form_validation->run()==FALSE){
            $this->load->view('v_login');
        }
        else{
        $pass = md5($this->input->post('password'));
        $data = $this->input->post('username');
        $query=$this->Auth_model->get_by_uname($data);
        // $remember = $this->input->post('remember_me');
        if($query->num_rows()>0){
            if($query->row()->password == $pass){
        //         if ($remember) {
        //     $this->session->set_userdata('remember_me', TRUE);
        // }
                foreach ($query->result() as $result1) 
                {
                    $sess = array(
                        'id_user'=> $result1->id_user,
                        'firstName'=> $result1->firstName,
                        'lastName' => $result1->lastName,
                        'email' => $result1->email,
                        'username' => $result1->username
                        );
                }
                $this->session->set_userdata('logged',$sess);
                if($query->row()->role == 'Admin'){
                    redirect(site_url('welcome/home'));
                } elseif ($query->row()->role == 'Guru') {
                    redirect(site_url('welcome/home'));
                } elseif ($query->row()->role == 'Siswa') {
                    redirect(site_url('welcome/home'));
                } else {
                    // $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Akun anda belum terdaftar</div>');  
                    // redirect(site_url('welcome/view_login'));
                    // break;
                    echo "<script>
                    alert('Username atau password yang anda masukkan salah');
                    document.location.href='".site_url('welcome/view_login')."';
                    </script>";
                    break;
                } 
                // else{
                //     $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Username atau Password yang anda masukkan salah</div>');  
                //     redirect(site_url('welcome/view_login'));
                //     break;
                // }
            }else{
                // $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Username atau Password yang anda masukkan salah</div>');  
                // redirect(base_url('welcome/view_login'));
                // break;
                echo "<script>
                    alert('Username atau password yang anda masukkan salah');
                    document.location.href='".site_url('welcome/view_login')."';
                    </script>";
                    break;
            }
        } else {
            // $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Username atau Password yang anda masukkan salah</div>');  
            // redirect(base_url('welcome/view_login'));
            echo "<script>
                    alert('Username atau password yang anda masukkan salah');
                    document.location.href='".site_url('welcome/view_login')."';
                    </script>";
        }
        }

    }

    public function logout(){
        session_destroy();
        redirect('welcome/view_login');
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('firstName', 'firstName', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lastName', 'lastName', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean|callback_valid_uname');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('role', 'role', 'trim|required|xss_clean');
        
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _ruless() 
    {
        // $this->form_validation->set_rules('firstName', 'firstName', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('lastName', 'lastName', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('role', 'role', 'trim|required|xss_clean');
        
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function valid_uname($username)
    {
        if ($this->Auth_model->valid_uname($username) == TRUE)
        {
            //echo 'valid_id',"<script>alert('Data yang diinputkan sudah ada')</script>";
            // echo 'valid_id', "kode guru dengan Kode $kodeguru sudah terdaftar";
            $this->form_validation->set_message('valid_uname', "Username $username sudah terdaftar");
            return FALSE;
        }
        else
        {           
            return TRUE;
        }
    }

    public function ForgotPassword()
    {
          // $this->_ruless();
          // if ($this->form_validation->run()==FALSE){
          //   $this->load->view('v_forgot');
          // }
          // else{
          $email = $this->input->post('email');      
          $findemail = $this->Auth_model->ForgotPassword($email);  
          if($findemail){
            $this->Auth_model->sendpassword($findemail);        
          }else{
            $this->session->set_flashdata('message',' Email tidak ditemukan!');
            redirect(base_url('welcome/view_login','refresh'));
      }
    // }
    }

    
 
   

  

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */