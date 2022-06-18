<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("Home_model");
		$this->load->library("Session");
	}
	public function index(){
	    $data['srRequests']=$this->Home_model->getSrRequests();
		$this->load->view('common/header');
		$this->load->view('admin_view',$data);
		//$this->load->view('common/footer');
	}
	public function createSrRequest(){
        $title=$this->input->post("title");
        $sr_category=$this->input->post("sr_category");
        $description=$this->input->post("description");
        $contact_number=$this->input->post("contact_number");
		$sr_requestData=array(
		   "title"=>$title,
		   "sr_category"=>$sr_category,
		   "description"=>$description,
		   "contact_number"=>$contact_number
		);
		$res=$this->Home_model->createSrRequest($sr_requestData);
		 if($res==1){
			 echo 1;exit;
		 }
		 else {
			 echo 0;exit;
		 }
	}
	// public function getSrRequests(){
		// $this->Home_model->getSrRequests();
	// }
	public function assignedTkts(){
	   $user_id=$this->session->userdata('userId'); 
		$data['tickets']=$this->Home_model->assignedTkts($user_id);
		$this->load->view("tickets_view",$data);
	}
	public function getAdvisorsList(){
		$res=$this->Home_model->getAdvisorsList();
		echo json_encode($res);
	}
	public function assignTkt(){
		$role=$this->input->post("role");
		$srNumber=$this->input->post("srNumber");
		$user_id=$this->session->userdata("user_id");
		$exist=$this->Home_model->chkAlreadyAssign($role,$srNumber);
		 if(!empty($exist)){
			 echo 2;exit;
		 }
		 else {
		$res=$this->Home_model->assignTkt($role,$srNumber);
		 if($res==1){
			 echo 1;exit;
		 }
		 else {
			 echo 0;exit;
		 }
	   }
	}
	
	
	
	
}
