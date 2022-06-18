<style>
.fileUpload {
	background: #00bcbe;
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;
	color: #fff;
	font-size: 1em;
	font-weight: bold;
	margin: 1.25em auto;/*20px/16px 0*/
	overflow: hidden;
	padding: 0.875em;/*14px/16px*/
	position: relative;
	text-align: center;
	width: 249px;
   cursor: pointer;
}
.fileUpload:hover, .fileUpload:active, .fileUpload:focus {
	background: #00a2a4;
  cursor: pointer;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 148px;
    height: 46px;
  cursor: pointer;
}

input[type="file"] {
    position: fixed;
    right: 100%;
    bottom: 100%;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 195px;
  right: 380px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style> 
 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
  <?php if($this->session->userdata("msg")){ ?>
          <script>alert('<?php echo $this->session->userdata("msg");?>');</script>
  <?php  }
  $this->session->unset_userdata("msg"); ?>
<div class="nav-bar">
        <nav class="navbar navbar-expand-sm bg-nav-color navbar-dark">
            <i class="fas fa-braille"></i>
            <a class="navbar-brand" href="javascript:void(0);">CRM</a>

            <ul class="navbar-nav flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link " href="javascript:void(0);">Pipeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">Reporting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">Configuration</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="fas fa-phone-alt"></i></a>
                </li>
                <li class="nav-item add-relative">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-circle"></i>
                        <span class="notifys">0</span>
                    </a>
                </li>
                <li class="nav-item add-relative">
                    <a class="nav-link" href="javascript:void(0);"><i class="fas fa-comments"></i>
                        <span class="notifys">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" style=" display: flex; align-items: end; ">
                        <img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic">
                        <span>Administrator</span>
                    </a>
                </li>   
				<li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>Home/logout" style=" display: flex; align-items: end; ">
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container-fluid border-bottom py-3">
        <div class="row">
            <div class="col-6">
                <h2 class="text-color-gray">pipeline</h2>
                <div class="import-export mt-3">
                    <button class="btn create text-uppercase">Create</button>
                    <button class="btn import text-uppercase">Import</button>
                </div>
            </div>
            <div class="col-6">
                <div class="search">
                    <form method="post">
                        <input type="text" name="search" placeholder="Search">
                        <button type="submit" class="btn"><i class="fas fa-search-minus"></i></button>
                    </form>
                </div>
                <div class="filters d-flex  mt-4 pt-2">
                    <div class="left flex-grow-1">
                        <ul>
                            <li><i class="fas fa-filter"></i> Filter <i class="fas fa-caret-down"></i></li>
                            <li><i class="fas fa-bars"></i> Group By <i class="fas fa-caret-down"></i></li>
                            <li><i class="fas fa-star"></i> Favorities <i class="fas fa-caret-down"></i></li>
                        </ul>
                    </div>
                    <div class="right">
                        <ul>
                            <li class="active"><i class="far fa-address-card"></i></li>
                            <li><i class="fas fa-list"></i></li>
                            <li><i class="far fa-chart-bar"></i></li>
                            <li><i class="far fa-calendar-alt"></i></li>
                            <li><i class="fas fa-calculator"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col">
                <div class="title-text d-flex align-items-center">
                    <p class="title flex-grow-1">New</p>
                    <p ><a href="javascript:void(0);" data-toggle="modal" data-target="#createReqestModal" onclick="createRequest2();"><i class="fas fa-plus"></i></a></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
                    <?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]==" "){ ?>
                    <p class="title"><?php  @$sum+=$request["opportunity_cost"]?></p>
					<?php } } echo "$".@$sum.".00 USD";?>
                </div>
                <div class="drog-drop mt-3">
				 <?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						    if($request["opportunity_status"]==""){ 
				 ?>
                    <div class="list-item color1" style="cursor:auto;">
                        <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['sr_request'];?>');"><p class="title">#SR  <?php echo $request['sr_request'];?></a>
						<i class="fas fa-edit editSrRequest" data-id="<?php echo $request['sr_request'];?>"></i></p>
                        <p class="title"><?php echo $request['title'];?></p>
                        <p class="work-type text-color-gray"><?php echo $request['sr_category'];?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1 ">
                                <p class="text-color-gray">$0.00</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="fas fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
                            <div class="assignee ">
                                <a href="javascript:void(0);" onclick="assignTicket('<?php echo $request['sr_request'];?>')"><img src="<?php echo base_url();?>assets/images/user.png" alt="assignee" class="assignee-img"></a>
                            </div>
                        </div>
                    </div>
					   <?php }} ?>           
                </div>
                
            </div>
            <div class="col">
                <div class="title-text d-flex align-items-center">
                    <p class="title flex-grow-1">Qualified</p>
                    <p ><i class="fas fa-plus"></i></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
                     <?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]=="Qualified"){ ?>
                    <p class="title"><?php  @$sum+=$request["opportunity_cost"]?></p>
					<?php } } echo "$".@$sum.".00 USD";?>
                </div>

                 <div class="drog-drop mt-3">
                    <?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="Qualified"){
				 ?>
                    <div class="list-item">
                        <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['sr_request'];?>');"><p class="title">#WR  <?php echo $request['sr_request'];?></a>
						<i class="fas fa-edit editSrRequest" data-id="<?php echo $request['sr_request'];?>"></i></p>
						<p class="title"><?php echo $request['title'];?></p>
						<p class="title"><?php echo $request['sr_category'];?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-color-gray"><?php  echo "$".$request["opportunity_cost"]?>.00 USD</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="far fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
                            <div class="assignee">
                                <a href="javascript:void(0);" onclick="assignTicket('<?php echo $request['sr_request'];?>')"><img src="<?php echo base_url();?>assets/images/user.png" alt="assignee" class="assignee-img"></a>
                            </div>
                        </div>
                    </div>
					   <?php } } ?>
                </div>
            


            </div>
            <div class="col">
                <div class="title-text d-flex">
                    <p class="title flex-grow-1">Work in Progress</p>
                    <p ><i class="fas fa-plus"></i></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
                       <?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]=="Work In Progress"){ ?>
                    <p class="title"><?php  @$wsum+=$request["opportunity_cost"]?></p>
					<?php } } echo "$".@$wsum.".00 USD";?>
                </div>

                <div class="drog-drop mt-3">
                    <?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="Work In Progress"){
				 ?>
                    <div class="list-item">
					 <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['sr_request'];?>');"><p class="title">#WR  <?php echo $request['sr_request'];?></a>
					 <i class="fas fa-edit editSrRequest" data-id="<?php echo $request['sr_request'];?>"></i></p>
                        <p class="title"><?php echo $request["title"]?></p>
                        <p class="work-type text-color-gray"><?php echo $request["sr_category"]?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-color-gray"><?php  echo "$".$request["opportunity_cost"]?>.00 USD</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="far fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
                            <div class="assignee">
                                <a href="javascript:void(0);" onclick="assignTicket('<?php echo $request['sr_request'];?>')"><img src="<?php echo base_url();?>assets/images/user.png" alt="assignee" class="assignee-img"></a>
                            </div>
                        </div>
                    </div>
					   <?php } } ?>
                </div>
            


            </div>
            <div class="col">
                <div class="title-text d-flex">
                    <p class="title flex-grow-1">Done</p>
                    <p ><i class="fas fa-plus"></i></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
                   <?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]=="Done"){ ?>
                    <p class="title"><?php  @$dsum+=$request["opportunity_cost"]?></p>
					<?php } } echo "$".@$dsum.".00 USD";?>
                </div>

                <div class="drog-drop mt-3">
                    <?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="Done"){
				 ?>
                    <div class="list-item">
                        <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['sr_request'];?>');"><p class="title">#WR  <?php echo $request['sr_request'];?></a>
						<i class="fas fa-edit editSrRequest" data-id="<?php echo $request['sr_request'];?>"></i></p>
						<p class="title"><?php echo $request['title'];?></p>
						<p class="title"><?php echo $request['sr_category'];?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-color-gray"><?php  echo "$".$request["opportunity_cost"]?>.00 USD</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="far fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
                            <div class="assignee">
							<a href="javascript:void(0);" onclick="assignTicket('<?php echo $request['sr_request'];?>')">
                                <img src="<?php echo base_url();?>assets/images/user.png" alt="assignee" class="assignee-img"></a>
                            </div>
                        </div>
                    </div>
					   <?php } } ?>
                </div>
            


            </div>
            <div class="col">
                <div class="title-text d-flex">
                    <p class="title flex-grow-1">Closed</p>
                    <p ><i class="fas fa-plus"></i></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
                    <?php foreach($srRequests as $request) {
                       						
					 if($request["opportunity_status"]=="Closed"){ ?>
                    <p class="title"><?php  @$csum+=$request["opportunity_cost"]?></p>
					<?php } } echo "$".@$csum.".00 USD";?>
                </div>

                
				<div class="drog-drop mt-3">
				<?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="Closed"){
				 ?>
                    <div class="list-item ">
                        <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['sr_request'];?>');"><p class="title">#WR  <?php echo $request['sr_request'];?></a>
						<i class="fas fa-edit editSrRequest" data-id="<?php echo $request['sr_request'];?>"></i></p>
						<p class="title"><?php echo $request['title'];?></p>
						<p class="title"><?php echo $request['sr_category'];?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-color-gray"><?php  echo "$".$request["opportunity_cost"]?>.00 USD</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="far fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
                            <div class="assignee">
                                <a href="javascript:void(0);" onclick="assignTicket('<?php echo $request['sr_request'];?>')"><img src="<?php echo base_url();?>assets/images/user.png" alt="assignee" class="assignee-img"></a>
                            </div>
                        </div>
                    </div>
					   <?php } } ?>
                </div>
            </div>
			
            <div class="add-colum">
                <p><a  href="javascript:void(0);"data-toggle="modal" data-target="#createNewInputReqestModal" onclick="createRequest2();"><i class="fas fa-plus"></i></a></p>
                <p class="text text-color-gray">
                    Add New Colunm
                </p>
            </div>
        </div>
    </div>

