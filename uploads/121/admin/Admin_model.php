<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function signUp($signUpData){
		return $this->db->insert("users",$signUpData);
	}
	function createSrRequest($sr_requestData){
		return $this->db->insert("sr_requests",$sr_requestData);
	}
	function assignTkt($role,$srNumber){
		$data=array("sr_request"=>$srNumber,"role"=>$role);
		return $this->db->insert("tickets_assigned",$data);
	}
	function chkAlreadyAssign($role,$srNumber){
		$where=array("sr_request"=>$srNumber,"role"=>$role);
		$this->db->select("sr_request,role");
		$this->db->from("tickets_assigned");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
    function checkLogin($email,$pwd){
		$where=array("email"=>$email,"password"=>md5($pwd));
		$this->db->select("email,password,role,user_id");
		$this->db->from("users");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function getSrRequests(){
		$this->db->select("*");
		$this->db->from("sr_requests");
		$this->db->order_by("sr_request","desc");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function getAdvisorsList(){
		$this->db->select("role,name");
		$this->db->from("users");
		$this->db->where("role!=","admin");
		$this->db->where("area_of_expertise","GST");
		$this->db->where("city","hyd");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function assignedTkts($user_id){
		$where=array("role"=>$user_id);
		$this->db->select("sr_request,role");
		$this->db->from("tickets_assigned");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function getsridDetails($srid){
		$this->db->select("*");
		$this->db->from("sr_requests");
		$this->db->where("sr_request",$srid);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
		
	}
	function getSrCategories(){
		$this->db->select("*");
		$this->db->from(" sr_categories");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
		
	}
	function submitAdminComment($commetArr){
		return $this->db->insert("comments",$commetArr);
	}
	function getCommentsBySrId($srid){
		$this->db->select("*");
		$this->db->from("comments");
		$this->db->where("sr_id",$srid);
		$this->db->order_by("id","desc");
		$this->db->limit("3");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function updateSrRequestDetails($updateArr,$esr_id){
		$this->db->where("sr_request",$esr_id);
		$this->db->update("sr_requests",$updateArr);
		//echo $this->db->last_query();exit;
		return $this->db->affected_rows();
	}
	function createCustomerAccount($customerArr){
		$this->db->select("customer_email");
		$this->db->where("customer_email",$customerArr['customer_email']);
		$this->db->where("customer_sr_id",$customerArr['customer_sr_id']);
		$this->db->from("customers");
		$query=$this->db->get();
		$num_rows=$query->num_rows();
		if($num_rows==0){
			$this->db->insert("customers",$customerArr);
		}
		else{
		$this->db->where("customer_email",trim($customerArr['customer_email']));
		$this->db->where("customer_sr_id",$customerArr['customer_sr_id']);
		$this->db->update("customers",$customerArr);
		}
	}
}
