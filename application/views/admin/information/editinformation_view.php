
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Information </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/information/editinformation',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-10">
          
          
          <div class="tab-pane active" id="tab1">
        
              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Information Title<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="cat_id" value="<?= $category[0]->id?>">
                 <select name="category" id="category" onchange="changecategory()" placeholder="Select Category" class="form-control">
                      <option value="Itinerary" <?php if($category[0]->category == 'Itinerary'){echo "selected";}?>>Itinerary</option>
                      <option value="Costing" <?php if($category[0]->category == 'Costing'){echo "selected";}?>>Costing</option>
                      <option value="Other Info" <?php if($category[0]->category == 'Other Info'){echo "selected";}?>>Other Info</option>


                </select>
               
                  <br />
             
                  <?php echo form_error('name','<span class="error" style="color:red;">'); ?>
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
                        <option value="<?php echo $values->id?>" <?php if($category[0]->trip_id == $values->id){echo "selected";}?>><?php echo $values->title;?></option>
                      <?php }}?>
                    </select>
                <br />
                  <p id="res"></p>
                  <?php echo form_error('trip_id','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>   
           <div class="row" <?php if($category[0]->category=='Costing') {?> style="display: block;" 
            <?php } else {?> style="display: none;"<?php }?>id="title">
            <div class="col-md-3">
              <label class="control-label">Title<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                    <select name="title"  data-validation="required"   placeholder="Select Title"  class="form-control">
                      <option value="">Select Title</option>
                      <option value="Inclusions" <?php if($category[0]->title=='Inclusions'){echo "selected";}?>>Inclusions</option>
                      <option value="Exclusions" <?php if($category[0]->title=='Exclusions'){echo "selected";}?>>Exclusions</option>
                     
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
                <textarea name="description" id="description"  class="form-control ckeditor" data-validation="required" placeholder="description"><?= $category[0]->description?></textarea>
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
                  <a href="<?= base_url('admin/information')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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