<!-- The Modal -->
<div class="modal" id="createReqestModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:1rem;">Create Service Request</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	   <?php 
	   $attributes=array("id"=>"createRequestFrm2","name"=>"createRequestFrm2");
	   echo form_open("Dashboard/createSrRequest",$attributes);?>
          <div class="form-group">
		      <input type="text" class="form-control" name="title" id="title" placeholder="Title" required />
		  </div>
		  <div class="form-group">
		      <select  class="form-control" name="sr_category" id="sr_category" placeholder="Service category" required />
			   <option value="">--Choose service category--</option>
			      <?php foreach($serviceCategories as $scat) { ?>
				   <option value="<?php echo $scat['sr_category'];?>"><?php echo $scat['sr_category'];?></option>
				  <?php } ?>
			  </select>
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="description" id="description" placeholder="Description"  required />
		  </div> 
		  <div class="form-group">
		      <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact number" maxlength="12" required />
		  </div>
		<div class="modal-footer">
        <button type="buton" class="btn btn-primary btn-sm" id="submit">Create</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        <?php echo form_close();?>
		  </div>
      </div>
	  </div>
	 </div>
	 
	 <!--Create New Service Category Modal-->
	 <!-- The Modal -->
<div class="modal" id="createNewInputReqestModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:1rem;">Create New Filed</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	   <?php 
	   $attributes=array("id"=>"createNewSrCategoryFrm","name"=>"createNewSrCategoryFrm");
	   echo form_open("Admin/createNewSrCategory",$attributes);?>
          <div class="form-group">
		      <input type="text" class="form-control" name="title" id="title2" placeholder="" required />
		  </div>
		   <div class="form-group">
		      <select  class="form-control" name="" id="" placeholder="Service category" required />
			   <option value="">--Choose--</option>
			      <?php foreach($serviceCategories as $scat) { ?>
				   <option value="<?php echo $scat['sr_category'];?>"><?php echo $scat['sr_category'];?></option>
				  <?php } ?>
				  <option value="">Leads</option>
				   
			  </select>
		  </div>
		  
		<div class="modal-footer">
        <button type="buton" class="btn btn-primary btn-sm" id="submit2">Create</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        <?php echo form_close();?>
		  </div>
      </div>
	  </div>
	 </div>
	 <!------End Create servicecategory Modal----->
