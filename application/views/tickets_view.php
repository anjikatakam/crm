<!DOCTYPE html>
<html lang="en">
<head>
</head>
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
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 195px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: #b69696;
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
<body>
    <div class="nav-bar ajaxNav">
        <nav class="navbar navbar-expand-sm bg-nav-color navbar-dark">
            <i class="fas fa-braille"></i>
            <a class="navbar-brand" href="#">CRM</a>

            <ul class="navbar-nav flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link " href="#">LEADS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">PROPOSALS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CUSTOMERS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DOCUMENTS</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-phone-alt"></i></a>
                </li>
                <li class="nav-item add-relative">
                    <a class="nav-link" href="#"><i class="far fa-circle"></i>
                        <span class="notifys">0</span>
                    </a>
                </li>
                <li class="nav-item add-relative">
                    <a class="nav-link" href="#"><i class="fas fa-comments"></i>
                        <span class="notifys">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style=" display: flex; align-items: end; ">
                        <img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic">
                        <span><?php echo ucfirst($this->session->userdata("advisorname"));?></span>
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
    <div class="ajaxResponse">
		 </div>
    <div class="contant-body">
        <div class="nav-bar">
            <div class="d-flex align-items-center">
                <p class="title mb-0 flex-grow-1">By Opportunity Status   <i class="fas fa-cog"></i></p>
                <i class="fas fa-plus"></i>
            </div>
			<?php  foreach($count as $opcount) { 
			          if($opcount['opportunity_status']=="Closed") {
			          $ccount=$opcount['count'];
					  } 
					  if($opcount['opportunity_status']=="Done") {
			           @$dcount=$opcount['count'];
					  } 
					  if($opcount['opportunity_status']=="New") {
			          @$ncount=$opcount['count'];
					  } 
					  if($opcount['opportunity_status']=="Qualified") {
			          @$qcount=$opcount['count'];
					  }
					  if($opcount['opportunity_status']=="Work In Progress") {
			           @$wcount=$opcount['count'];
					  }
					   $all=@$ccount+@$dcount+@$ncount+@$qcount+@$wcount;
			          
			}?>
            <ul class="left-nav-bar">
                 <li class="d-flex">
                    <span class="flex-grow-1 opStatus">New</span>
                    <span><?php echo @$ncount;?></span>
                </li>
                <li class="d-flex active">
                    <span class="flex-grow-1 opStatus">Work In Progress</span>
                    <span><?php echo @$wcount;?></span>
                </li>
				<li class="d-flex">
                    <span class="flex-grow-1 opStatus">All</span>
                    <span><?php echo @$all;?></span>
                </li>
                <li class="d-flex">
                    <span class="flex-grow-1 opStatus">Qualified</span>
                    <span><?php echo @$qcount;?></span>
                </li>
                <li class="d-flex">
                    <span class="flex-grow-1 opStatus">Done</span>
                    <span><?php echo @$dcount;?></span>
                </li>
                <li class="d-flex">
                    <span class="flex-grow-1 opStatus">Closed</span>
                    <span><?php echo @$ccount;?></span>
                </li>
            </ul>
			<?php  foreach($lscount as $lcount) { 
			          if($lcount['lead_status']=="Hot Lead") {
			          $hotcount=$lcount['count'];
					  } 
					  if($lcount['lead_status']=="Warm Lead") {
			           @$warmcount=$lcount['count'];
					  } 
					  if($lcount['lead_status']=="Cold Lead") {
			          @$coldcount=$lcount['count'];
					  } 
					  if($lcount['lead_status']=="Dead") {
			          @$deadcount=$lcount['count'];
					  }
					  if($lcount['lead_status']=="Won") {
			           @$woncount=$lcount['count'];
					  }
					  if($lcount['lead_status']=="Inactive") {
			           @$inacount=$lcount['count'];
					  }
					  if($lcount['lead_status']=="Negotiating") {
			           @$negocount=$lcount['count'];
					  }
					   @$all=@$hotcount+@$warmcount+@$deadcount+@$woncount+@$inacount+$negocount+@$deadcount+@$coldcount;
			          
			}?>

            <div class="d-flex align-items-center mt-4">
                <p class="title mb-0 flex-grow-1">By Lead Status</p>
            </div>
            <ul class="left-nav-bar">
                 <li class="d-flex">
                    <span class="flex-grow-1 leadStatus">Hot Lead</span>
                    <!-- <span>17</span> -->
                </li>
                <li class="d-flex">
                    <span class="flex-grow-1 leadStatus">Warm Lead</span>
                    <!-- <span>17</span> -->
                </li>
                <li class="d-flex">
                    <span class="flex-grow-1 leadStatus" >Cold Lead</span>
                    <!-- <span>17</span> -->
                </li>
                <li class="d-flex">
                    <span class="flex-grow-1 leadStatus">Dead</span>
                    <!-- <span>17</span> -->
                </li>
                <li class="d-flex">
                    <span class="flex-grow-1 leadStatus">Won</span>
                    <!-- <span>17</span> -->
                </li> 
				<li class="d-flex">
                    <span class="flex-grow-1 leadStatus">Inactive</span>
                    <!-- <span>17</span> -->
                </li>
				<li class="d-flex">
                    <span class="flex-grow-1 leadStatus">Negotiating</span>
                    <!-- <span>17</span> -->
                </li>
            </ul>

        </div>
        <div class="content-tickets AllListView">
            <div class="container-fluid">
                <div class="row py-3">
                     <div class="col-6"><h5 class="mb-0"><span class="subHeading">All</span> Tickets</h5></div>
                    <div class="col-6">
                        
                    </div>
                </div>
				 
				 <?php //echo "<pre>";print_r($tickets);
				       foreach($tickets as $ticket) {
						    $sr="";
					if($ticket['opportunity_status']=="New"){ 
					      $sr="#SR";
					}
					if($ticket['opportunity_status']!="New"){ 
					      $sr="#WR";
					}
				 ?>
                <div class="ticket-item">
                    <div class="top d-flex">
                        <div class="t-number">
                            <p class="mb-0"> 
							<?php echo $sr." ".$ticket['sr_request'];?></p>
							 <?php if($ticket['opportunity_status']=="New"){ ?>
                            <div class="status" style="background:red;">
                                <?php echo $ticket['opportunity_status'];?>
                            </div>
							 <?php } ?>
							 <?php if($ticket['opportunity_status']=="Work In Progress"){ ?>
                            <div class="status" style="background:orange;">
                                <?php echo $ticket['opportunity_status'];?>
                            </div>
							 <?php } ?>
							 <?php if($ticket['opportunity_status']=="Qualified"){ ?>
                            <div class="status" style="background:blue;">
                                <?php echo $ticket['opportunity_status'];?>
                            </div>
							 <?php } ?>
							 <?php if($ticket['opportunity_status']=="Closed"){ ?>
                            <div class="status" style="background:green;">
                                <?php echo $ticket['opportunity_status'];?>
                            </div>
							 <?php } ?>
							 <?php if($ticket['opportunity_status']=="Done"){ ?>
                            <div class="status" style="background:green;">
                                <?php echo $ticket['opportunity_status'];?>
                            </div>
							 <?php } ?>
                        </div>
                        <div class="t-content flex-grow-1 ml-3">
                            <!--<h6 class="mb-1">Importing Cases from salesforce crm? <span class="text-color-gray">(4) <span class="text-color-gray">2days ago</span> </span> </h6>-
                            <p class="mb-2 text-color-gray">This work includes material that may be protected as a trademark in some jurisdictions. </p>-->
                        </div>
                    </div>
                    <div class="bottom d-flex">
                        <div class="add-border pin"><i class="fas fa-thumbtack"></i></div>
                        <div class="add-border star"><i class="far fa-star"></i></div>
                        <div class="add-border circle d-flex">
                            <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                            <div class="text">
                                <p class="name-type mb-0 text-color-gray"> Assginee </p>
                                <p class="name mb-0"><?php echo $ticket['advisor'];?></p>
                            </div>
                        </div>
                        <div class="add-border circle d-flex">
                            <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                            <div class="text">
                                <p class="name-type mb-0 text-color-gray"> Raised by </p>
                                <p class="name mb-0">
								<?php echo $ticket['customer_name'];?>
								</p>
                            </div>
                        </div>
                        <div class="add-border circle">
                            <div class="text">
                                <p class="name-type mb-0 text-color-gray"> Priority </p>
                                <p class="name mb-0">
								<?php echo $ticket['priority'];?>
								</p>
                            </div>
                        </div>
                        <div class="add-border circle">
                            <div class="text">
                                <p class="name-type mb-0 text-color-gray">  Service Category</p>
                                <p class="name mb-0"><?php echo $ticket['sr_category'];?></p>
                            </div>
                        </div>
                        <div class="add-border circle">
                            <div class="text">
                                <p class="name-type mb-0 text-color-gray"> Was due on </p>
                                <p class="name mb-0">
								<?php echo $ticket['due_date'];?>
								</p>
                            </div>
                        </div>
                        <div class="add-border"><i class="fas fa-comment-dots showDetailsdiv" onclick="showDetails('<?php echo $ticket['sr_request'];?>',
						'<?php echo $ticket['title'];?>')" style='cursor: pointer;'></i></div>
                    </div>
                </div>
					   <?php } ?>
            </div>
        </div>
    </div>
