<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("Customer_model");
		$this->load->library("Session");
	}
	function login(){
		$this->load->view('common/header');
		$this->load->view('customer_login_view');
	}
	function checkCustomerLogin(){
		$email=$this->input->post("email");
		$pwd=$this->input->post("pwd");
		$res=$this->Customer_model->checkCustomerLogin($email,$pwd);
		//print_r($res[0]['role']);exit;
		if(!empty($res)){
		 $this->session->set_userdata("userId",$res[0]['customer_email']);
		 $this->session->set_userdata("cname",$res[0]['customer_name']);
		 $this->session->set_userdata("role","3");
			 redirect("Customer/assignedTkts");
		}
		 else {
			 redirect("Customer/login");
		 }
	}
	 function assignedTkts(){
		 $email=$this->session->userdata("userId");
		 $this->load->view('common/header');
		 $data['srRequests']=$this->Customer_model->getCustomerTkts($email);
		$this->load->view('customer_view',$data);
	 }
	 function logout(){
		$this->load->view('common/header');
		$this->load->view('customer_login_view'); 
	 }
	 public function getCommentsBySrId(){
		$srid=$this->input->post("srid");
		$res=$this->Customer_model->getCommentsBySrId($srid);
		echo json_encode($res);
	}
	public function resetPassword(){
		$email=$this->input->post("forgotemail");
		$res=$this->Customer_model->checkEmailExist($email);
		 if($res>0){
			$password=$this->Admin_model->genaratePassword(8);
		    $this->Customer_model->resetPassword($email,$password);
			$this->sendMail($email,$password);
		 }
	}
	public function sendMail($toEmail,$password){
        $config = Array(  
                        'smtp_host' => 'prepnow.online',
                        'smtp_port' => 465,
                        'smtp_user' => 'info@prepnow.online',
                        'smtp_pass' => 'E!&~bT$uc=TK',
                        'mailtype'  => 'html', 
                        'charset'   => 'iso-8859-1',
                        'encryption'  =>'ssl',    
                    );
              $this->load->library('email', $config);
              $this->email->clear();
              $this->email->set_newline("\r\n");
              $this->email->from('info@prepnow.online');
              $this->email->to($toEmail);
              //$this->email->bcc('anjikatakam@gmail.com');
              $this->email->subject("Ecorpadvisor");
              //$body = $this->load->view("admin/templates/$type",$data,TRUE);
              $body ="Dear Customer, your new login password is :".$password;
              $this->email->message($body);      
              if($this->email->send()){
                return true;
              }else{
                return false;
              }
     }
	
}