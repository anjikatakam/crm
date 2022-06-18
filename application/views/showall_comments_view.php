<?php //print_r($commentDetails);?>
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
    <?php foreach($commentDetails as $comment) { ?>
  <div class="cart-description msgDiv">
                <div class="description-head d-flex">
                    <div class="img"><img src="<?php echo base_url();?>assets/images/user.png" alt="user icon" class="profile-pic"></div>
                    <div class="text">
					    <?php  if($comment['created_by']==1) { ?>
                        <p class="name mb-0 msgrole"><?php echo $comment['name'];?> (Admin)</p>
						<?php } ?>
						<?php  if($comment['created_by']==2) { ?>
                        <p class="name mb-0 msgrole"> <?php echo $comment['name'];?> (Advisor)</p>
						<?php } ?>
						<?php  if($comment['created_by']==3) { ?>
                        <p class="name mb-0 msgrole"><?php echo $comment['name'];?> (Customer) </p>
						<?php } ?>
                        <p class="day mb-0 text-color-gray msgcreated_date"><?php echo $comment['created_date'];?></p>
                    </div>
                </div>
                <div class="description-body">
				<?php  if($comment['uploads_count']!=0) { ?>
                        <p class="msg"><?php echo $comment['comment'];?><a href='<?php echo base_url();?>Admin/downloadDocs?cmtId=
						<?php echo $comment['id'];?>' target='_blank'><?php echo $comment['uploads_count']; ?></a> attachments  uploaded<br/>"</p>
						<?php } ?>
						<?php  if($comment['uploads_count']==0) { ?>
                        <p class="msg"><?php echo $comment['comment'];?><a> </p>
						<?php } ?>
                    
                </div>
            </div>
	<?php } ?>
 
 