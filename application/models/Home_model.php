<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
    function signUp($signUpData){
		//return $this->db->insert("users",$signUpData);
		return $this->db->insert("advisors",$signUpData);
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
    function checkLogin($phone,$pwd){
		$where=array("phone"=>$phone,"password"=>md5($pwd));
		$this->db->select("id,name,phone,password,role");
		$this->db->from("advisors");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function checkAdminLogin($username,$pwd){
		$where=array("username"=>$username,"password"=>md5($pwd));
		$this->db->select("id,username,password,role");
		$this->db->from("admin");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function getAdvisorName($id){
		$where=array("id"=>$id);
		$this->db->select("name");
		$this->db->from("advisors");
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
		$this->db->select("role");
		$this->db->from("users");
		$this->db->where("role!=","admin");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function getSrCategories(){
		$this->db->select("*");
		$this->db->from("sr_categories");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
		
	}function getStates(){
		$this->db->select("*");
		$this->db->from("states");
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
	function chkPhnumberExist($phone){
		$phnumArr=array("phone"=>$phone);
		$this->db->where($phnumArr);
		$this->db->from("advisors");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
}
