
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

    <div class="row">
       <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Testimonial </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/testimonial/edittestimonial',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-10">
          
          
          <div class="tab-pane active" id="tab1">
        
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Title <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="cat_id" value="<?= $testimonial[0]->id?>">
                <input type="text" class="form-control" name="title"  placeholder="Client Name" value="<?php echo $testimonial[0]->title; ?>" data-validation="required">
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
                 <input type="hidden" name="cat_id" value="<?= $testimonial[0]->id?>">
                <input type="text" class="form-control" name="cname"  placeholder="Client Name" value="<?php echo $testimonial[0]->client_name; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('cname','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Designation<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="designation"  placeholder="Designation" value="<?php echo $testimonial[0]->designation;?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('designation','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
           
            <br>
              
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Short Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="sdescription" value="" id="sdescription" class="form-control ckeditor" data-validation="required" placeholder="Content"><?php echo $testimonial[0]->client_desc;  ?></textarea>
                  <br />
                <?php echo form_error('sdescription','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Long Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="content" value="" id="description" class="form-control ckeditor" data-validation="required" placeholder="Content"><?php echo $testimonial[0]->content;  ?></textarea>
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
                 <input type="hidden" name="img" value="<?= $testimonial[0]->image ?>" />
                <input type="file" class="form-control" name="imgname"  placeholder="Name">
                  <br />
                
                <a href="<?= base_url($testimonial[0]->image) ?>" target="_blank"><img src="<?= base_url($testimonial[0]->image) ?> " height="50" width="50"></a>
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
                 
                <input type="text" class="form-control" name="url"  placeholder="Enter Youtube Url" value="<?php echo $testimonial[0]->url; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('url','<span class="error" style="color:red;">'); ?>
                </div>
              </div>
            </div>
           
            <br>

          
            <div>&nbsp;</div>
                      
           
           

            <div class="row">
            <div class="col-md-3">
              <label class="control-label">&nbsp;</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                  <a href="<?= base_url('admin/testimonial')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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
