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
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $tit?> Add Hotel </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/hotels/addHotel',$attributes); 
        ?>
        
          <div class="tab-content">
          <div class="tab-pane active" id="tab1">

           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Hotel Title <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" name="title"  placeholder="Hotel Title" value="<?php echo set_value('title'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('title','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
               <br>
           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Slug <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="slug"   placeholder="Enter Slug" id="slug"  data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('slug','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
        
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Price <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" onkeypress="return numbersonly(event)" name="price"  placeholder="Enter Price" value="<?php echo set_value('location'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('location','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
           
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Rating <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="number" class="form-control" onkeypress="return numbersonly(event)" name="rating"  placeholder="Enter Rating" min="1" max="5" value="<?php echo set_value('rating'); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('rating','<span class="error" style="color:red;">'); ?>
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

            <div class="control-group">
              <label class="control-label">&nbsp;</label>
                <div class="controls">
                  <a href="<?php echo base_url('admin/hotels')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<script>
  $(".chosen-select").chosen({

  no_results_text: "Oops, nothing found!"
  
})
</script>

<script> 
 function convertToSlug( str ) {
  
  //replace all special characters | symbols with a space
  str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
  
  // trim spaces at start and end of string
  str = str.replace(/^\s+|\s+$/gm,'');
  
  // replace space with dash/hyphen
  str = str.replace(/\s+/g, '-'); 
  
  document.getElementById("slug").value= str;
 // return str;
}
</script>
