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
	function chkAlreadyAssign($advisor,$srNumber){
		$where=array("sr_request"=>$srNumber,"advisor"=>$advisor);
		$this->db->select("sr_request,advisor");
		$this->db->from("sr_requests");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function assignTktToAdvisor($advisor,$srNumber){
		$where=array("sr_request"=>$srNumber,"advisor"=>$advisor);
		$this->db->select("sr_request,advisor");
		$this->db->from("sr_requests");
		$this->db->where($where);
		$query=$this->db->get();
		 if($query->num_rows()==1){
			 echo 2;
		 }
		 else {
			  $updatewhere=array("sr_request"=>$srNumber);
			  $updatedata=array("advisor"=>$advisor);
              $this->db->where($updatewhere);
              $this->db->update("sr_requests",$updatedata);
			  return $this->db->affected_rows();
		 }
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
	function getLocationsList($sr_category_id){
		$this->db->select("state,city");
		$this->db->where("area_of_expertise",$sr_category_id);
		$this->db->from("advisors");
		$query=$this->db->get();
		return $query->result_array();
	}
	function getAdvisorsList($sr_category_id,$loc){
		$this->db->select("id,phone,name,area_of_expertise");
		$this->db->from("advisors");
		//$this->db->where("area_of_expertise",$sr_category_id);
		$this->db->like("area_of_expertise",$sr_category_id,"both");
		$this->db->where("status","1");
		//$this->db->where("city",$loc);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function getAdvisorsList2(){
		$this->db->select("role,name");
		$this->db->from("users");
		$this->db->where("role!=","admin");
		//$this->db->where("area_of_expertise","GST");
		//$this->db->where("city","hyd");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function assignedTkts($advisor){
		$where=array("advisor"=>$advisor);
		$this->db->select("*");
		$this->db->from("sr_requests");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function assignTktsCount($advisor){
		$where=array("advisor"=>$advisor);
		$this->db->select("opportunity_status,count(opportunity_status) as count");
		$this->db->from("sr_requests");
		$this->db->where($where);
		$this->db->group_by("opportunity_status");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function assignTktsCountbyLeadStatus($advisor){
		$where=array("advisor"=>$advisor);
		$this->db->select("lead_status,count(lead_status) as count");
		$this->db->from("sr_requests");
		$this->db->where($where);
		$this->db->group_by("lead_status");
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
		$this->db->from("sr_categories");
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
	function getDocsByCommentId($commentId){
		$this->db->select("*");
		$this->db->from("comments");
		$this->db->where("id",$commentId);
		$query=$this->db->get();
		return $query->result_array();
	}
	function moreCommentsInfo($serviceId){
		$this->db->select("*");
		$this->db->from("comments");
		$this->db->where("sr_id",$serviceId);
		$this->db->order_by("created_date","desc");
		$query=$this->db->get();
		return $query->result_array();
	}
	function genaratePassword($length_of_string) { 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
    return substr(str_shuffle($str_result),0,$length_of_string); 
   } 
   function countbyopstatus() {
	    $this->db->select("opportunity_status,count(opportunity_status) as count");
		$this->db->from("sr_requests");
		$this->db->group_by("opportunity_status");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
   }
   function countbyleadstatus() {
	    $this->db->select("lead_status,count(lead_status) as count");
		$this->db->from("sr_requests");
		$this->db->group_by("lead_status");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
   }
   function getTktsByLeadStatus($lstatus){
	    $this->db->select("*");
		$this->db->from("sr_requests");
		$this->db->where("lead_status",$lstatus);
		$query=$this->db->get();
		return $query->result_array();
   }
   function getTktsByOpStatus($opstatus){
	   $this->db->select("*");
		$this->db->from("sr_requests");
		 if($opstatus!="All"){
		$this->db->where("opportunity_status",$opstatus);
		 }
		$query=$this->db->get();
		return $query->result_array();
   }
   function getTktsByAdvLeadStatus($lstatus,$advisor){
	    $this->db->select("*");
		$this->db->from("sr_requests");
		$this->db->where("lead_status",$lstatus);
		$this->db->where("advisor",$advisor);
		$query=$this->db->get();
		return $query->result_array();
   }
   function getTktsByAdvOpStatus($opstatus,$advisor){
	    $this->db->select("*");
		$this->db->from("sr_requests");
		 if($opstatus!="All"){
		$this->db->where("opportunity_status",$opstatus);
		 }
		$this->db->where("advisor",$advisor);
		$query=$this->db->get();
		return $query->result_array();
   }
   function insertNewSrCategory($newCat){
	   $data=array('sr_category'=>$newCat); 
	   return $this->db->insert("sr_categories",$data);
   }
   function getDueDate($srid){
	   $this->db->select("due_date");
	   $this->db->from("sr_requests");
	   $this->db->where("sr_request",$srid);
	   $query=$this->db->get();
	   return $query->result_array();
   }
	
}