<script>
 $("#submit").click(function(){
	var title=$("#title").val();
	var sr_category=$("#sr_category").val();
	var description=$("#title").val();
	var contact_number=$("#contact").val();
	 if(title==""){
		 bootbox.alert('<p class="alert alert-danger">Enter title</p>');
		 return false;
	 }
	 if(sr_category==""){
		 bootbox.alert('<p class="alert alert-danger">Enter service category</p>');
		 return false;
	 }
	 if(description==""){
		 bootbox.alert('<p class="alert alert-danger">Enter description</p>');
		 return false;
	 } 
	 if(contact_number==""){
		 bootbox.alert('<p class="alert alert-danger">Enter contact number</p>');
		 return false;
	 }
	 else {
	 $.ajax({
		 type:"post",
		 url:"<?php echo base_url();?>Dashboard/createSrRequest",
		 data:{title:title,sr_category:sr_category,description:description,
		 contact_number:contact_number},
		 success:function(res){
			 //bootbox.alert('<p class="alert alert-success">New service request created successfully</p>');
			 if(res==1){
			 alert('Service request created successfully');
			 } 
			 if(res==0){
			 alert('Service request creation failed try again');
			 }
			 location.reload();
		 } 
	 })
	 }
 })
 </script>
 <!-- The Modal -->
