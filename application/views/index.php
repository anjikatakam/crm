<!DOCTYPE html>
<html lang="en">
<head>
    <title>::SEERM::</title>
	<link href="<?php echo base_url();?>assets/css/bootstrap-multiselect.css" rel="stylesheet">
	<script src="<?php echo base_url();?>assets/js/bootstrap-multiselect.js"></script>
	
</head>
<style>
.dropdown-menu {
	min-width: 26rem;}
	/* Coded with love by Mutiullah Samim */
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #60a3bc !important;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			background: #fff;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}
		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			background: #60a3bc;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 30px;
		}
		.login_btn {
			width: 100%;
			background: #c0392b !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
</style>
<body>

    <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
			<?php if($this->session->userdata("msg")){ ?>
          <center><p style="color:red;font-size:15px;font-weight:bold;" class="hide-it"><?php echo $this->session->userdata("msg");?></center></p>
  <?php  }
  $this->session->unset_userdata("msg"); ?>
			<h4><center><b>Advisor Login</b></center></h4>
				<!--<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo base_url();?>assets/images/crm_logo.png/">
					</div>
				</div>-->
				<div class="d-flex justify-content-center form_container">
					 <?php 
					  $attributes=array("id"=>"loginFrm","name"=>"loginFrm");
					 echo form_open("Home/checkLogin",$attributes);?>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="text" name="phone" name="phone" class="form-control input_phone" value="" placeholder="Enter phone number" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pwd" id="pwd" class="form-control input_pass" value="" placeholder="password" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
							</div>
						</div>
					<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
				 <?php echo form_close();?>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an Advisor account? <a href="javascript:void(0);"data-toggle="modal" data-target="#signUpModal" 
						class="ml-2" data-toggle="modal" >Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="<?php echo base_url();?>Customer/login" >Click Here for Customer Login</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="<?php echo base_url();?>Home/adminlogin" >Click Here for Admin Login</a>
					</div>
					<!--<div class="d-flex justify-content-center links">
						<a href="javascript:void(0);" data-target="#forgotPwdModal" data-toggle="modal" style="color:#ff0000">Forgot your password?</a>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<!-- The Modal -->
<div class="modal" id="signUpModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title" style="font-size:1rem;">Creat an Account</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	   <?php 
	   $attributes=array("id"=>"signUpFrm","name"=>"signUpFrm","enctype"=>"multipart/form-data");
	   echo form_open("Home/signUp",$attributes);?>
          <div class="form-group">
		      <input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required  maxlength="10"/>
		  </div>
		  <div class="form-group">
		      <input type="email" class="form-control" name="email" id="email" placeholder="Email"  required />
		  </div> 
		  <div class="form-group">
		      <input type="password" class="form-control" name="signpwd" id="signpwd" placeholder="Password"  required />
		  </div>
		  <div class="form-group">
		      <select  class="form-control" name="state" id="state" required />
			   <option value="">--Choose state--</option>
			      <?php foreach($states as $scat) { ?>
				   <option value="<?php echo $scat['state_code'];?>"><?php echo $scat['state_name'];?></option>
				  <?php } ?>
			  </select>
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="city" id="city" placeholder="City" required />
		  </div>
		  <!--<div class="form-group">
		      <select class="form-control" name="category" id="category"/>
			    <option value="">--Choose Service Category --</option>
			    <option value="advisor1">Business Maintanance</option>
			    <option value="advisor2">Business Formation</option>
			    <option value="advisor3">Business Compliance</option>
			  </select>
		  </div>-->
           <div class="form-group">
		      <select multiple="multiple" class="form-control" name="category" id="category" placeholder="Service category" required />
			   <!--<option value="">--Choose Area of Expetize--</option>-->
			      <?php foreach($serviceCategories as $scat) { ?>
				   <option value="<?php echo $scat['sr_category'];?>"><?php echo $scat['sr_category'];?></option>
				  <?php } ?>
			  </select>
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="aadhar" id="aadhar" placeholder="Enter aadhar card number" required />
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="pan" id="pan" placeholder="Enter PAN card number" required />
		  </div>
		   <div class="file-field">
				<div class="btn btn-primary btn-sm float-left">
				  <input type="file" name="file[]" multiple>
				</div>
				<div class="file-path-wrapper">
				  <input class="file-path validate" type="text" placeholder="Upload one or more files">
				</div>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm" id="submit">Sign Up</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
      </div>
        <?php echo form_close();?>
    </div>
  </div>
</div>



<!-- The Modal -->
<div class="modal" id="forgotPwdModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:1rem;">Forgot Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	   <?php 
	   $attributes=array("id"=>"forgotPwdFrm","name"=>"forgotPwdFrm");
	   echo form_open("Home/signUpSbmt",$attributes);?>
          
		  <div class="form-group">
		      <input type="email" class="form-control" name="forgotemail" id="forgotemail" placeholder="Enter your registerd email"  required />
		  </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm">Reset</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
      </div>
        <?php echo form_close();?>
    </div>
  </div>
</div>
<script>
$(function() {
	var timeout = 3000;
    $(".hide-it").delay(timeout).fadeOut(100);
});
$(function () { 
    $('#category').multiselect({ 
        buttonText: function(options, select) {
            console.log(select[0].length);
            if (options.length === 0) {
                return 'Choose expert';
            }
            if (options.length === select[0].length) {
                return 'All selected ('+select[0].length+')';
            }
            else if (options.length >=10) {
                return options.length + ' selected';
            }
            else {
                var labels = [];
                console.log(options);
                options.each(function() {
                    labels.push($(this).val());
                });
                return labels.join(', ') + '';
            }
        }
    
    });
});

function ValidateEmail(mail) {
 if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
  {
    return (true)
  }
   
	bootbox.alert('<p class="alert alert-danger">You have entered an invalid email address</p>');
    return (false)
}
 $("#submit").click(function(){
	var name=$("#name").val();
	var email=$("#email").val();
	var phone=$("#phone").val();
	var signpwd=$("#signpwd").val();
	var city=$("#city").val();
	var state=$("#state").val();
	//var category=$("#category").val();
	var services = [];
	$("#category :selected").map(function(i, el) {
		//console.log($(el).val());
		
                
                    services.push($(el).val());
              
         //category=services.join(',') + '';
		 
      //return $(el).val();

    }).get();
	var category;
		  
		 category=services.join(',') + '';
		 console.log(category);
	//return false;
	 if(name==""){
		 bootbox.alert('<p class="alert alert-danger">Enter you name</p>');
		 return false;
	 }
	  if(phone==""){
		 bootbox.alert('<p class="alert alert-danger">Enter phone number</p>');
		 return false;
	 }
	 if(isNaN(phone)){
		 bootbox.alert('<p class="alert alert-danger">phone number should contains digits only</p>');
		 return false;
	 }
	 if(phone.length<10){
		 bootbox.alert('<p class="alert alert-danger">Phone number should have 10 digits</p>');
		 return false;
	 }
	 if(phone.length>10){
		 bootbox.alert('<p class="alert alert-danger">Phone number should have 10 digits only</p>');
		 return false;
	 }
	 if(email==""){
		 bootbox.alert('<p class="alert alert-danger">Enter email</p>');
		 return false;
	 }
	 if(signpwd==""){
		 bootbox.alert('<p class="alert alert-danger">Enter password</p>');
		 return false;
	 } 
	 if(city==""){
		 bootbox.alert('<p class="alert alert-danger">Enter city</p>');
		 return false;
	 }
	 else {
		 $("#signUpFrm").submit();
	 // $.ajax({
		 // type:"post",
		 // url:"<?php echo base_url();?>Home/signUp",
		 // data:{name:name,email:email,phone:phone,city:city,state:state,category:category,signpwd:signpwd},
		 // success:function(res){
			 // if(res==1){
			  // bootbox.alert('<p class="alert alert-success">Advisor account created successfully</p>');
			  // $("#signUpModal").modal("hide");
			 // }
			 // if(res==2){
			  // bootbox.alert('<p class="alert alert-danger">Opps! entered Phone number already registerd</p>');
			 // } 
			 // if(res==0){
			 // bootbox.alert('<p class="alert alert-danger">Account creation failed try again</p>');
			   // $("#signUpModal").modal("hide");
			 // }
			
		 // } 
	 // })
	 }
 })
 </script>