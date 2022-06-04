<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style>
  .ui-sortable-placeholder { 
      border: 1px dashed black!important; 
        visibility: visible !important;
        background: #eeeeee78 !important;
       }
    .ui-sortable-placeholder * { visibility: hidden; }
        .RearangeBox.dragElemThumbnail{opacity:0.6;}
        .RearangeBox {
            width: 180px;
            height:240px;
            padding:10px 5px;
            cursor: all-scroll;
            float: left;
            border: 1px solid #9E9E9E;
            font-family: sans-serif;
            display: inline-block;            
            margin: 5px!important;
            text-align: center;
            color: #673ab7;
            background: #ffc107;
          /*color: rgb(34, 34, 34);
            background: #f3f2f1;     */
        }
.IMGthumbnail{
    max-width:168px;
    height:100px;
    margin:auto;
  background-color: #ececec;
  padding:2px;
  border:none;
}

.IMGthumbnail img{
   max-width:100%;
max-height:100%;
}

.imgThumbContainer{

  margin:4px;
  border: solid;
  display: inline-block;

  justify-content: center;
    position: relative;
    border: 1px solid rgba(0,0,0,0.14);
  -webkit-box-shadow: 0 0 4px 0 rgba(0,0,0,0.2);
    box-shadow: 0 0 4px 0 rgba(0,0,0,.2);
}



.imgThumbContainer > .imgName{
  text-align:center;
  padding: 2px 6px;
  margin-top:4px;
  font-size:13px;
  height: 15px;
  overflow: hidden;
}

.imgThumbContainer > .imgRemoveBtn{
    position: absolute;
    color: #e91e63ba;
    right: 2px;
    top: 2px;
    cursor: pointer;
    display: none;
}

.RearangeBox:hover > .imgRemoveBtn{ 
    display: block;
}
</style>
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Package </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/project/editproject',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-10">
          
          
          <div class="tab-pane active" id="tab1">
        
              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Package Title<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="cat_id" value="<?= $category[0]->id?>">
                <input type="text" class="form-control" name="name" placeholder="Package Title" value="<?php echo $category[0]->package_name; ?>" data-validation="required" >
                  <br />
             
                  <?php echo form_error('name','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
                 
          
           
             <br />
           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Duration <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="duration"  placeholder="Duration" value="<?= $category[0]->duration?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('duration','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
          <br>  
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Location <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="location"  placeholder="Location" value="<?= $category[0]->location?>" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('location','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Price <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="price"  placeholder="Enter Price" value="<?= $category[0]->price?>" onkeypress="return numbersonly(event)" data-validation="required">
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('price','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
            <br>
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

            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Long Description<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                <textarea name="ldescription" id="description"  class="form-control ckeditor" data-validation="required" placeholder="description"><?= $category[0]->long_description?></textarea>
                  <br />
                <?php echo form_error('ldescription','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
             
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Featured Image <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="imgg" value="<?= $category[0]->image ?>" />
                <input type="file" class="form-control" name="imgnamee"  placeholder="Name">
                  <br />
                
                <a href="<?= base_url($category[0]->image) ?>" target="_blank"><img src="<?= base_url($category[0]->image) ?> " height="50" width="50"></a>
                  <p id="res"></p>
                  <?php echo form_error('imgnamee','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>
         
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Optional Image(More) <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="file" class="form-control" id="files"  name="imgname[]"  placeholder="Name" value="<?php echo set_value('imgname'); ?>" data-validation="required" multiple>
                  <br />
                  <p id="res"></p>
                  <?php echo form_error('imgname','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
               
            </div> 
             <div class="row">
             <div class="col-md-12" id="sortableImgThumbnailPreview">
          
            </div></div>
            <div>&nbsp;</div>
                      
           
           

            <div class="row">
            <div class="col-md-3">
              <label class="control-label">&nbsp;</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                  <a href="<?= base_url('admin/project')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script type="text/javascript">
  
 $(function() {
            $("#sortableImgThumbnailPreview").sortable({
             connectWith: ".RearangeBox",
            
                
              start: function( event, ui ) { 
                   $(ui.item).addClass("dragElemThumbnail");
                   ui.placeholder.height(ui.item.height());
           
               },
                stop:function( event, ui ) { 
                   $(ui.item).removeClass("dragElemThumbnail");
               }
            });
            $("#sortableImgThumbnailPreview").disableSelection();
        });




document.getElementById('files').addEventListener('change', handleFileSelect, false);

  function handleFileSelect(evt) {
    
    var files = evt.target.files; 
    var output = document.getElementById("sortableImgThumbnailPreview");
    
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
           var imgThumbnailElem = "<div class='RearangeBox imgThumbContainer' style='position: relative;left: 0px;top: 0px;height: 120px;'><i class='material-icons imgRemoveBtn' onclick='removeThumbnailIMG(this)'>cancel</i><div class='IMGthumbnail' ><img  src='" + e.target.result + "'" + "title='"+ theFile.name + "' height='100px;'/></div><div class='imgName'>"+ theFile.name +"</div></div>";
                    
                    output.innerHTML = output.innerHTML + imgThumbnailElem; 
          
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  function removeThumbnailIMG(elm){
    elm.parentNode.outerHTML='';
  }


</script>





