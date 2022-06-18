<style>
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
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
			<?php if($this->session->userdata("msg")){ ?>
          <center><p style="color:red;font-size:15px;font-weight:bold;" class="hide-it"><?php echo $this->session->userdata("msg");?></center></p>
  <?php  }
  $this->session->unset_userdata("msg"); ?>
			<h4><center><b>Admin Login</b></center></h4>
				<div class="d-flex justify-content-center form_container">
					 <?php 
					  $attributes=array("id"=>"loginFrm","name"=>"loginFrm");
					 echo form_open("Home/checkAdminLogin",$attributes);?>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" name="username" class="form-control input_phone" value="" placeholder="Enter username" required>
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
				<br/>
				<div class="d-flex justify-content-center links">
						<a href="<?php echo base_url();?>Home"  style="color:#2e08fff2;">Click Here for Advisor Login</a>
					</div>
					<div class="d-flex justify-content-center links" >
						<a style="color:#2e08fff2;" href="<?php echo base_url();?>Customer/login" >Click Here for Customer Login</a>
					</div>
		
			</div>
		</div>
	</div>
<script type="text/javascript">
$(function() {
	var timeout = 3000;
    $(".hide-it").delay(timeout).fadeOut(100);
});
</script>