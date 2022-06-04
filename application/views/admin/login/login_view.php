<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
 <!--<![endif]-->
<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title; ?></title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!--
		<script language="javascript" type="text/javascript" src="<?=base_url("assets/js/index_validations.js")?>"></script>
		--->

	<!--new design start-->  
		<?php echo link_tag('assets/new/bootstrap/css/bootstrap.min.css'); ?>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<?php echo link_tag('assets/new/dist/css/AdminLTE.min.css'); ?>
		<!-- iCheck -->
		<?php echo link_tag('assets/new/plugins/iCheck/square/blue.css'); ?>

		<!--new design end-->    
		<style>
		.lpic { box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:0px; }
		.lpad { padding-left:0px; }
		.pictop { width:100%;height:450px; }
		.login-box-body, .register-box-body {
			background: #3F51B5;
			/* padding: 20px; */
			border-top: 0;
			color: #fff;
			box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
			padding: 60px 20px 84px 20px;
			height: 356px;
		}
		</style>  
	</head>
<!-- END HEAD -->

	<!-- BEGIN BODY -->
	<body class="hold-transition login-page" style="background:#fff;">
	<!--<div class="login-header"><div class="center"><br><br><br></div></div>-->
	<!-- BEGIN LOGIN -->
	<div class="row" style="margin-top:7%;">
	<div class="col-md-5 col-md-offset-2 lpic">
		<img class="pictop" src="<?=base_url('assets/new/dist/img/agilecrm-login-new.png')?>">
	</div>
	<div class="col-md-4 lpad">
	<div class="login-box" id="login" style="margin-bottom:1%;">
		  <div style="background:url(<?php echo base_url();?>assets/images/headerbg1.jpg); margin-bottom:0px; text-align:center; padding:30px 0; color:#fff;">
			<a href="<?php echo base_url('admin')?>" style="color:#fff;"><b style="font-size:24px;">DREAM MY TRIP <img src="<?=base_url('assets/new/dist/img/dream_my_trip.png')?>" class="img-circle" width="100" alt="User Image"></b></a>
		  </div><!-- /.login-logo -->
		  <?php
		  $attributes = array('class' => 'form-vertical no-padding no-margin','id'=>'loginform' );
		  echo form_open('admin/admin/adminlogin', $attributes); ?>
		  <div class="login-box-body">
			<div class="msg">
			<?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
			</div>

			<h4>Login Here</h4>
			  <div class="form-group has-feedback">
				<?php 
						$data = array( 'type' => 'text', 'class' => 'mlogin2 form-control', 'data-validation' =>'required','name'=>'username', 'id'=> 'username', 'placeholder' => 'Username' );
						echo form_input($data,set_value('username'));
					  ?>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
			  <?php 
				  $data = array( 'type' => 'password', 'name' => 'password', 'class' => 'mlogin2 form-control', 'data-validation' => 'required' ,'id'   => 'password', 'placeholder' => 'Password' );
				  echo form_input($data,set_value('password'));
				  ?>
				 <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			  </div>
			  <div class="row">
			 <!-- /.col -->           
				<div class="col-xs-12">
				   <input style="background: #ff9f07; color:#fff; font-weight:bold;" type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
				</div><!-- /.col -->
				 
			   
			  </div>
			<!-- /.social-auth-links -->
<div class="col-xs-12" style="margin:10px 0; text-align:center;">
            <!--<span style="cursor:pointer;" onclick="return forgot();"><u>Forgot Password ?</u></span><br>-->
            </div>
		  </div><!-- /.login-box-body -->
		   <?php echo form_close(); ?>

		   <div id="forgotpassword" style="display:none;" class="login-box-body" >
		   	<div id="msg"></div>
		 <h4>Forgot Password</h4>
		    <form >
          <div class="form-group has-feedback">
            <input type="text" id ="emailid" class="form-control" placeholder="User Email" data-validation="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
      
          <div class="row">
           
            <div class="col-xs-12">
              <button type="button" id="goforgotpasswords" onclick="return forgotpassword();" class="btn btn-primary btn-block btn-flat" style="background-color: #ff5a92; color:#fff; font-weight:bold;">Change Password</button>
            </div><!-- /.col -->

            <div class="col-xs-12" style="margin:10px 0; text-align:center;">
            <span style="cursor:pointer;" onclick="return login();">Back To Login Page</span><br>
            </div>
			   

          </div>
        </form>
		</div>
		</div>
		
	</div>
	</div>
    
	  <!-- END LOGIN -->
	  <!-- BEGIN COPYRIGHT -->
	  <div id="login-copyright" style="font-size: 14px; text-align:center;">
	   <?=COPYRIGHT?>
	  <p style="text-align: center;padding-bottom: 10px;">Powered by: Weblieu Technologies </p>
		  
	  </div>
	  <!-- END COPYRIGHT -->
		<!-- BEGIN JAVASCRIPTS -->
		<!-- jQuery 2.1.4 -->
		<script src="<?=base_url('assets/new/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?=base_url('assets/new/bootstrap/js/bootstrap.min.js')?>"></script>
		<!-- iCheck -->
		<script src="<?=base_url('assets/new/plugins/iCheck/icheck.min.js')?>"></script>
		<!-- <!-- <script src="<?=base_url("assets/js/scripts.js")?>"></script> 

		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' // optional
				});
			});
		</script>

		<!-- END JAVASCRIPTS -->
	</body>
<script src="<?=base_url('assets/js/jquery.form-validator.min.js')?>"></script>
  <script>
	function forgot()
	{
		$("#forgotpassword").show();
		$("#loginform").hide();
		  
	}
  function login()
	{
		$("#loginform").show();	
		$("#forgotpassword").hide();
	}
</script>
<script>
function forgotpassword()
{
 var email = $("#emailid").val();
 //alert(email);
 if(email == "")
 {
 $("#msg").html('<div class="alert alert-danger"><strong>Please enter email id</strong></div>');
 }	
 else
 {
 	$.ajax({

 		   type:'POST',
 		   url: '<?= base_url('admin/admin/forgotpass')?>',
 		   data:'email='+email,
 		   success:function(data)
 		   {
 		   	//alert(data);exit();
              $("#msg").html(data);
 		   }
 	});
 }
}
</script>

<!-- END BODY -->
</html>