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
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $tit?> Add Testimonial </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/testimonial/addTestimonial',$attributes); 
        ?>
        
          <div class="tab-content">
          <div class="tab-pane active" id="tab1">

           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Title<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="<?php echo set_value('title'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('title','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Client Name <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="cname"  placeholder="Client Name" value="<?php echo set_value('cname'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('cname','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>

             <br />
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Designation<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="designation"  placeholder="Designation" value="<?php echo set_value('designation'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('designation','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Short Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="sdescription" value="" id="sdescription" class="form-control ckeditor" data-validation="required" placeholder="Description "></textarea>
                  <br />
                <?php echo form_error('sdescription','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Long Description <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="content" value="" id="description" class="form-control ckeditor" data-validation="required" placeholder="description"></textarea>
                  <br />
                <?php echo form_error('content','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
             
             <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Image <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="file" class="form-control" name="imgname"  placeholder="Name" value="<?php echo set_value('imgname'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('imgname','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Url<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="url"  placeholder="Enter Youtube Url" value="<?php echo set_value('url'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('url','<span class="error" style="color:red;">'); ?>
                </div>
              </div>
            </div>
             <br />

            <div class="control-group">
              <label class="control-label">&nbsp;</label>
                <div class="controls">
                  <a href="<?php echo base_url('admin/testimonial')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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


<script>
  function subcat()
  {
    var cat = $("#cat").val();
    $.ajax({
       'type' :'POST',
       'url'  :"<?php echo base_url('admin/banner/getSubcategory')?>",
       'data' :'cat='+cat,
       'success' :function(htmlres)
       {
         if(htmlres !='')
         {
         $("#xyz").css("display", "block");
         $("#cata").html(htmlres);
         }
         if(htmlres =='')
         {
          $("#xyz").css("display", "none");
         }
       }


    });
  }
</script>