<div class="modal" id="assignTktModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:1rem;">Assign Request</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	   <?php 
	   $attributes=array("id"=>"assignTkt","name"=>"assignTkt");
	   echo form_open("Dashboard/assignTkt",$attributes);?>
          
		  <div class="form-group">
		      <select type="email" class="form-control" name="role" id="role"  required />
			    <option value="">--Choose advisor--</option>
			  </select>
			  <div class="form-group">
		      <input type="hidden" class="form-control" name="ticketId" id="ticketId"/>
		  </div>
		  </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" id="tktsubmit">Assign</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
      </div>
        <?php echo form_close();?>
    </div>
  </div>
</div>
<script>
 function assignTicket(tkt){
	$("#ticketId").val(tkt);
	  $.ajax({
		 type:"post",
		 url:"<?php echo base_url();?>Admin/getAdvisorsList",
		 success:function(res){
			 $("#role").html("");
			 $.each(JSON.parse(res),function(index,value){
				 $("#role").append("<option value='"+value.name+"'>"+value.name+"</option>");
			 })
			$("#assignTktModal").modal("show");
		 } 
	 })
 }
 $("#tktsubmit").click(function(){
	 var role=$("#role").val();
	 var srNumber=$("#ticketId").val();
	 $.ajax({
		 type:"post",
		 url:"<?php echo base_url();?>Admin/assignTkt",
		 data:{role:role,srNumber:srNumber},
		 success:function(res){
			 if(res==1){
			 alert('Assigned successfully');
			 } 
			 if(res==0){
			 alert('Assigned failed try again');
			 }
			 if(res==2){
			 alert('This serice request number already assigned to this adivisor');
			 }
			$("#assignTktModal").modal("hide");
		 } 
	 }) 
 })
 
 $(".editSrRequest").click(function(){
	  $("#dueDate").datepicker({
		 dateFormat: "yy-m-dd",
         yearRange: "-100:+20",
		 minDate:0
	 });
	 var srid=$(this).data("id");
	 //alert(srid);
	 $("#esrid").val(srid);
	 $(".editSrId").html("# "+srid);
	 $.ajax({
		 type:"post",
		 url:"<?php echo base_url();?>Admin/getsridDetails",
		 data:{srid:srid},
		 success:function(res){
			 $("#esr_category").html("");
			 $.each(JSON.parse(res),function(index,value){
			 //alert(value.sr_category);
				 $("#etitle").val(value.title);
				 $("#econtact").val(value.contact_number);
				 $("#eemail").val(value.email);
				 $("#ename").val(value.customer_name);
				 $("#dueDate").val(value.due_date);
				 $("#elead_status").val(value.lead_status);
				 $("#eopportunity_cost").val(value.opportunity_cost);
				 $("#eopportunity_status").val(value.opportunity_status);
				 $("#priority").val(value.priority);
				 $("#edescription").val(value.description);
				  $("#esr_category").append("<option value='"+value.sr_category+"'>"+value.sr_category+"</option>");
			 })
		 }
	 })
	  
	 
	 $("#editSrReqestModal").modal("show");
 })
 </script>
 
 <!--Edit Service request modal start--->
 <!-- The Modal -->
