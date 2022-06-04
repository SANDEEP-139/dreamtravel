
<div class="content-wrapper">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   

<div class="row">
  <br>
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  <?php //echo $title?> Edit Blog </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/blog/editblog',$attributes); 
        ?>
        
        
        
        
          <div class="tab-content">
          <div class="row">
          <div class="col-md-10">
          
          
          <div class="tab-pane active" id="tab1">
           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Blog Title<font color="#FF0000">*</font> :</label>
            </div>
          <div class="col-md-9">
            <div class="controls">
              <input type="hidden" name="event_id" value="<?= $blog[0]->id?>">
              <input type="text" class="form-control" name="blog_title" id="cat" placeholder="Blog Title" value="<?php echo $blog[0]->blog_title;?>" data-validation="required" onkeypress="return onlyletter(event)">
              <br />
            </div>
          </div> 
          </div>
        
             <div class="row">
            <div class="col-md-3">
              <label class="control-label"> Image <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="hidden" name="img" value="<?= $blog[0]->image ?>" />
                <input type="file" class="form-control" name="image"  placeholder="Name">
                  <br />
                
                <a href="<?= base_url($blog[0]->image) ?>" target="_blank"><img src="<?= base_url($blog[0]->image) ?> " height="50" width="50"></a>
                  <p id="res"></p>
                  <?php echo form_error('imgname','<span class="error" style="color:red;">'); ?>
                </div>
                </div>
            </div>

          
            <br>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Blog Date<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                  <input type="text" name="blog_date" placeholder="Blog Date" class="form-control datepicker1" value="<?php echo date('d-m-Y',strtotime($blog[0]->blog_date))?>" data-validation="required">
                </div>
                </div>
                
            </div>
            <br>
              
          <div class="row">
            <div class="col-md-3">
              <label class="control-label">Description <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <textarea name="description" id="description" class="form-control ckeditor" placeholder="Description Here.." data-validation ="required"><?php echo $blog[0]->description;?></textarea>
               <br/>
               
                </div>
             
            </div>
          </div>
           <div class="row">
            <div class="col-md-3">
              <label class="control-label">Long Description <font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <textarea name="ldescription" id="ldescription" class="form-control ckeditor" placeholder="Long Description Here.." data-validation ="required"><?php echo $blog[0]->ldescription;?></textarea>
               <br/>
               
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
                  <a href="<?= base_url('admin/blog')?>" class="btn btn-default"><i class="icon-angle-left"></i> Back </a>
                  
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


<script>
  function subcat()
  {
    var cat = $("#cattes").val();

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
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
  var cat_id= '<?php echo $event[0]->category_id;?>';
  var subcat_id = '<?php echo $event[0]->subcategory_id;?>';
  
window.onload=my_code(cat_id,subcat_id);
function my_code(cat_id,subcat_id){
  $.ajax({
       'type' :'POST',
       'url'  :"<?php echo base_url('admin/banner/getSubcategory')?>",
       'data' :'cat='+cat_id+'&subcat='+subcat_id,
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