<!--start show details with comments section start--------------->
    <div class="show-details">
        <div class="close-btn">
            <i class="fas fa-times"></i>
        </div>
        <div class="head d-flex align-items-center">
            <div class="pic flex-grow-1 d-flex ">
                <img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic">
                <p class="title mb-0 srTitle"></p>
            </div>
            <div class="due">
                <p class="mb-0 text-color-gray">Due in 1 day <i class="fas fa-circle ml-3"></i></p>
            </div>
        </div>
        <div class="body">
            <p class="dotted text-color-gray">For more information <a onclick="showAllComments()" href="javascript:void(0);">go to details</a></p>
			<div class="cart-description msgDiv">
                <div class="description-head d-flex">
                    <!--<div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>-->
                    <div class="text">
                        <p class="name mb-0 msgrole"></p>
                    </div>
					<div class="text">
                        <p class="day mb-0 text-color-gray msgcreated_date">Yestarday</p>
                    </div>
					<div class="description-body">
                    <p class="msg"></p>
                   </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="reply">
                <button class="btn-primary" onclick="openForm()" id="replyButton"><i class="fas fa-reply" ></i> Reply </button>
            </div>
        </div>
        <div class="chatBoxDiv" id="myForm" style="display:none;">
		  <form id="" name="" class="" method="post" action="<?php echo base_url();?>Admin/submitAdminComment"
		   enctype="multipart/form-data">
		   <input type="hidden" name="srid" id="srid"/>
         <input  type="checkbox" name="private" id="private"> Private note
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
	<!--End show details with comments section  End ------>