<div class="modal" id="editSrReqestModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:1rem;">Edit Service Request  <span class="btn-primary btn-sm editSrId"></span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url();?>Admin/updateSrRequestDetails">
	  <div class="row">
        <div class="col-sm-2">Title</div>
        <div class="col-sm-4">
	       <div class="form-group">
		      <input type="text" class="form-control" name="etitle" id="etitle" placeholder="Title" required />
		   </div>
		  </div>
		  <div class="col-sm-2">Service Category</div>
        <div class="col-sm-4">
	       <div class="form-group">
		      <select  class="form-control" name="esr_category" id="esr_category" placeholder="Service category" required />
			   <option value="">--Choose service category--</option>
			   <option value="GST">GST</option>
			   <option value="company Registration">company Registration</option>
			   <option value="Taxation">Taxation</option>
			  </select>
		   </div>
		  </div>
      </div>
	  <div class="row">
        <div class="col-sm-2">Description</div>
        <div class="col-sm-4">
	       <div class="form-group">
		      <input type="text" class="form-control" name="edescription" id="edescription" placeholder="Description"  required />
		   </div>
		  </div>
		  <div class="col-sm-2">Phone</div>
        <div class="col-sm-4">
	       <div class="form-group">
		       <input type="text" class="form-control" name="econtact" id="econtact" placeholder="Contact number" maxlength="12" required />
		   </div>
		  </div>
      </div>
	  <div class="row">
        <div class="col-sm-2">Name</div>
        <div class="col-sm-4">
	       <div class="form-group">
		       <input type="text" class="form-control" name="ename" id="ename" placeholder="customer name"  required />
		   </div>
		  </div>
		  <div class="col-sm-2">Email Id</div>
        <div class="col-sm-4">
	       <div class="form-group">
		       <input type="email" class="form-control" name="eemail" id="eemail" placeholder="customer email"  required />
		   </div>
		  </div>
      </div>
	  <div class="row">
        <div class="col-sm-2">Service cost($USD)</div>
        <div class="col-sm-4">
	       <input type="text" class="form-control" name="eopportunity_cost" id="eopportunity_cost" placeholder="Opportunity cost"  required />
		  </div>
		  <div class="col-sm-2">Opportunity Status</div>
        <div class="col-sm-4">
	       <div class="form-group">
		        <select type="text" class="form-control" name="eopportunity_status" id="eopportunity_status" placeholder="Opportunity status" required>
			<option value="">--Choose opportunity status--</option>
		   <option value="New">New</option>
		   <option value="Qualified"> Qualified</option>
		   <option value="Work In Progress"> Work In Progress</option>
		   <option value="Done"> Done</option>
		   <option value="Closed"> Closed</option>
			</select>
		   </div>
		  </div>
      </div>
	  
	  <div class="row">
        <div class="col-sm-2">Lead Status</div>
        <div class="col-sm-4">
	       <div class="form-group">
		    <select  class="form-control" name="elead_status" id="elead_status" placeholder="Lead status"  required>
		   <option value="">--Choose lead status--</option>
		   <option value="Hot Lead">Hot Lead</option>
		   <option value="Warm Lead">Warm Lead</option>
		   <option value="Cold Lead">Cold Lead</option>
		   <option value="Dead">Dead</option>
		   <option value="Won">Won</option>
		   <option value="Inactive">Inactive</option>
		   <option value="Negotating">Negotating</option>
			</select>
		  </div>
		  </div>
		  <div class="col-sm-2">Priority</div>
        <div class="col-sm-4">
	        <div class="form-group">
		    <select  class="form-control" name="priority" id="priority" placeholder="Lead status"  required>
		   <option value="">--Priority--</option>
		   <option value="high">High</option>
		   <option value="medium">Medium</option>
		   <option value="low">Low</option>
			</select>
		  </div>
		  </div>
      </div>
	   <div class="row">
        <div class="col-sm-2">Due Date</div>
        <div class="col-sm-4">
	        <div class="form-group">
		      <input type="text" name="dueDate" id="dueDate"/>
		  </div>
		  </div>
      </div>
		<div class="modal-footer">
		<input type="hidden" name="esrid" id="esrid" value=""/>
        <button type="submit" class="btn btn-primary btn-sm" id="update">Update</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        </div>
         </form>
		  </div>
      </div>
	  </div>
	 </div>
