
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Iternary </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        
        <?php 
        $attributes = array('class' => 'form-horizontal', 'id' => 'myForm','enctype' =>'multipart/form-data' );
        echo form_open('admin/iternary/edititernary',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-10">
          
          
          <div class="tab-pane active" id="tab1">
           
           <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Sub package <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                  <select name="subtrip_id" class="form-control" <?php echo set_value('subtrip_id'); ?> data-validation="required"> 
                  <option value="">Select Package Name</option>       
                  <?php 

                   if(!empty($subpackage))
                   {
                    foreach($subpackage as $value)
                    {
                    ?>
                    <option value ="<?php echo $value->id;?>" <?php if($value->id == $iternary[0]->subtrip_id) {echo "selected";}?>><?php echo $value->subtitle;?></option>
                   <?php    
                   }}
                  ?>
                  </select>
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('subtrip_id','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div> 


              <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Title<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="cat_id" value="<?= $iternary[0]->id?>">
                <input type="text" class="form-control" name="name" placeholder="Category Title" value="<?php echo $iternary[0]->title; ?>" data-validation="required" >
                  <br />
             
                  <?php echo form_error('name','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
                 
          
           
             <br />

          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="description" id="description"  class="form-control ckeditor" data-validation="required" placeholder="description"><?= $iternary[0]->description?></textarea>
                  <br />
                <?php echo form_error('description','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
             
          
            <div>&nbsp;</div>
                      
           
           

            <div class="row">
            <div class="col-md-3">
              <label class="control-label">&nbsp;</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                  <a href="<?= base_url('admin/iternary')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
                  <button type="submit" class="btn btn-success" name="save" id="smt" > Submit <i class="icon-ok"></i></button>
                  
                  <img id="buttonreplacement" style="display: none;" src="<?php echo base_url('assets/images/preload.gif'); ?>" alt="loading...">

                
                   
               </div>
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






