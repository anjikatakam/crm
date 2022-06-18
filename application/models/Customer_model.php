<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
    function checkCustomerLogin($email,$pwd){
		$where=array("customer_email"=>$email,"customer_password"=>md5($pwd));
		$this->db->select("customer_email,customer_password,customer_name");
		$this->db->from("customers");
		$this->db->where($where);
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function getCustomerTkts($email){
		$this->db->select("*");
		$this->db->from("customers");
		$this->db->where("customer_email",$email);
		$query=$this->db->get();
		return $query->result_array();
	}
	function getCommentsBySrId($srid){
		$this->db->select("*");
		$this->db->from("comments");
		$this->db->where("sr_id",$srid);
		$this->db->where("comment_private","0");
		$this->db->order_by("id","desc");
		$this->db->limit("3");
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result_array();
	}
	function resetPassword($email,$pwd){
		$updatePwd=array("password"=>md5($pwd));
		$this->db->where("customer_email",trim($email));
		return $this->db->update("customers",$updatePwd);
	}
	function checkEmailExist($email){
		$this->db->select("customer_email");
		$this->db->from("customers");
		$this->db->where("customer_email",trim($email));
		$query=$this->db->get();
		return $query->num_rows();
	}
	function genaratePassword($length_of_string) { 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
    return substr(str_shuffle($str_result),0,$length_of_string); 
   }
}