<!--End Edit service request modal--->

<script>
  
// $("#update").click(function(){
	// var etitle=$("#etitle").val();
	// var esr_category=$("#esr_category").val();
	// var edescription=$("#edescription").val();
	// var ename	=$("#ename").val();
	// var eemail	=$("#eemail").val();
	// var econtact	=$("#econtact").val();
	// var eopportunity_cost	=$("#eopportunity_cost").val();
	// var eopportunity_status	=$("#eopportunity_status").val();
	// var elead_status	=$("#elead_status").val();
	// var esr_id=$("#esrid").val();
	// var priority=$("#priority").val();
	// var dueDate=$("#dueDate").val();
	// $.ajax({
		// url:"<?php echo base_url();?>Admin/updateSrRequestDetails",
		// type:"POST",
		// data:{
			 // etitle:etitle,esr_category:esr_category,edescription:edescription,
			 // ename:ename,eemail:eemail,eopportunity_cost:eopportunity_cost,
			 // eopportunity_status:eopportunity_status,elead_status:elead_status,
			 // esr_id:esr_id,econtact:econtact,priority:priority,dueDate:dueDate
		// },
		// success:function(res){
			  // if(res==1){
				 // bootbox.alert('<p class="alert alert-success">Service request details updated successfully</p>');
			  // }
			  // else {
				  // bootbox.alert('<p class="alert alert-danger">Service request details updation failed try again</p>'); 
			  // }
		// }
	// })
	
// })
function showDetails(srid){
	$("#srid").val(srid);
	$.ajax({
		 url:"<?php echo base_url();?>Admin/getCommentsBySrId",
		 type:"POST",
		 data:{srid:srid},
		 success:function(result){
			 // alert(result);
			  //$(".msgDiv").html("");
			  $(".msg").html("");
			  $(".msgrole").html("");
			  $(".msgcreated_date").html("");
			 
			  $.each(JSON.parse(result),function(index,value){
				  if(value.created_by==1){
					  $(".msgrole").append("Admin<br/><br/>");
					  //$(".msgrole").append(value.created_by+"<br/><br/>");
				  }
				  if(value.created_by=="2"){
					  $(".msgrole").append("Advisor<br/><br/>");
					  //$(".msgrole").append(value.created_by+"<br/><br/>");
				  }
				  if(value.created_by=="3"){
					  $(".msgrole").append("Customer");
					  //$(".msgrole").append(value.created_by+"<br/><br/>");
				  }
				  if(value.uploads_count!=0){
				$(".msg").append(value.comment+" <a href='<?php echo base_url();?>Admin/downloadDocs?cmtId="+value.id+"' target='_blank'>"+value.uploads_count+"</a> attachments  uploaded<br/><br/>");
				  }
				  if(value.uploads_count==0){
					   $(".msg").append(value.comment+"<br/><br/>");
				  }
				
				 $(".msgcreated_date").append(value.created_date+"<br/><br/>");
			 })
		 }
	})
	$("#showDetailsModal").modal("show");
}
</script>


