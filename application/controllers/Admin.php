<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("Admin_model");
		$this->load->library("Session");
	}
	public function checkSessionExist() {
		if (!isset($this->session->userdata['logged_in']) || ($this->session->userdata['logged_in']!=1)) {
			$this->session->set_flashdata('message', '<div id="srvrerror" class="errorbox">Session expired, Please login again.</div>');		
			redirect('Home');
		 }
	}
	public function index(){
		$this->checkSessionExist();
	    $data['srRequests']=$this->Admin_model->getSrRequests();
	    $data['serviceCategories']=$this->Admin_model->getSrCategories();
		$this->load->view('common/header');
		$this->load->view('admin_view',$data);
	}
	public function createSrRequest(){
		$this->checkSessionExist();
        $title=$this->input->post("title");
        $sr_category=$this->input->post("sr_category");
        $description=$this->input->post("description");
        $contact_number=$this->input->post("contact_number");
		$sr_requestData=array(
		   "title"=>$title,
		   "sr_category"=>$sr_category,
		   "description"=>$description,
		   "contact_number"=>$contact_number,
		   "opportunity_status"=>"New",
		   "lead_status"=>"Warm Lead",
		   "opportunity_cost"=>0
		);
		$res=$this->Admin_model->createSrRequest($sr_requestData);
		 if($res==1){
			 //echo 1;exit;
			 $this->session->set_userdata("msg","Service request created successfully");
			 redirect("Admin");
		 }
		 else {
			// echo 0;exit;
			$this->session->set_userdata("msg","Failed to create service requet try again");
			redirect("Admin");
		 }
	}
	public function assignedTkts(){
		$this->checkSessionExist();
	    $advisor=trim($this->session->userdata("username")); 
		$data['tickets']=$this->Admin_model->assignedTkts($advisor);
		$data['count']=$this->Admin_model->assignTktsCount($advisor);
		$data['lscount']=$this->Admin_model->assignTktsCountbyLeadStatus($advisor);
		$this->load->view("common/header");
		$this->load->view("tickets_view",$data);
	}
	public function getLocationsList(){
		$sr_category_id=$this->input->post("sr_category_id");
		$res=$this->Admin_model->getLocationsList($sr_category_id);
		echo json_encode($res);
	}
	public function getAdvisorsList(){
		$loc=trim($this->input->post("loc"));
		$sr_category_id=$this->input->post("sr_category_id");
		$res=$this->Admin_model->getAdvisorsList($sr_category_id,$loc);
		echo json_encode($res);
	}
	public function assignTkt(){
		$service_category=trim($this->input->post("service_category"));
		$location=trim($this->input->post("location"));
		$advisor=trim($this->input->post("advisor"));
		$srNumber=$this->input->post("srNumber");
		$user_id=$this->session->userdata("user_id");
		$exist=$this->Admin_model->chkAlreadyAssign($advisor,$srNumber);
		 if(!empty($exist)){
			 echo 2;exit;
		 }
		 else {
		//$res=$this->Admin_model->assignTkt($advisor,$srNumber);
		$res=$this->Admin_model->assignTktToAdvisor($advisor,$srNumber);
		 if($res==1){
			 echo 1;exit;
		 }
		 else {
			 echo 0;exit;
		 }
	   }
	}
	/*public function assignTkt(){
		$role=$this->input->post("role");
		$srNumber=$this->input->post("srNumber");
		$user_id=$this->session->userdata("user_id");
		$exist=$this->Admin_model->assignTktToAdvisor($role,$srNumber);
		 if($exist==2){
			 echo 2;exit;
		 }
		 else {
		 if($exist==1){
			 echo 1;exit;
		 }
		 else {
			 echo 0;exit;
		 }
	   }
	}*/
	public function getsridDetails(){
		$srid=$this->input->post("srid");
		$res=$this->Admin_model->getsridDetails($srid);
		echo json_encode($res);
	}
	public function createNewSrCategory(){
		$newFiled=$this->input->post("newFiled");
		$res=$this->Admin_model->insertNewSrCategory($newFiled); 
		if($res==1) {
			 $this->session->set_userdata("msg","Service request created successfully");
	       	 redirect("Admin");
		}
		else {
			$this->session->set_userdata("msg","Service request created failed try again");
	       	 redirect("Admin");
		}
		
	}
	public function submitAdminComment(){
		//echo "<pre>";print_r($_POST);exit;
		//print_r($_FILES['file']);
		$role=$this->session->userdata("role");//exit;
		$username=$this->session->userdata("username");
		$chatMsg=$this->input->post("chatMsg");
		$srid=$this->input->post("srid");
	    $privatenote=$this->input->post("private");
		$uploadedFilesCount="";
		$uploadedDocs=array();
		 if($privatenote==""){
			 $privatenote=0;
		 }
		 $rolename="";
		// echo $privatenote;exit;
		 if($role==1) {
			 $rolename="admin";
		 }
		 if($role==2) {
			 $rolename="advisor";
		 } 
		 if($role==3) {
			 $rolename="customer";
		 }
		  $count=0;
		  if(!empty($_FILES['file']['name'][0])) {
			  //echo "<pre>";print_r($_FILES);
			  //echo "hi";exit;
				  if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/in/crm/uploads/'.trim($srid).'/'.$rolename)){
					 mkdir($_SERVER['DOCUMENT_ROOT'].'/in/crm/uploads/'.trim($srid).'/'.$rolename, 0777, TRUE);
				  }
				    $target=$_SERVER['DOCUMENT_ROOT'].'/in/crm/uploads/'.trim($srid).'/'.$rolename."/";
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
		  //echo $uploadedFilesCount; 
		  $docs=json_encode($uploadedDocs); 
		  $commetArr=array(
		  "sr_id"=>$srid,
		  "comment"=>$chatMsg,
		  "created_by"=>$role,
		  "name"=>$username,
		  "comment_private"=>$privatenote,
		  "uploads_count"=>$uploadedFilesCount,
		  "uploaded_docs"=>$docs
		);
		$res=$this->Admin_model->submitAdminComment($commetArr);
		if($res==1){
			//echo 1;exit;
			$this->session->set_userdata("msg","Your comment and has been submitted successfully");
			 if($role==2){
			redirect("Advisors/assignedTkts");
			 } 
			 if($role==1){
			redirect("Admin");
			 }
			 if($role==3){
			redirect("Customer/assignedTkts");
			 }
		}
		else {
			$this->session->set_userdata("msg","Your comment submission failed contact to admin");
			redirect("Admin");
		}
	}
	public function submitAdminListComment(){
		//echo "<pre>";print_r($_POST);exit;
		//print_r($_FILES['file']);
		$role=$this->session->userdata("role");//exit;
		$chatMsg=$this->input->post("chatMsg");
		$srid=$this->input->post("srid");
	    $privatenote=$this->input->post("private");
		$uploadedFilesCount="";
		$uploadedDocs=array();
		 if($privatenote==""){
			 $privatenote=0;
		 }
		 $rolename="";
		// echo $privatenote;exit;
		 if($role==1) {
			 $rolename="admin";
		 }
		 if($role==2) {
			 $rolename="advisor";
		 } 
		 if($role==3) {
			 $rolename="customer";
		 }
		  $count=0;
		  if(!empty($_FILES['file']['name'][0])) {
			  //echo "<pre>";print_r($_FILES);
			  //echo "hi";exit;
				  if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/seerm/uploads/'.trim($srid).'/'.$rolename)){
					 mkdir($_SERVER['DOCUMENT_ROOT'].'/seerm/uploads/'.trim($srid).'/'.$rolename, 0777, TRUE);
				  }
				    $target=$_SERVER['DOCUMENT_ROOT'].'/seerm/uploads/'.trim($srid).'/'.$rolename."/";
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
		  //echo $uploadedFilesCount; 
		  $docs=json_encode($uploadedDocs); 
		  $commetArr=array("sr_id"=>$srid,
		  "comment"=>$chatMsg,
		  "created_by"=>$role,
		  "comment_private"=>$privatenote,
		  "uploads_count"=>$uploadedFilesCount,
		  "uploaded_docs"=>$docs
		);
		$res=$this->Admin_model->submitAdminComment($commetArr);
		if($res==1){
			//echo 1;exit;
			$this->session->set_userdata("msg","Your comment and has been submitted successfully");
			 if($role==2){
			redirect("Admin/assignedTkts");
			 } 
			 if($role==1){
			redirect("Admin/adminList");
			 }
		}
		else {
			$this->session->set_userdata("msg","Your comment submission failed contact to admin");
			redirect("Admin/adminList");
		}
	}
	public function getCommentsBySrId(){
		$srid=$this->input->post("srid");
		$res=$this->Admin_model->getCommentsBySrId($srid);
		echo json_encode($res);
	}
	public function updateSrRequestDetails(){
		//print_r($_POST);exit;
		$etitle=$this->input->post("etitle"); 
		$esr_category=$this->input->post("esr_category");
		$edescription=$this->input->post("edescription");
		$ename=$this->input->post("ename");
		$eemail=$this->input->post("eemail");
		$eopportunity_cost=$this->input->post("eopportunity_cost");
		$eopportunity_status=$this->input->post("eopportunity_status");
		$elead_status=$this->input->post("elead_status");
		$esr_id=$this->input->post("esrid");
		$econtact=$this->input->post("econtact");
		$priority=$this->input->post("priority");
		$due_date=$this->input->post("dueDate");
		$updateArr=array(
		 "title"=>$etitle,
		 "sr_category"=>$esr_category,
		 "description"=>$edescription,
		 "contact_number"=>$econtact,
		 "customer_name"=>$ename,
		 "email"=>$eemail,
		 "due_date"=>$due_date,
		 "opportunity_cost"=>$eopportunity_cost,
		 "lead_status"=>$elead_status,
		 "opportunity_status"=>$eopportunity_status,
		 //"advisor"=>$advisor,
		 "priority"=>$priority,
		);
		 $res=$this->Admin_model->updateSrRequestDetails($updateArr,$esr_id);
		 $this->session->unset_userdata("msg");
		  if($res==1) {
			   /*Create an user and Sent an email if work in progress mode */
			   if($eopportunity_status=="Work In Progress"){
				   $password=$this->Admin_model->genaratePassword(8);
					$this->sendMail($eemail,$password);
			   }
			   else {
				   $password="";
			   }
				  $customerArr=array(
				 "customer_sr_id"=>$esr_id,
				 "customer_sr_category"=>$esr_category,
				 "customer_email"=>$eemail,
				 "customer_password"=>md5($password),
				 "customer_name"=>$ename,
				 "title"=>$etitle,
				 "customer_phone"=>$econtact,
				 "due_date"=>$due_date,
				 "opportunity_cost"=>$eopportunity_cost,
				 "lead_status"=>$elead_status,
				 "opportunity_status"=>$eopportunity_status,
				 //"advisor"=>$advisor,
				 "priority"=>$priority
				 );
				$this->Admin_model->createCustomerAccount($customerArr);
			   
			   /*End Create an user and Sent an email if work in progress mode */
			 $this->session->set_userdata("msg","Service request details updated successfully");
			  redirect("Admin");
		  }
		  else {
			 $this->session->set_userdata("msg","Service request details updation failed");
			  redirect("Admin");
		  }
	}
	public function downloadDocs(){
		$commentId=$_GET['cmtId'];
		$role=$this->session->userdata("role");
		if($role==1) {
			 $role="admin";
		 }
		 if($role==2) {
			 $role="advisor";
		 } 
		 if($role==3) {
			 $role="customer";
		 }
		$result=$this->Admin_model->getDocsByCommentId($commentId);
		//echo "<pre>";print_r($result[0]['uploaded_docs']);
		$srid=$result[0]['sr_id'];
	     $docs=$result[0]['uploaded_docs'];
		$docsArray=json_decode($docs);
		 foreach($docsArray as $doc){
			 
			 $href=base_url().'/uploads/'.trim($srid).'/'.$role.'/'.$doc;
			 //echo $href;
			 echo '<a href="'.$href.'">'.$doc.'</a><br/>';
		 }
	}
	public function moreCommentsInfo($serviceId){
		$data['commentDetails']=$this->Admin_model->moreCommentsInfo($serviceId);
		$this->load->view("common/header");
		$this->load->view("showall_comments_view",$data);
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
              $body ="Dear Customer, your username is:".$toEmail." your login password is :".$password;
              $this->email->message($body);      
              if($this->email->send()){
                return true;
              }else{
                return false;
              }
     }
    public function adminList(){
		$this->checkSessionExist();
	    $data['tickets']=$this->Admin_model->getSrRequests();
	    $data['countbyopstatus']=$this->Admin_model->countbyopstatus();
	    $data['countbyleadstatus']=$this->Admin_model->countbyleadstatus();
	    $data['serviceCategories']=$this->Admin_model->getSrCategories();
		$this->load->view("common/header");
		$this->load->view("admin_list_view",$data);
	}
	
	public function getTktsByAdvLeadStatus(){
		$lstatus=$this->input->post("lsval");
		$advisor=trim($this->session->userdata("username")); 
		//$this->Admin_model->getTktsByAdvLeadStatus($lstatus,$advisor);
		$data['tickets']=$this->Admin_model->getTktsByAdvLeadStatus($lstatus,$advisor);
		$this->load->view("common/header");
		$this->load->view("admin_list_view",$data); 
	}
	public function getTktsByAdvOpStatus(){
		$opStatus=$this->input->post("opStatus");
		$advisor=trim($this->session->userdata("username")); 
		$data['tickets']=$this->Admin_model->getTktsByAdvOpStatus($opStatus,$advisor);
		$this->load->view("common/header");
		$this->load->view("tickets_view",$data);
	}
	public function getTktsByOpStatus(){
		$opStatus=$this->input->post("opStatus");
		$data['tickets']=$this->Admin_model->getTktsByOpStatus($opStatus);
		$this->load->view("common/header");
		$this->load->view("admin_list_view",$data); 
	}
	public function getTktsByLeadStatus(){
		$lstatus=$this->input->post("lsval");
		$data['tickets']=$this->Admin_model->getTktsByLeadStatus($lstatus);
		$this->load->view("common/header");
		$this->load->view("admin_list_view",$data); 
	}
	public function testmail(){
		 $toEmail="anjikatakam@gmail.com";
        $password="12345";
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
              $body ="Dear Customer, your username is:".$toEmail." your login password is :".$password;
              $this->email->message($body);      
              if($this->email->send()){
                 var_dump($this->email->send());
                  echo 'true';
                  
                return true;
              }else{
                  echo "false";
                return false;
              }
			   // $subject="ecorpadvisors";                   
			   // $companyemail= "info@ecopradvisors.com";
			   // $content="Advisor Password";
			   // $recipient = "anjikatakam@gmail.com";
			   // $mailheader = "From: $companyemail \r\n";
			   // mail($recipient, $subject, $content, $mailheader) or die("Error!");
        // $config = Array(  
                        // 'smtp_host' => '',
                        // 'smtp_port' => 465,
                        // 'smtp_user' => 'info@ecopradvisors.com',
                        // 'smtp_pass' => '3Trt-S%k6*Z8',
                        // 'mailtype'  => 'html', 
                        // 'charset'   => 'iso-8859-1',
                        // 'encryption'  =>'ssl',    
                    // );
              // $this->load->library('email', $config);
              // $this->email->clear();
              // $this->email->set_newline("\r\n");
              // $this->email->from('info@ecorpadvisors.com');
              // $this->email->to("anjikatakam@gmail");
              // $this->email->bcc('sashidhar.value@gmail.com');
              // $this->email->subject("Ecorpadvisor");
              //$body = $this->load->view("admin/templates/$type",$data,TRUE);
              // $body ="Test email from ecorp seerm";
              // $this->email->message($body);      
              // if($this->email->send()){
				  // var_dump($this->email->send());
                // return true;
              // }else{
				  // echo "false";
                // return false;
              // }
     }
	 function getDueDate(){
		 $srid=$this->input->post("srid");
		 $res=$this->Admin_model->getDueDate($srid);
		 $cur_date=date("Y-m-d");
		 $due_date= $res[0]['due_date'];
		 $days=$this->dateDiffInDays($cur_date,$due_date);
		  if($due_date < $cur_date){
		 echo "Date expired ".$days ." days ago";
		  }
		  else {
			  echo "Due in ".$days." days";
		  }
	 }
	 function dateDiffInDays($cur_date,$due_date){ 
    // Calculating the difference in timestamps 
     $diff = strtotime($due_date) - strtotime($cur_date);  
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
      return abs(round($diff/86400)); 
   } 
	 
	
	
	
	
	
}
