<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class PHPMailerAutoload {
     function PHPMailerAutoload() {
          // require_once("/libraries/phpmailer/PHPMailerAutoload.php");
     	include_once APPPATH.'/libraries/phpmailer/PHPMailerAutoload.php';
     } 
}