<div class="modal" id="showDetailsModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title srRequest" style="font-size:1rem;"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">


 <div class="showdetails">

        <div class="head d-flex align-items-center">
            <div class="pic flex-grow-1 d-flex ">
                <img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic">
                <p class="title mb-0">Foo Name</p>
            </div>
            <div class="due">
                <p class="mb-0 text-color-gray">Due in 1 day <i class="fas fa-circle ml-3"></i></p>
            </div>
        </div>
        <div class="body">
            <h5>Fetching Data From Accounting Application?</h5>
            <p class="dotted text-color-gray">For more information go to details.</p>

            <div class="cart-description msgDiv">
                <div class="description-head d-flex">
                    <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                    <div class="text">
                        <p class="name mb-0 msgrole"></p>
                        <p class="day mb-0 text-color-gray msgcreated_date">Yestarday</p>
                    </div>
                </div>
                <div class="description-body">
                    <p class="msg"></p>
                </div>
            </div>

            <!--<div class="chart-list">
                <div class="row add-border-bottom">
                    <div class="col-4 d-flex">
                        <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                        <div class="text">
                            <p class="name mb-0 "> User </p>
                            <p class="day mb-0 text-color-gray">Yestarday</p>
                        </div>
                    </div>
                    <div class="col-4">Hi Matt</div>
                    <div class="col-4"></div>
                </div>
                <div class="row add-border-bottom">
                    <div class="col-4 d-flex">
                        <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                        <div class="text">
                            <p class="name mb-0 "> User </p>
                            <p class="day mb-0 text-color-gray">Yestarday</p>
                        </div>
                    </div>
                    <div class="col-4">simply dummy text of the printing and </div>
                    <div class="col-4"></div>
                </div>
                <div class="row add-border-bottom">
                    <div class="col-4 d-flex">
                        <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                        <div class="text">
                            <p class="name mb-0 "> User </p>
                            <p class="day mb-0 text-color-gray">Yestarday</p>
                        </div>
                    </div>
                    <div class="col-4">Hi Otis</div>
                    <div class="col-4 text-right"> <span class="private-note">Private note</span> </div>
                </div>
                <div class="row add-border-bottom">
                    <div class="col-4 d-flex">
                        <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                        <div class="text">
                            <p class="name mb-0 "> User </p>
                            <p class="day mb-0 text-color-gray">Yestarday</p>
                        </div>
                    </div>
                    <div class="col-4">Hi Otis</div>
                    <div class="col-4 text-right "><i class="fas fa-paperclip text-color-gray mr-1"></i> 1</div>
                </div>
            </div>-->
			<div class="chat-popup" id="myForm">
		  <form id="chatForm" name="chatForm" class="form-container" method="post" action="<?php echo base_url();?>Admin/submitAdminComment"
		   enctype="multipart/form-data">
		   <input type="hidden" name="srid" id="srid"/>
			<!--<h3>Reply</h3>-->
         <input  type="checkbox" name="private" id="private"> Private note
		 <br/>
			<label for="msg"><b>Message</b></label>
			<textarea placeholder="Type message.." name="chatMsg" id="chatMsg" required></textarea>
			<div class="fileUpload">
			<input type="file" multiple class="upload" name="file[]"/>
			<span>Upload documents</span>
             </div>

			<button type="submit" id="chatSubmitBtn" class="btn-success btn-sm">Send</button>
			<button type="button" class="btn-danger btn-sm" onclick="closeForm()">Close</button>
			
		  </form>
          </div>
        </div>
        <div class="footer">
            <div class="reply">
                <button class="btn-primary" onclick="openForm()"><i class="fas fa-reply"></i> Reply </button>
                
            </div>
        </div>
		
    </div>
 </div>
 </div>
 </div>
 </div>
 <script>
 $('input[name=private]').click(function(){
 var chknote=$('input[type=checkbox]').prop('checked');
	 var privatenote;
	  if(chknote==false){
		  privatenote=0;
		  $("#private").val(privatenote);
	  }if(chknote==true){
		  privatenote=1;
		  $("#private").val(privatenote);
	  }
 })
 $("#chatSubmitBtn").click(function(){
	 var chatMsg=$("#chatMsg").val();
	 var srId=$("#srid").val();
	 var chknote=$('input[type=checkbox]').prop('checked');
	 var privatenote;
	  if(chknote==false){
		  privatenote=0;
	  }if(chknote==true){
		  privatenote=1;
	  }
	  //alert(privatenote);return false;
	 var privatenote=$("#private").val();
	  $.ajax({
		    type:"POST",
			url:"<?php echo base_url();?>Admin/submitAdminComment",
			data: {chatMsg:chatMsg,srId:srId,privatenote:privatenote},
			success:function(res){
				 if(res==1){
					 bootbox.alert('<p class="alert alert-success">Your  comment has been submitted successfully</p>');
					 $(".chat-popup").hide();
				 }
			}
	  })
 })
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
 