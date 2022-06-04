
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Gallery </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/gallery/editgallery',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-6">
          
          
          <div class="tab-pane active" id="tab1">
        
        
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Gallery Title<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="cat_id" value="<?= $gallery[0]->id?>">
                <input type="text" class="form-control" name="name" placeholder="Banner Title" value="<?php echo $gallery[0]->title; ?>" data-validation="required" >
                  <br />
             
                  <?php echo form_error('name','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>

          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="description" id="description"  class="form-control ckeditor" data-validation="required" placeholder="description"><?= $gallery[0]->description?></textarea>
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
                 <input type="hidden" name="img" value="<?= $gallery[0]->image ?>" />
                <input type="file" class="form-control" name="imgname"  placeholder="Name">
                  <br />
                
                <a href="<?= base_url($gallery[0]->image) ?>" target="_blank"><img src="<?= base_url($gallery[0]->image) ?> " height="50" width="50"></a>
                  <p id="res"></p>
                  <?php echo form_error('imgname','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
           
        <!--     <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Default Unit <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                  <select name="unitname" class="form-control" <?php echo set_value('unitname'); ?> data-validation="required"> 
                  <option value="">Select Unit</option>            
                  <?php 

                   if(!empty($unit_name))
                   {
                    foreach($unit_name as $value)
                    {
                    ?>
                    <option value ="<?php echo $value->id;?>" <?php if($category[0]->unit_name ==$value->id){echo "selected";}?>><?php echo $value->unit_name;?></option>
                   <?php    
                   }}
                  ?>
                  </select>
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('unitname','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>  -->

        <!--     <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Price <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="price" onkeypress="return numbersonly(event)"  placeholder="Price" value="<?php echo $category[0]->price?>" data-validation="required" >
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('price','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div> -->
          
            <div>&nbsp;</div>
                      
           
           

            <div class="row">
            <div class="col-md-3">
              <label class="control-label">&nbsp;</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                  <a href="<?= base_url('admin/gallery')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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




