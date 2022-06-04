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
        <div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i> Add Setting </span><img src="<?php echo  base_url();?>assets/breadcornor.png" style="top: -2px;position:relative;" /></h4></div>
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
        echo form_open('admin/setting/addsetting',$attributes); 
        ?>
        
          <div class="tab-content">
          <div class="tab-pane active" id="tab1">

              <div class="row">
            <div class="col-md-3">
              <label class="control-label">Email<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="email" id="" placeholder="Email" value="<?php echo set_value('email'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Contact1<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="contact" id="" placeholder="Contact" value="<?php echo set_value('contact'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Contact2<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="contact2" id="" placeholder="Contact" value="<?php echo set_value('contact2'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Instagram Url<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 <input type="text" class="form-control" name="instagram" id="" placeholder="Enter Instagram Url" value="<?php echo set_value('contact'); ?>" data-validation="required">
               
                  <br />
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Facebook Url<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="facebook" id="" placeholder="Enter Facebook Url" value="<?php echo set_value('facebook'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Twitter Url<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="twitter" id="" placeholder="Enter Twitter Url" value="<?php echo set_value('twitter'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Pinterest Url<font color="#FF0000">*</font> :</label>
              </div>
            <div class="col-md-9">
              <div class="controls">
                <input type="text" class="form-control" name="youtube" id="" placeholder="Enter Pinterest Url" value="<?php echo set_value('youtube'); ?>" data-validation="required">
               
                  <br />
              </div>
              </div>
           </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Linkedin Url<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="linkedin" id="" placeholder="Enter Linkedin Url" value="<?php echo set_value('linkedin'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            
         

           
        <div class="row">
            <div class="col-md-3">
              <label class="control-label">Logo<font color="#FF0000">*</font> :</label>
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
              <label class="control-label">Discount Image<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="file" class="form-control" name="imgnamee" id=""  data-validation="required" >
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Discount Percentage<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="discount_percantage" id="" placeholder="Discount Percentage" value="<?php echo set_value('discount_percantage'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
             <div class="row">
            <div class="col-md-3">
              <label class="control-label">Discount Price<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="discount_price" id="" placeholder="Discount Price" value="<?php echo set_value('discount_price'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Discount Text<font color="#FF0000">*</font> :</label>
              </div>
              <div class="col-md-9">
                <div class="controls">
                 
                <input type="text" class="form-control" name="discount_text" id="" placeholder="Discount Text" value="<?php echo set_value('discount_text'); ?>" data-validation="required">
               
                  <br />
                 
                 
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
              <label class="control-label">Footer Text<font color="#FF0000">*</font> :</label>
              </div>
            <div class="col-md-9">
              <div class="controls">
                <input type="text" class="form-control" name="ftext" id="" placeholder="Enter Footer Text" value="<?php echo set_value('ftext'); ?>" data-validation="required">
               
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





