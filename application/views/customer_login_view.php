<style>
	/* Coded with love by Mutiullah Samim */
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			// background: #60a3bc !important;
			background: #fff !important;;
		}
		.user_card {
			height: 400px;
			width: 350px;
			margin-top: auto;
			margin-bottom: auto;
			// background: #f39c12;
			background: #12b5f3;
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
			margin-top: 31px;
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
			 <h3><center><b>Customer Login</b></center></h3>
				<!--<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo base_url();?>assets/images/crm_logo.png/">
					</div>
				</div>-->
				<div class="d-flex justify-content-center form_container">
					 <?php 
					  $attributes=array("id"=>"loginFrm","name"=>"loginFrm");
					 echo form_open("Customer/checkCustomerLogin",$attributes);?>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="email" name="email" class="form-control input_user" value="" placeholder="Enter email id" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pwd" id="pwd" class="form-control input_pass" value="" placeholder="password" required>
						</div>
						<div class="form-group">
							<!--<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>-->
						</div>
					<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
				   <br/>
				   <div class="d-flex justify-content-center links">
						<a href="<?php echo base_url();?>Home/adminlogin"  style="color:#2e08fff2;">Click Here for Admin Login</a>
					</div>
					<div class="d-flex justify-content-center links" >
						<a style="color:#2e08fff2;" href="<?php echo base_url();?>Home" >Click Here for Advisor Login</a>
					</div>
				   <br/>
				   
				 <?php echo form_close();?>
				</div>
		
				<!--<div class="mt-4">
					<div class="d-flex justify-content-center links">
						<a href="javascript:void(0);" data-target="#forgotPwdModal" data-toggle="modal" style="color:#ff0000;">Forgot your password?</a>
					</div>
				</div>-->
			</div>
		</div>
	</div>
	
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
	   echo form_open("Customer/resetPassword",$attributes);?>
          
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
	