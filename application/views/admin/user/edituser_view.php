<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
      <div class="span12">
      </div>
    </div>
	
<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i> Edit User </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
        <div class="col-md-6" style="text-align:right;">
        &nbsp;
        </div>
        </div>
		

		
		
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid box" style="padding:10px;">
      <div class="span12">
        <div class="loading" ><div class="content"><img src="<?php echo base_url('assets/images/loading.gif'); ?>"/></div></div>
      
      <div class="widget" id="form_wizard_1">
        <div class="widget-body form" style="color:#333;">
        <div class="row">
          <div class="col-md-1"></div>
        <div class="col-md-8">

        <?php 
        $attributes = array('class' => 'form-horizontal', 'id' => 'myForm' );
        echo form_open('admin/user/edituser',$attributes); 
        ?>
        <?php //echo"<pre>";print_r($user); ?>
          <div class="tab-content">
          <div class="tab-pane active" id="tab1">

              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Name <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="user_id" value="<?= $user[0]->id ?>">
                <input type="text" class="form-control" name="name"  placeholder="Name"  data-validation="required" value="<?= $user[0]->name ?>" onkeypress="return onlyletter(event)" maxlength="50">
                  <br />
                  <p id="res"></p>
                 
                </div>
                </div>
            </div>

              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Email <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="email" placeholder="Email"     data-validation="required email" value="<?= $user[0]->email ?>" readonly>
                  <br>
                 
                </div>
                </div>
            </div>
            
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Mobile Number <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
    <input type="text" class="form-control" onkeypress="return numbersonly(event)" name="mobile" placeholder="Mobile Number" id="mobile"   value="<?php echo $user[0]->phone; ?>" data-validation="required" >
 <!--   <span id="email_error" style="display: none;color: red;font-size: 14px;font-weight: bold">This email is already exists.</span>-->
	<!--<span id="email_suscess" style="display: none;color: green;font-size: 14px;font-weight: bold">This is valid email id.</span>-->
                  <br>
                 
                </div>
                </div>
            </div>
              
              
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Country Name<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="country"  placeholder="Country Name" value="<?php echo $user[0]->country; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                 
                </div>
                </div>
            </div>
			<div class="row">
            <div class="col-md-3">
              <label class="control-label">City Name<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="city"  placeholder="City Name" value="<?php echo $user[0]->city; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                 
                </div>
                </div>
            </div>
			<div class="row">
            <div class="col-md-3">
              <label class="control-label">Address<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="address" value="" id="address" class="form-control " rows="10" data-validation="required" placeholder="Address..."><?php echo $user[0]->address; ?></textarea>
                  <br />
                <?php echo form_error('address','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            <div>&nbsp;</div>

            <div class="control-group">
              <label class="control-label">&nbsp;</label>
                <div class="controls">
                  <a href="<?php echo base_url('admin/user')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
                  <button type="submit" class="btn btn-success" name="save" id="smt" > Submit <i class="icon-ok"></i></button>
                  
                  <img id="buttonreplacement" style="display: none;" src="<?php echo base_url('assets/images/preload.gif'); ?>" alt="loading...">

                
               </div>
            </div>
                      
            
      
          </div>
          </div>
          
          </div>
          
          </div>
          
          
       <?php echo form_close(); ?>
      </div>
      </div>
    </div>
    </div>
  <!-- END PAGE CONTENT-->
  </div>
</div>
</div>
<script type="text/javascript">
  
  function checkEmailid(emailid){
      

  
}
 function show_username()
    {
      var username = $("#username").val();
    // alert(username);
      if(username)
      {
        $.post('<?php echo base_url(); ?>staff/checkUser', {'username': username, 'csrf_test_name': hash},
        function(data){

                $("#res").html(data);
                
              });

      }
    }
</script>




