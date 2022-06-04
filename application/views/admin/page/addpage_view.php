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
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i> Add Page </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        $attributes = array('class' => 'form-horizontal', 'id' => 'myForm','enctype' =>'multipart/form-data');
        echo form_open('admin/page/addpage',$attributes); 
        ?>
        
          <div class="tab-content">
          <div class="tab-pane active" id="tab1">

              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Page Title <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="title" id="" placeholder="Page Title" value="<?php echo set_value('title'); ?>" data-validation="required" maxlength="50">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            
              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Short Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                
                 <textarea name="description" class="form-control ckeditor" id="description" data-validation="required" placeholder="Short Description" rows="4" cols="80"></textarea>
                  <br />
               
                </div>
                </div>
            </div>
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Long Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                
                 <textarea name="ldescription" class="form-control ckeditor" id="description" data-validation="required" placeholder="Long Description" rows="4" cols="80"></textarea>
                  <br />
               
                </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-3">
              <label class="control-label">Image<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="file" class="form-control" name="imgname" id=""  data-validation="required" >
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            
       

              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Status<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                
                  <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                  <br />
               
                </div>
                </div>
            </div>
            
            <div>&nbsp;</div>
                      
           
                      
           

           
            
          
                      
            
            <div>&nbsp;</div>

            <div class="control-group">
              <label class="control-label">&nbsp;</label>
                <div class="controls">
                  <a href="<?php echo base_url('admin/page')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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





