<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advisors extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("Advisors_model");
		$this->load->model("Admin_model");
		$this->load->library("Session");
	}
	public function assignedTkts(){
		$this->checkSessionExist();
	    $advisor=trim($this->session->userdata("username")); 
		$data['tickets']=$this->Admin_model->assignedTkts($advisor);
		$data['count']=$this->Admin_model->assignTktsCount($advisor);
		$data['lscount']=$this->Admin_model->assignTktsCountbyLeadStatus($advisor);
		 $data['serviceCategories']=$this->Admin_model->getSrCategories();
		$this->load->view("common/header");
		$this->load->view("advisor_view",$data);
	}
	public function checkSessionExist() {
		if (!isset($this->session->userdata['logged_in']) || ($this->session->userdata['logged_in']!=1)) {
			$this->session->set_flashdata('message', '<div id="srvrerror" class="errorbox">Session expired, Please login again.</div>');		
			redirect('Home');
		 }
	}
	public function index(){
		$this->checkSessionExist();
	    $data['advisors']=$this->Advisors_model->getAllAdvisors();
		$this->load->view('common/header');
		$this->load->view('show_all_advisors',$data);
	}
	function getAdvisorDetails(){
		$advrid=trim($this->input->post("advrid"));
		$result=$this->Advisors_model->getAdvisorDetails($advrid);
		echo json_encode($result);
		
	}
	function updateAdvisor(){
		$this->checkSessionExist();
		 $eid=trim($this->input->post("eid"));
		 $ename=trim($this->input->post("ename"));
		 $email=trim($this->input->post("email"));
		 $estate=trim($this->input->post("estate"));
		 $ecity=trim($this->input->post("ecity"));
		 $estatus=trim($this->input->post("estatus"));
		 $updateadvrArr=array(
		                   "name"=>$ename,
		                   "email"=>$email,
		                   "state"=>$estate,
		                   "city"=>$ecity,
		                   "status"=>$estatus
						   );
		 $rec=$this->Advisors_model->updateAdvisor($updateadvrArr,$eid);
		  if($rec==1){
			  $this->session->set_userdata("msg","Advisor details updated successfully");
			  redirect("Advisors");
		  }
		  else {
			  $this->session->set_userdata("msg","Advisor details updated successfully");
			   redirect("Advisors");
		  }
	}
	function deleteAdvisor(){
		 $eid=trim($this->input->post("advrid"));
		 $isDel=$this->Advisors_model->deleteAdvisor($eid);
		 echo $isDel;
	}
	function changetoAdmin(){
		 $eid=trim($this->input->post("advrid"));
		 $getAdvisor=$this->Advisors_model->getAdvisor($eid);
		foreach($getAdvisor as $advisor){
			 $name=$advisor['name'];
			 $email=$advisor['email'];
			 $password=$advisor['password'];
		}
		 $data=array(
		     "username"=>$name,
		     "email"=>$email,
		     "password"=>$password,
		     "role"=>2
		 );
		 $chkEmailExist=$this->Advisors_model->chkMailExist($email);
		  if(empty($chkEmailExist)){
			   echo $isDel=$this->Advisors_model->changetoAdmin($data);
			       if(!empty($isDel)){
					   $this->Advisors_model->changeAdvisorRole($eid);
				   }
			   
		  }
		  else {
			 echo 2;exit; 
		  }
	}
	function changetoAdvisor(){
		 $eid=trim($this->input->post("advrid"));
		 $getAdvisor=$this->Advisors_model->getAdvisor($eid);
		foreach($getAdvisor as $advisor){
			 $name=$advisor['name'];
			 $email=$advisor['email'];
		}
		 $chkEmailExist=$this->Advisors_model->chkMailExist($email);
		  if(!empty($chkEmailExist)){
			  $isDel=$this->Advisors_model->deleteFromAdmin($email,$name);
			  $this->Advisors_model->changeAdmintoAdvisor($eid);
			  echo 1;
			  exit;
   
		  }
		  else {
			 echo 2;exit; 
		  }
	}
	 
	
	
	
	
	
}
