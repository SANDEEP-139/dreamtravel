<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Trip </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/trip/edittrip',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-10">
          
          
          <div class="tab-pane active" id="tab1">
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Place Type <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
               <?php $explodePlace = explode(",",$trip[0]->place_type); ?>  
              <select name="place_type[]" class="form-control" id="place_type"   data-validation ="required" data-placeholder="Select Place Type..." required>
                <!--<option value="" disabled>Select Place Type</option>-->
                <option value="1" <?php if(in_array(1,$explodePlace)){echo "selected";}?>>Domestic Place</option>
                <option value="2" <?php if(in_array(2,$explodePlace)){echo "selected";}?>>International Place</option>
                 
              </select>
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('place_type','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Trip Category <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
              <select name="tripcategory" class="form-control" data-validation ="required" placeholder="Select Category">
                <option value="">Select Category</option>
                 <?php if(!empty($trip_category)) {
                    foreach($trip_category as $values){
                  ?>
                   <option value="<?php echo $values->id;?>" <?php if($trip[0]->trip_category_id==$values->id){echo "selected";}?>><?php echo $values->category_title;?></option>
                <?php }}?>
              </select>
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('tripcategory','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
       
           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Trip Title <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"  name="title"  placeholder="Trip Title" value="<?php echo $trip[0]->title; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('title','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Slug <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="slug" value="<?php echo $trip[0]->slug;?>"   placeholder="Enter Slug" id="slug"  data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('slug','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
              <input type="hidden" name="tripid" value="<?= $trip[0]->id ?>" />
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Trip Duration <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="duration"  placeholder="Trip Duration" value="<?php echo $trip[0]->duration; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('duration','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div> 
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Arrival Date <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control datepicker1" name="arrival_date"  placeholder="Arrival Date" value="<?php echo date('d-m-Y',strtotime($trip[0]->arrival_date)); ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('arrival_date','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div> 
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Departure Date <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
               
                <input type="text" class="form-control datepicker1" name="departure_date"  placeholder="Departure Date"  value="<?php echo date('d-m-Y',strtotime($trip[0]->departure_date)); ?>"  data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('departure_date','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div> 
              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Trip Location <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="location"  placeholder="Trip Location" value="<?php echo $trip[0]->location; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('location','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div> 
           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Price <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" onkeypress="return numbersonly(event)" name="price"  placeholder="Enter Price" value="<?php echo $trip[0]->price; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('location','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Discount Price <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" onkeypress="return numbersonly(event)" name="discount"  placeholder="Discount Price" value="<?php echo $trip[0]->discount_price; ?>"  data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('discount','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
       <!--    <div class="row">
            <div class="col-md-3">
              <label class="control-label">Cost per person <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" onkeypress="return numbersonly(event)" name="cost"  placeholder="Enter cost" value="<?php echo $trip[0]->cost_per_person; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('cost','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div> -->
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Rating <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="number" class="form-control" onkeypress="return numbersonly(event)" name="rating"  placeholder="Enter Rating" min="1" max="5" value="<?php echo $trip[0]->rating; ?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('rating','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Featured As :</label>
              </div>
              <div class="col-md-9">
                <?php $exparraytype =explode(",",$trip[0]->trip_type); ?>
                <div class="controls">
                   <input type="checkbox" name="type[]" value="1" <?php if(in_array(1,$exparraytype)){echo "checked";}?> > <span id="fgh">  Domestic Tour Packages</span>
                   <input type="checkbox" name="type[]" value="2" <?php if(in_array(2,$exparraytype)){echo "checked";}?>> Weekend Packages
                  
                   <input type="checkbox" name="type[]" value="3" <?php if(in_array(4,$exparraytype)){echo "checked";}?>> Honeymoon Packages
                   <input type="checkbox" name="type[]" value="4" <?php if(in_array(5,$exparraytype)){echo "checked";}?>> Customise Packages

                  <br />
                  <p id="res"></p>
                  <?php echo form_error('location','<span class="error" style="color:red;">'); ?>
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
                <textarea name="description" id="description"  class="form-control ckeditor" data-validation="required" placeholder="description"><?= $trip[0]->description?></textarea>
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
                 <input type="hidden" name="img" value="<?= $trip[0]->image ?>" />
                <input type="file" class="form-control" name="imgname"  placeholder="Name">
                  <br />
                
                <a href="<?= base_url($trip[0]->image) ?>" target="_blank"><img src="<?= base_url($trip[0]->image) ?> " height="50" width="50"></a>
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
                  <a href="<?= base_url('admin/trip')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
                  <button type="submit" class="btn btn-success" name="save" id="smtt" > Submit <i class="icon-ok"></i></button>
                  
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<<script>
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

<script>
 $(document).ready(function(){
      var placetype = "<?php echo $trip[0]->place_type?>";
      if(placetype == 2)
      {
         $('#fgh').html('International Tour Packages'); 
      }
      if(placetype == 1)
      {
        $('#fgh').html('Domestic Tour Packages');   
      }
  $("#place_type").change(function(){
      var place_type=  $("#place_type").val();
      //alert(place_type);
      if(place_type == 2)
      {
         $('#fgh').html('International Tour Packages'); 
      }
      if(place_type == 1)
      {
        $('#fgh').html('Domestic Tour Packages');   
      }
      
      
  });
 })
</script>