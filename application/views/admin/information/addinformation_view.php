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
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $tit?> Add Information </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        <div class="col-md-10">

        <?php 
        $attributes = array('class' => 'form-horizontal', 'id' => 'myForm','enctype' =>'multipart/form-data' );
        echo form_open('admin/information/addInformation',$attributes); 
        ?>
        
          <div class="tab-content">
          <div class="tab-pane active" id="tab1">

           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Information Category<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                    <select name="category" data-validation="required" id="category" placeholder="Select Category" onchange="changecategory()" class="form-control">
                      <option value="">Select Category</option>
                      <option value="Itinerary">Itinerary</option>
                      <option value="Costing">Costing</option>
                      <option value="Other Info">Other Info</option>


                    </select>
                <br />
                  <p id="res"></p>
                  <?php echo form_error('category','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
           
           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Trip<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                    <select name="trip_id" data-validation="required" id="trip_id" placeholder="Select Trip"  class="form-control">
                      <?php if(!empty($trip_data)) {
                           foreach($trip_data as $values){
                        ?>
                        <option value="<?php echo $values->id?>"><?php echo $values->title;?></option>
                      <?php }}?>
                    </select>
                <br />
                  <p id="res"></p>
                  <?php echo form_error('trip_id','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>

           <div class="row" style="display:none;" id="title">
            <div class="col-md-3">
              <label class="control-label">Title<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                    <select name="title"  data-validation="required"   placeholder="Select Title"  class="form-control">
                      <option value="">Select Title</option>
                      <option value="Inclusions">Inclusions</option>
                      <option value="Exclusions">Exclusions</option>
                     
                    </select>
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('category','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>

          
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="description" value="" id="description" class="form-control ckeditor" data-validation="required" placeholder="description"></textarea>
                  <br />
                <?php echo form_error('description','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">&nbsp;</label>
                <div class="controls">
                  <a href="<?php echo base_url('admin/information')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
                  <button type="submit" class="btn btn-success" name="save" id="smtt" > Submit <i class="icon-ok"></i></button>
                  
                 
                
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
<script type="text/javascript">
  function changecategory()
  {
    var category = $("#category").val();
     if(category =='Costing')
     {
       $("#title").css('display','block');
     }
     else
     {
      $("#title").css('display','none');
     }
  }
</script>