</body>

</html>
<script type="text/javascript">
function showAllComments(){
	 var srid= $("#srid").val();
	  var href="<?php echo base_url();?>Admin/moreCommentsInfo/"+srid;
	  window.open(href);
  }
$(".leadStatus").click(function(){
	//alert("hi");
	//alert($(this).html());
	var lsval=$(this).html();
	 $.ajax({
		    type:"POST",
			url:"<?php echo base_url();?>Admin/getTktsByAdvLeadStatus",
			data: {lsval:lsval},
			success:function(res){
				  $(".AllListView").hide(); 
				  $(".ajaxNav").hide(); 
				  $(".ajaxResponse").html(res);
                  $(".subHeading").html(opStatus);
			}
	  })
 })
 $(".opStatus").click(function(){
	var opStatus=$(this).html();
	 
	 $.ajax({
		    type:"POST",
			url:"<?php echo base_url();?>Admin/getTktsByAdvOpStatus",
			data: {opStatus:opStatus},
			success:function(res){
				  //alert(res);
				  $(".AllListView").hide(); 
				  $(".ajaxNav").hide(); 
				  $(".ajaxResponse").html(res);
                  $(".subHeading").html(opStatus);				  
			}
	   })
 })
$("#chatSubmitBtn").click(function(){
	 var chatMsg=$("#chatMsg").val();
	 var srid=$("#srid").val();
	  $.ajax({
		    type:"POST",
			url:"<?php echo base_url();?>Admin/submitAdminComment",
			data: {chatMsg:chatMsg,srid:srid},
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
function showDetails(srid,title){
	$(".show-details").show();
	$("#srid").val(srid);
	$(".srTitle").html(srid);
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
					  $(".msgrole").append(value.name+ "(Admin)<br/>");
				  }
				  if(value.created_by=="2"){
					  $(".msgrole").append(value.name+ "(Advisor)<br/>");  
				  }
				  if(value.created_by=="3"){
					$(".msgrole").append(value.name+ "(Customer)<br/>");
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

}
</script>