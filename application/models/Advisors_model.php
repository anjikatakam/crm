<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advisors_model extends CI_Model {
	
    function getAllAdvisors(){
	    $this->db->select("*");
		$this->db->from("advisors");
		$query=$this->db->get();
		return $query->result_array();
	}
	function getAdvisorDetails($advrid){
		$this->db->select("*");
		$this->db->from("advisors");
		$this->db->where("id",$advrid);
	    $query=$this->db->get();
		return $query->result_array();
	}
	function updateAdvisor($updateadvrArr,$eid){
		$this->db->where("id",$eid);
		$this->db->update("advisors",$updateadvrArr);
		$res=$this->db->affected_rows(); 
	}
	function deleteAdvisor($eid){
		$this->db->where("id",$eid);
		return $this->db->delete("advisors");
	}
	function getAdvisor($eid){
		$this->db->select("name,email,password");
		$this->db->from("advisors");
		$this->db->where("id",$eid);
		$query=$this->db->get();
		return $query->result_array();
	}
	function changetoAdmin($data){
		 return $this->db->insert("admin",$data);
	}
	function chkMailExist($email){
		$this->db->select("email");
		$this->db->from("admin");
		$this->db->where("email",$email);
		$query=$this->db->get();
		return $query->result_array();
	}
	function changeAdvisorRole($eid){
		$updateArr=array("role"=>"admin");
		$this->db->where("id",$eid);
		$this->db->update("advisors",$updateArr);
	}
	function deleteFromAdmin($email,$name){
		$this->db->where("email",trim($email));
		$this->db->where("username",trim($name));
		$this->db->delete("admin");
	}
	function changeAdmintoAdvisor($eid){
		$updateArr=array("role"=>"advisor");
		$this->db->where("id",$eid);
		$this->db->update("advisors",$updateArr);
	}
	
	
}
