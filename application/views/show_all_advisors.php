<?php //print_r($commentDetails);?>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
<?php if($this->session->userdata("msg")){ ?>
          <script>bootbox.alert('<?php echo $this->session->userdata("msg");?>');</script>
  <?php  }  $this->session->unset_userdata("msg"); ?>
<div class="nav-bar">
        <nav class="navbar navbar-expand-sm bg-nav-color navbar-dark">
            <i class="fas fa-braille"></i>
            <a class="navbar-brand" href="<?php echo base_url();?>Admin">CRM</a>

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
	<br/>
	 <h2 style="margin-left:20px;">Advisors List</h2>
	 <h5 style="float:right;margin-right:60px;margin-top:-40px;">
	 <a href="<?php echo base_url();?>Admin"><< Back to home</a></h5>
	 <br/>
	 <br/>
	 <table class="table table-stripped" id="myTable">
	 <thead>
	 <tr>
	 <th>SNO</th>
	 <th>Name</th>
	 <th>Email</th>
	 <th>Phone</th>
	 <th>state</th>
	 <th>City</th>
	 <th>Area Of Expertise</th>
	 <th>status</th>
	 <th>Edit</th>
	 <th>Delete</th>
	 <th>Admin</th>
	 </tr>
	 </thead>
	  <tbody>
	  
    <?php  $i=1;foreach($advisors as $advisor) { ?>
	   <tr>
	   <td><?php echo $i;?></td>
	   <td><?php echo $advisor['name'];?></td>
	   <td><?php echo $advisor['email'];?></td>
	   <td><?php echo $advisor['phone'];?></td>
	   <td><?php echo $advisor['state'];?></td>
	   <td><?php echo $advisor['city'];?></td>
	   <td><?php echo $advisor['area_of_expertise'];?></td>
	    <?php if($advisor['status']==1) { ?>
		 <td><span style="color:white;background-color:green;">Active</span></td>
		 
		 
		<?php } ?>
		<?php if($advisor['status']==0) { ?>
		 <td><span style="color:white;background-color:red;">In-active</span></td>
		<?php } ?>
	  
	   <td><button class="btn btn-primary btn-sm" onclick="editAdvisor('<?php echo $advisor['id'];?>')">Edit</td>
	   <td><button class="btn btn-danger btn-sm" 
	   onclick="deleteAdvisor('<?php echo $advisor['id'];?>')">Delete</td>
	   <?php if($advisor['role']!="admin") { ?>
	   <td><button class="btn btn-primary btn-sm" 
	   onclick="changetoAdmin('<?php echo $advisor['id'];?>')">Pramote to Admin
	   </td>
	   <?php } ?>
	   <?php if($advisor['role']=="admin") { ?>
	   <td><button class="btn btn-info btn-sm" 
	   onclick="changetoAdvisor('<?php echo $advisor['id'];?>')">Back to Advisor
	   </td>
	   <?php } ?>
	   </tr>
	    
	  
	  <?php $i++; ?>
	<?php } ?>
       </tbody>   
   </table>
   
   
   
   
   <!--Model sections--->
   <script type="text/javascript">
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
      function editAdvisor(advrid) {
		  $.ajax({
			   type:"post",
			   url:"<?php echo base_url();?>Advisors/getAdvisorDetails",
			   data:{advrid:advrid},
			   success:function(res){
				   $.each(JSON.parse(res),function(index,value){
				 $("#eid").val(value.id);
				 $("#ename").val(value.name);
				 $("#email").val(value.email);
				 $("#ephone").val(value.phone);
				 $("#estate").val(value.state);
				 $("#ecity").val(value.city);
				 $("#estatus").val(value.status);
			 })
				   
			   }
		  })
		  $("#editModal").modal("show");
	  }
   </script>
   <!-- The Edit Modal -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:1rem;">Edit Adviosr</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	   <?php 
	   echo form_open("Advisors/updateAdvisor");?>
		   <input type="hidden" name="eid" id="eid"/>
		  <div class="form-group">
		      <input type="text" class="form-control" name="ename" id="ename" placeholder="Advisor name" required />
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="email" id="email" placeholder="Advisor email" required />
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="ephone" id="ephone" placeholder="phone number"  required disabled />
		  </div> 
		 <div class="form-group">
		      <input type="text" class="form-control" name="estate" id="estate" placeholder="Enter state"  required  />
		  </div>
		  <div class="form-group">
		      <input type="text" class="form-control" name="ecity" id="ecity" placeholder="Enter city"  required  />
		  </div> 
		 
		  <div class="form-group">
		      <select  class="form-control" name="estatus" id="estatus">
                   <option value="1">Active</option>			  
                   <option value="0">In-active</option>			  
			  </select>
		  </div>
		<div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm" id="submit">Update</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        </div>
        <?php echo form_close();?>
		  </div>
      </div>
	  </div>
	 </div>
	 <script type="text/javascript">
      function deleteAdvisor(advrid) {
		bootbox.confirm({
			message: "Are you sure want delete this advisor?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
    callback: function (result) {
        //console.log('This was logged in the callback: ' + result);
		  if(result==true){
			    $.ajax({
			    type:"post",
			    url:"<?php echo base_url();?>Advisors/deleteAdvisor",
			    data:{advrid:advrid},
			    success:function(res){
					 if(res==1){
						 bootbox.alert("<p class='alert-success'>Advisor deeleted successfully");
						 location.reload();
					 }
					 else{
						 bootbox.alert("<p class='alert-danger'>Advisor deeleted successfully");
						 
					 }
			   }
			 })
		  }
    }
   });
		
		 
				   
	  }
	  
	  function changetoAdmin(advrid) {
		bootbox.confirm({
			message: "Are you sure want pramote this advisor as admin?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
    callback: function (result) {
        //console.log('This was logged in the callback: ' + result);
		  if(result==true){
			    $.ajax({
			    type:"post",
			    url:"<?php echo base_url();?>Advisors/changetoAdmin",
			    data:{advrid:advrid},
			    success:function(res){
					 if(res==1){
						 bootbox.alert("<p class='alert-success'>Advisor pramoted  to admin successfully");
					 }
					 if(res==2){
						 bootbox.alert("<p class='alert-warning'>This Advisor Already pramoted to admin");
					 }
			   }
			 })
		  }
    }
   });
			   
	  }
	  
	  function changetoAdvisor(advrid) {
		bootbox.confirm({
			message: "Are you sure want pramote this advisor as admin?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
    callback: function (result) {
        //console.log('This was logged in the callback: ' + result);
		  if(result==true){
			    $.ajax({
			    type:"post",
			    url:"<?php echo base_url();?>Advisors/changetoAdvisor",
			    data:{advrid:advrid},
			    success:function(res){
					 if(res==1){
						 bootbox.alert("<p class='alert-success'>Changed to advisor successfully");
						 //location.reload();
					 }
					 if(res==2){
						 bootbox.alert("<p class='alert-warning'>This Advisor Already pramoted to admin");
						 //$(".btntitle").html("Back to Advisor");
						 //location.reload();
					 }
			   }
			 })
		  }
    }
   });
			   
	  }
   </script>
	 

  
 
 