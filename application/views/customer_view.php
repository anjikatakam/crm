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
// .fileUpload input.upload {
    // position: absolute;
    // top: 0;
    // right: 0;
    // margin: 0;
    // padding: 0;
    // font-size: 20px;
    // cursor: pointer;
    // opacity: 0;
    // filter: alpha(opacity=0);
    // width: 148px;
    // height: 46px;
  // cursor: pointer;
// }

// input[type="file"] {
    // position: fixed;
    // right: 100%;
    // bottom: 100%;
// }
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
  bottom: 0;
  right: 78px;
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
                    <a class="nav-link " href="javascript:void(0);">My Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">My Documents</a>
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
                        <span> <?php if($this->session->userdata("cname")){
           echo $this->session->userdata("cname");
						}?></span>
                    </a>
                </li>   
				<li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>Customer/logout" style=" display: flex; align-items: end; ">
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
                    <p class="title flex-grow-1">NEW</p>
                    <p ><i class="fas fa-plus"></i></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
					<?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]=="Qualified"){ ?>
                    <p class="title"><?php  @$qualsm+=$request["opportunity_cost"]?></p>
					<?php } }?>
                    <p class="title "><?php echo "$".@$qualsm.".00 USD"; ?></p>
                </div>
              
                <div class="drog-drop mt-3">
				<?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="New"){
				 ?>
                    <div class="list-item color5">
                         <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['customer_sr_id'];?>','<?php echo $request['title'];?>')">
						<p class="title">#SR  <?php echo $request['customer_sr_id'];?></a>
						<p class="title"><?php $request['title'];?></p>
                        <p class="work-type text-color-gray"><?php echo $request['title'];?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1 ">
                                <p class="text-color-gray">$<?php echo $request['opportunity_cost'];?>.00 USD</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="fas fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
                        
                        </div>
                    </div>
					<?php } } ?>
                </div>
					   
            </div>
            <div class="col">
			
                <div class="title-text d-flex align-items-center">
                    <p class="title flex-grow-1">WORK IN PROGRESS</p>
                    <p ><a href="javascript:void(0);" data-toggle="modal" data-target="#createReqestModal" onclick="createRequest2();"><i class="fas fa-plus"></i></a></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
					<?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]=="Work In Progress"){ ?>
                    <p class="title"><?php  @$sum+=$request["opportunity_cost"]?></p>
					<?php } } echo "$".$sum.".00 USD";?>	
                </div>
				<?php 
				 //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="Work In Progress"){
				 ?>
                <div class="drog-drop mt-3">
                    <div class="list-item color1" style="cursor:auto;">
                        <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['customer_sr_id'];?>','<?php echo $request['title'];?>')">
						<p class="title">#SR  <?php echo $request['customer_sr_id'];?></a>
						<!--<i class="fas fa-edit editSrRequest" data-id="<?php echo $request['customer_sr_id'];?>"></i>--></p>
                        <p class="title"><?php $request['title'];?></p>
                        <p class="work-type text-color-gray"><?php echo $request['title'];?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1 ">
                                <p class="text-color-gray">$<?php echo $request['opportunity_cost'];?>.00 USD</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="fas fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
					   <?php } }?>
            </div>
			 
            
            <div class="col">
                <div class="title-text d-flex">
                    <p class="title flex-grow-1">DONE</p>
                    <p ><i class="fas fa-plus"></i></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
                    <?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]=="Done"){ ?>
                    <p class="title"><?php  @$donesum+=$request["opportunity_cost"]?></p>
					<?php } }?>
                    <p class="title "><?php echo "$".@$donesum.".00 USD"; ?></p>
                </div>

                <div class="drog-drop mt-3">
				<?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="Done"){
				 ?>
                    <div class="list-item color1">
                         <a href="javascript:void(0);" onclick="showDetails('<?php echo $request['customer_sr_id'];?>','<?php echo $request['title'];?>')">
						<p class="title">#SR  <?php echo $request['customer_sr_id'];?></a>
						 
						    <p class="title"><?php $request['title'];?></p>
                        <p class="work-type text-color-gray"><?php echo $request['title'];?></p>
                        <div class="d-flex">
                            <div class="flex-grow-1 ">
                                <p class="text-color-gray">$<?php echo $request['opportunity_cost'];?>.00 USD</p>
                                <div class="rating">
                                    <i class="fas fa-star fill-color"></i>
                                    <i class="fas fa-star fill-color"></i> 
                                    <i class="far fa-star fill-color"></i>

                                    <i class="far fa-clock ml-2 fill-time"></i>
                                </div>
                            </div>
							</div>
						 
                                 
                    </div>
					   <?php }  } ?>
                </div>


            </div>
            <div class="col">
                <div class="title-text d-flex">
                    <p class="title flex-grow-1">CLOSED</p>
                    <p ><i class="fas fa-plus"></i></p>
                </div>
                <div class="bars d-flex align-items-center">
                    <div class="bar flex-grow-1">
                        <div class="progress"></div>
                    </div>
                    <?php foreach($srRequests as $request) { 
					 if($request["opportunity_status"]=="Closed"){ ?>
                    <p class="title"><?php  @$closesum+=$request["opportunity_cost"]?></p>
					<?php } }?>
                    <p class="title "><?php echo "$".@$closesum.".00 USD"; ?></p>
                </div>

                <div class="drog-drop mt-3">
				<?php //echo "<pre>";print_r($srRequests);
				       foreach($srRequests as $request) {
						   if($request["opportunity_status"]=="Closed"){
				 ?>
                    <div class="list-item">
                        <p class="title"><?php echo $request["title"]?></p>
                        <p class="work-type text-color-gray"><?php echo $request["title"]?></p>
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
                                <img src="<?php echo base_url();?>assets/images/user.png" alt="assignee" class="assignee-img">
                            </div>
                        </div>
                    </div>
					   <?php } } ?>
                </div>
            </div>
        </div>
    </div>


