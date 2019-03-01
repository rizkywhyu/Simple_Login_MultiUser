<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public $table = 'user';
    public $id = 'id_user';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('username', $q);
        $this->db->like('email', $q);
    	$this->db->or_like('password', $q);
        $this->db->like('role', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('username', $q);
        $this->db->like('email', $q);
        $this->db->or_like('password', $q);
        $this->db->like('role', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    
    function create_data($data)
    {
        $this->db->insert($this->table, $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else{
            return false;
        }
    }

    function valid_uname($username)
    {
        $query = $this->db->get_where($this->table, array('username' => $username));
        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function get_by_uname($data){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('username', $data);
        return $this->db->get();
    }

    public function ForgotPassword($email)
    {
        $this->db->select('email');
        $this->db->from($this->table); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
    }

    public function sendpassword($data)
    {
            $this->load->library("PHPMailerAutoload.php");
            $email = $data['email'];
            $query1=$this->db->query("SELECT *  from user where email = '".$email."' ");
            $row=$query1->result_array();
            if ($query1->num_rows()>0)
          
    {
            $passwordplain = "";
            $passwordplain  = rand(999999999,9999999999);
            $newpass['password'] = md5($passwordplain);
            $this->db->where('email', $email);
            $this->db->update('user', $newpass); 
            $mail_message='Dear '.$row[0]['firstName'].','. "\r\n";
            $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
            $mail_message.='<br>Please Update your password.';
            $mail_message.='<br>Thanks & Regards';
            $mail_message.='<br>Your company name';        
            date_default_timezone_set('Etc/UTC');
            // require FCPATH."libraries/phpmailer/PHPMailerAutoload.php";
            // include_once APPPATH.'/libraries/phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPSecure = "tls"; 
            // $mail->Debugoutput = 'html';
            $mail->Host = "www.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;   
            $mail->Username = "setrikalistrik258@gmail.com";    
            $mail->Password = "adminop123";
            $mail->setFrom('admin@site', 'admin');
            $mail->IsHTML(true);
            $mail->addAddress($email);
            $mail->Subject = 'OTP from company';
            $mail->Body    = $mail_message;
            $mail->AltBody = $mail_message;
    if (!$mail->send()) {
         $this->session->set_flashdata('message','Gagal, Coba Lagi!');
    } else {
       $this->session->set_flashdata('message','Password telah dikirim ke email anda!');
    }
      redirect(base_url('welcome/view_login','refresh'));        
    }
    else
    {  
     $this->session->set_flashdata('message','Email tidak ditemukan!');
     redirect(base_url('welcome/view_login','refresh'));
    }
    }


}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */