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
}