<script>
function showDetails(srid,title){
	$("#srid").val(srid);
	$(".editSrId").html("#"+srid);
	$(".editTitle").html(title);
	$.ajax({
		 url:"<?php echo base_url();?>Customer/getCommentsBySrId",
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
					$(".msgrole").append(value.name+ "(Admin)<br/>");   
				  }
				  if(value.created_by=="2"){
					  $(".msgrole").append(value.name+ "(Advisor)<br/>");
				  }
				  if(value.created_by=="3"){
					  $(".msgrole").append(value.name+ "(Customer)<br/>");
				  }
				 
				 $(".msg").append(value.comment+"<br/><br/>");
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
         <h4 class="modal-title editSrId" style="font-size:1rem;"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
 <div class="showdetails">

        <div class="head d-flex align-items-center">
            <div class="pic flex-grow-1 d-flex ">
                
            </div>
            <div class="due">
                <p class="mb-0 text-color-gray">Due in 1 day <i class="fas fa-circle ml-3"></i></p>
            </div>
        </div>
        <div class="body">
           <h6><span class="btn-info btn-sm editTitle"></span></h6>
            <p class="dotted text-color-gray">For more information <a onclick="showAllComments()" href="javascript:void(0);">go to details</a>.</p>

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

        </div>
        <div class="footer">
            <div class="reply">
                <button class="btn-primary" onclick="openForm()" id="replyButton"><i class="fas fa-reply"></i> Reply </button>
            </div>
        </div>
		<div class="chatBoxDiv" id="myForm" style="display:none;">
		  <form id="" name="" class="" method="post" action="<?php echo base_url();?>Admin/submitAdminComment"
		   enctype="multipart/form-data">
		   <input type="hidden" name="srid" id="srid"/>
		 <br/>
			<textarea placeholder="Type message.." name="chatMsg" id="chatMsg" required style="margin:0px;width:765px;height:92px;"></textarea>
			<div class="fileUpload">
			<input type="file" multiple class="upload" name="file[]"/>
			<span>Upload documents</span>
             </div>

			<button type="submit" id="chatSubmitBtn" class="btn-success btn-sm">Send</button>
			<button type="button" class="btn-danger btn-sm" onclick="closeForm()">Close</button>
			
		  </form>
          </div>
    </div>
 </div>
 </div>
 </div>
 </div>
 <script>
 function showAllComments(){
	 var srid= $("#srid").val();
	  var href="<?php echo base_url();?>Admin/moreCommentsInfo/"+srid;
	  window.open(href);
  }
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
  document.getElementById("replyButton").style.display = "none";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
   document.getElementById("replyButton").style.display = "block";
}
</script>
 