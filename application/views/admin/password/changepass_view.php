<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
#oldpwd { border:1px solid #ccc; padding:5px; min-width:60%; }
#newpwd { border:1px solid #ccc; padding:5px; min-width:60%; }
#conpwd { border:1px solid #ccc; padding:5px; min-width:60%; }
</style>
<div class="content-wrapper">
    <!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
    	<!-- BEGIN PAGE HEADER-->
		 <?php /*?><div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->							    			
				 <h3 class="page-title">&nbsp;</h3>
				  <!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div><?php */?>
		<br>
       <div class="row">
<div class="col-md-6"><h4><span class="breadcornor"><i class="fa fa-key" aria-hidden="true"></i>  Change Password </span><img src="<?=base_url('assets/breadcornor.png')?>" style="top: -2px;position:relative;" /></h4></div>
<div class="col-md-6" style="text-align:right;">
&nbsp;
</div>

</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
				
		<div class="row" style="padding:10px;">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-6 box2">
         
			<div class="widget">

			   <!--<div class="widget-title">
				<h4><i class="icon-reorder"></i>Change Password</h4>
				<span class="tools">
				<a href="javascript:;" class="icon-chevron-down"></a>
				<a href="javascript:;" class="icon-remove"></a>
				</span>
			  </div>-->
			 <div class="widget-body">
			 <div class="row">
			  <div class="col-md-12">
			   <div class="widget-body">
				<table width="100%" align="center" border="0" cellpadding="0" cellspacing="1" class="brd">
                 <tr>
				 <td>
				 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#E91E63;">
					<tr height="30">
					  <td width="6" align="left" valign="top">&nbsp;</td>
						<td align="left" valign="middle">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							 <tr><td width="963" align="center" valign="middle" class="text6" style="font-weight:bold; color: #fff;"><MARQUEE scrollamount="2">Change Password!!! </MARQUEE></td>			
							 </tr>
							</table>
					    </td>
					<td width="6" align="left" valign="top">&nbsp;</td>
					</tr>
				 </table></td>
				</tr>
			  <tr bgcolor="#FFFFFF"><td height="10" colspan="2"></td></tr>
			  <tr bgcolor="#FFFFFF" align="left" class="newtext"><td height="10" colspan="2"><img src="<?php echo base_url();?>assets/images/rating.jpg">&nbsp;Please enter your old password.</td></tr>
			  <tr bgcolor="#FFFFFF"><td></td><td height="10"></td></tr>
			  <tr bgcolor="#FFFFFF" align="left" class="newtext"><td height="10" colspan="2"><img src="<?php echo base_url();?>assets/images/rating.jpg">&nbsp;Specify and confirm the new password.</td></tr>
			   <tr bgcolor="#FFFFFF"><td></td><td height="10"></td></tr>
	
  
               <tr>
               <td colspan="2">
			    <?php 
				 $attributes = array('class' => 'form-horizontal', 'id' => 'myForm' );
                 echo form_open('admin/admin/changepass',$attributes); 
			    ?>
              
               <table width="100%" align="center" cellpadding="0" cellspacing="0">
			   <div class="msg">
			    <?php if($this->session->flashdata('msg')){ ?>
				
                           <tr><td  height="1"></td></tr>
							<tr bgcolor="#FFFFFF">
								<td align="center" colspan="2">
									<table align="center" width="318" cellpadding="0" cellspacing="0" class="mainbrd4">
										<tr>
											<td height="25" width="387" align="center"  style="color:#009900"><img src="<?php echo base_url();?>assets/images/success.gif" width="16"  height="16" border="0" />&nbsp;&nbsp;&nbsp;<?php echo $this->session->flashdata('msg');?></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr bgcolor="#FFFFFF"><td height="10" colspan="2"></td></tr>
							<?php } elseif($this->session->flashdata('msg')){ ?>
							
							<tr bgcolor="#FFFFFF">
								<td align="center" colspan="2">
									<table align="center" width="420" cellpadding="0" cellspacing="0" class="mainbrd3">
										<tr>
											<td height="25" width="387" align="center" style="color:#FF0000"><img src="<?php echo base_url();?>assets/images/error.png" width="16" height="16" border="0" />&nbsp;&nbsp;&nbsp; <?php echo $this->session->flashdata('errormsg');?></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr bgcolor="#FFFFFF"><td height="10" colspan="2"></td></tr>
                            <?php } ?>
							</div>
                            <tr  bgcolor="#F6F6F6">
                              <td width="398" align="right" class="newtext" height="35" valign="middle">Old Password :<font color="red">&nbsp;* </font>&nbsp;</td>
                              <td width="570" align="left">
							  <?php 
								$data = array(
												'type'            => 'password',
												'name'            => 'oldpwd',
											    'id'              => 'oldpwd',
											    'data-validation' => 'required',
												'placeholder'     => 'Password'  
											   );
								echo form_input($data,set_value('oldpwd'));
								//echo form_error('oldpwd', '<p style="color:red;">', '</p>');
							  ?>
                                  <font class="smallred" style="margin-left:50px;">
                                  <div id="oldpwd_chk"></div>
                                  </font></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                              <td></td>
                              <td height="10"></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                              <td width="398" align="right" class="newtext">New Password :<font color="red">&nbsp;* </font>&nbsp;</td>
                              <td width="570" align="left">
							   <?php 
								$data = array(
												'type'            => 'password',
												'name'            => 'newpwd',
												'id'              => 'newpwd',
												'data-validation' => 'required',
												'placeholder'     => 'New Password'  
											   );
								echo form_input($data,set_value('newpwd'));
								//echo form_error('newpwd', '<p style="color:red;">', '</p>');
							  ?>
							  <font class="smallred" style="margin-left:50px;">
                                  <div id="newpwd_chk"></div>
                                  </font></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                              <td width="398" align="right" class="newtext"></td>
                             <!--  <td width="570" align="left" class="newtext">Password must be more then six characters.</td> -->
                            </tr>
                            <tr bgcolor="#FFFFFF">
                              <td height="10" colspan="2"></td>
                            </tr>
                            <tr  bgcolor="#F6F6F6">
                              <td width="398" align="right" height="35" valign="middle" class="newtext">New Password Again :<font color="red">&nbsp;* </font>&nbsp;</td>
                              <td width="570" align="left">
							   <?php 
								$data = array(
												'type' => 'password',
												'name' => 'conpwd',
												'id'   => 'conpwd',
											    'data-validation' => 'required',
												'placeholder' => 'Confirm Password'  
											   );
								echo form_input($data,set_value('conpwd'));
								// echo form_error('conpwd', '<p style="color:red;">', '</p>');
							  ?>
                                  <font class="smallred" style="margin-left:50px;">
                                  <div id="conpwd_chk"></div>
                                  </font></td>
                            </tr>
                            <tr bgcolor="#FFFFFF">
                              <td height="10" colspan="2"></td>
                            </tr>
                            <tr bgcolor="#FFFFFF"><input type="hidden" value="" name="uid">
                              <td colspan="2" align="center" height="35" valign="middle"><input name="submit2" type="submit" class="new_button" style="background:#E91E63; padding:5px 15px; color:#fff; border:none;" value="UPDATE PASSWORD " />
                              </td>
                            </tr>
                            <tr>
                              <td height="20" colspan="2"></td>
                            </tr>
                          </table>
                      </form></td>
                    </tr>
           </table>
                                  
				</div>
			</div>
		</div>
							
							
			</div>
		  </div>
		</div>
		   
	   </div>
	 
	</div>
	<!-- END PAGE CONTENT-->
</div>
</div>

