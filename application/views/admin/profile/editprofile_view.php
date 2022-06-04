
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Profile </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/admin/editprofile',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-6">
          
          
          <div class="tab-pane active" id="tab1">
        
              <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Name <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="profileid" value="<?= $profile[0]->id?>">
                <input type="text" class="form-control" name="name" placeholder="User Name" value="<?php echo $profile[0]->username; ?>" data-validation="required" >
                  <br />
             
                  <?php echo form_error('name','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>


              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Email:</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="email" placeholder="Email"   value="<?php echo $profile[0]->email; ?>" readonly>
                  <br>
                
                </div>
                </div>
            </div>

             <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Image <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="img" value="<?php if(!empty($profile[0]->profile)){echo $profile[0]->profile;} ?>" />
                <input type="file" class="form-control" name="imgname"  placeholder="Name">
                  <br />
                
                <a href="<?= base_url($profile[0]->profile) ?>" target="_blank"><img src="<?= base_url($profile[0]->profile) ?> " height="50" width="50"></a>
                  <p id="res"></p>
                  <?php echo form_error('imgname','<span class="error" style="color:red;">'); ?>
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
				<!--
                  <a href="<?//= base_url('admin/profile/edit')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                -->  
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





