<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("Home_model");
		$this->load->library("session");
	}
	public function checkSessionExist() {
		if (!isset($this->session->userdata['logged_in']) || ($this->session->userdata['logged_in']!=1)) {
			$this->session->set_flashdata('message', '<div id="srvrerror" class="errorbox">Session expired, Please login again.</div>');		
			redirect('Home');
		 }
	}
	public function index(){
		$data['serviceCategories']=$this->Home_model->getSrCategories();
		$data['states']=$this->Home_model->getStates();
		$this->load->view('common/header');
		$this->load->view('index',$data);
	}
	public function adminlogin(){ 
		$this->load->view('common/header');
		$this->load->view('adminlogin_view');
	}
	function checkAdminLogin(){
		$username=$this->input->post("username");
		$pwd=$this->input->post("pwd");
		$res=$this->Home_model->checkAdminLogin($username,$pwd);
		//print_r($res[0]['role']);exit;
		if(!empty($res)){
			 $this->session->set_userdata("role","1");
			 $this->session->set_userdata("logged_in",1);
			 $this->session->set_userdata("username",$res[0]['username']);
			 $this->session->set_userdata("adminrole",$res[0]['role']);
			 redirect("Admin");
		}
		 else {
			 $this->session->set_userdata("msg","Invalid username OR password");
			 redirect("Home/adminlogin");
		 }
	}
	function signUp(){
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$phone=trim($this->input->post("phone"));
		$signpwd=$this->input->post("signpwd");
		$state=$this->input->post("state");
		$city=$this->input->post("city");
		$aadhar=$this->input->post("aadhar");
		$pan=$this->input->post("pan");
		$area_of_expertise=$this->input->post("category");
		//echo $area_of_expertise;exit;
		$role="advisor";
		$count=0;
		//echo "<pre>";print_r($_FILES);exit;
		  if(!empty($_FILES['file']['name'][0])) {
			  //echo "<pre>";print_r($_FILES);
			  //echo "hi";exit;
				  if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/seerm/uploads/advisordocs')){
					 mkdir($_SERVER['DOCUMENT_ROOT'].'/seerm/uploads/advisordocs/', 0777, TRUE);
				  }
				    $target=$_SERVER['DOCUMENT_ROOT'].'/seerm/uploads/advisordocs/';
					foreach ($_FILES['file']['name'] as $filename) 
					{
						$temp=$target;
						$tmp=$_FILES['file']['tmp_name'][$count];
						$count=$count + 1;
						$temp=$temp.basename($filename);
						move_uploaded_file($tmp,$temp);
						$temp='';
						$tmp='';
						$uploadedFilesCount=$count;
						$uploadedDocs[]=$filename;
					}	       
		       }
		$signUpData=array(
		  "name"=>$name,
		  "email"=>$email,
		  "password"=>md5($signpwd),
		  "phone"=>$phone,
		  "state"=>$state,
		  "city"=>$city,
		  "area_of_expertise"=>$area_of_expertise,
		  "role"=>$role,
		  "status"=>0,
		  "aadhar_number"=>$aadhar,
		  "pan_no"=>$pan
		);
		$phnumberExist=$this->Home_model->chkPhnumberExist($phone);
		 if($phnumberExist){
			  $this->session->set_userdata("msg","Phone number already exist.");
			 redirect("Home");
			 //echo 2;exit;
		 }
		 else {
		$res=$this->Home_model->signUp($signUpData);
		 if($res==1){
			  //$this->sendMail($email,$signpwd);
			   $subject="ecorpadvisors";                   
			   $companyemail= "info@ecopradvisors.com";
			   $content="Dear ".ucwords($name)."login Password is".$signpwd;
			   $recipient = $email;
			   $mailheader = "From: $companyemail \r\n";
			   mail($recipient, $subject, $content, $mailheader) or die("Error!");
			 //echo 1;
			 $this->session->set_userdata("msg","Signed up successfully.");
			 redirect("Home");
		 }
		 else { 
		     //echo 0; exit;
			 $this->session->set_userdata("msg","Signed up failed.");
			 redirect("Home");
		 }
		 }
	}
	function checkLogin(){
		$phone=$this->input->post("phone");
		$pwd=$this->input->post("pwd");
		$res=$this->Home_model->checkLogin($phone,$pwd);
		if(!empty($res)){
		     $this->session->set_userdata("username",$res[0]['name']);
			  $result=$this->Home_model->getAdvisorName($res[0]['id']);
		     $this->session->set_userdata("advisorname",$result[0]['name']);
			 $this->session->set_userdata("role","2");
			 $this->session->set_userdata("logged_in",1);
			 //redirect("Admin/assignedTkts");
			 redirect("Advisors/assignedTkts");
		}
		 else {
			 $this->session->set_userdata("msg","Invalid phone number / password");
			 redirect("Home");
		 }
	}
	//session destroy
	public function sessionUnset(){
		$this->session->sess_destroy();
		$this->session->set_userdata('logged_in', '0');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('advisorname');
	}
	function logout(){
		
		if($this->session->userdata('role')==1){
			$this->sessionUnset();
			 redirect("Home/adminlogin");
		}
		if($this->session->userdata('role')==2){
			$this->sessionUnset();
			 redirect("Home/");
		}
		if($this->session->userdata('role')==3){
			$this->sessionUnset();
			 redirect("Customer/login");
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
              $body ="Dear Customer, your login password is :".$password;
              $this->email->message($body);      
              if($this->email->send()){
                return true;
              }else{
                return false;
              }
     }
	
}
