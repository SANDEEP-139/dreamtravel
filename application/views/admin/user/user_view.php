<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  
   <!-- BEGIN PAGE CONTAINER-->
   <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->
      <!-- END PAGE HEADER-->
      <!-- BEGIN ADVANCED TABLE widget-->
      
      <div class="row-fluid box breadtop">
      <div class="span12">
        <!-- BEGIN EXAMPLE TABLE widget-->
         
         <div class="row"> 
        <div class="col-md-3"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  MANAGE USER </span><img src="<?=base_url('assets/breadcornor.png')?>" style="top: -2px;position:relative;" /></h4></div>
        <div class="col-md-6">
     
			 <div class="col-md-4">
			 	
			  <input type="text"  class="form-control enterSearch" id="keywords" placeholder="Search"   value="<?php echo $this->input->get('keywords');?>"/>
			  </div>
        <div class="col-md-4">
        
        <input type="text"  class="form-control datepicker1" id="datefrom" placeholder="Date From"   value="<?php echo $this->input->get('datefrom');?>"/>
        </div>

          <div class="col-md-4">
        
        <input type="text"  class="form-control datepicker1" id="dateto" placeholder="Date To"   value="<?php echo $this->input->get('dateto');?>"/>
        </div>
				
			
		</div>
     <!--
         <div class="col-md-2">
     
      <div style="text-align: right;"><a href="<?= base_url('admin/user/add')?>" class="btn bg-maroon btn-flat margin"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;ADD USER</a></div>
       
     </div>
     -->  
       
        </div>
        <div class="row">
          
          <div class="col-md-3"></div>
      <div class="col-md-9">
       <div class="col-md-3">
        <button id="btnSearch"  class="btn btn search" onclick="searchFilter()"><i class="icon-search"></i>Search</button><a href="<?php echo base_url('admin/user');?>" class="btn"><i class="fa fa-refresh" aria-hidden="true"></i></a>
       </div>
      
    
      
      </div>
        </div>
       
        <br>
        <div class="widget">

          <div class="msg" id="msg"><?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');}?></div>
		        <!--  <form action="<?php //echo base_url('admin/user/test')?>">    -->
            
        <div class="widget-body">
						
						<div id="divAZ" runat="server" style="overflow-x:scroll;">
            
                <table class="table table-striped table-bordered" >
                            <thead>
                                <tr class="thcolor">
                                  
                                  <th>S.No</th>
                                  <th>Name</th>
								  <th>Event Name</th>
								   <th>Email ID</th>
                                   <th>Phone</th>
								   <th>Country</th>
								   <th>City</th>
                                 
                                  <th>Created Date</th>
                                  <th>Status</th>
								                 <th>Action</th>     
                                </tr>
                            </thead>

                            <tbody id="postList">                        
                              
                             <?php $this->load->view('admin/user/user_in'); ?>
                            </tbody>
                          </table>  
                                         
                        <div class="loading" ><div class="content"><img src="<?php echo base_url('assets/images/loading.gif'); ?>"/></div></div>

						</div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>

    </div>
    
<script>
	function searchFilter(page_num,cur_page) {
	  page_num       = page_num?page_num:0;
	  activePage     = cur_page?cur_page:0;
	  var keywords   = $('#keywords').val();
    $("#keysearch").val(keywords);
    var type       = $('#type').val();
    var datefrom   = $('#datefrom').val();
    $("#frommm").val(datefrom);
    var dateto     = $('#dateto').val(); 
    $("#tooooo").val(dateto);
	
	  var limit    = $('#limit').val();
	  var dataVar = 'page='+page_num+'&activePage='+activePage+'&keywords='+keywords+'&datefrom='+datefrom+'&dateto='+dateto+'&perpage='+limit;
	  $.ajax({
		type: 'GET',
		url: '<?=base_url('admin/user/ajaxPaginationData')?>/'+page_num,
		data:csrf_name+'='+hash+'&'+dataVar,
		beforeSend: function () {
		  $('.loading').show();
		},
		success: function (html) {
		  $('#postList').html(html);
			window.history.pushState("object or string", "Title", "<?=base_url('admin/user?')?>"+dataVar);
		  $('.loading').fadeOut("slow");
		}
	  });
	}

</script>

<script>
    $(document).ready(function() {
        $("button").click(function(){
            var favorite = [];
            $.each($("input[name='sport']:checked"), function(){            
                favorite.push($(this).val());
            });
            alert(favorite.join(", "));
        });
    });
</script>

