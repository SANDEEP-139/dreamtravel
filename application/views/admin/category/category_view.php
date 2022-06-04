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
        <div class="col-md-3"><h4><span class="breadcornor"><i class="fa fa-users" aria-hidden="true"></i>  MANAGE TRIP CATEGORY </span><img src="<?=base_url('assets/breadcornor.png')?>" style="top: -2px;position:relative;" /></h4></div>
        <div class="col-md-6">
     
   

          
			
			 <div class="col-md-7">
			 	
			  <input type="text"  class="form-control enterSearch" id="keywords" placeholder="Search"   value="<?php echo $this->input->get('keywords');?>"/>
			  </div>
				
			<div class="col-md-4">
			  <button id="btnSearch"  class="btn btn search" onclick="searchFilter()"><i class="icon-search"></i> Search</button><a href="<?php echo base_url('admin/category');?>" class="btn "><i class="fa fa-refresh" aria-hidden="true"></i></a>
			</div>
		</div>
     <div class="col-md-2">
      
    
      <div style="text-align: right;"><a href="<?= base_url('admin/category/add')?>" class="btn bg-maroon btn-flat margin"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;ADD CATEGORY</a></div>
     
     </div>
        
        
       
       
        </div>
        <br>
        <div class="widget">

          <div class="msg" id="msg"><?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');}?></div>
		

        <div class="widget-body">
						
						<div id="divAZ" runat="server" style="overflow-x:scroll;">

                <table class="table table-striped table-bordered" >
                            <thead>
                                <tr class="thcolor">
                                  <th>S.No</th>
                                  <th>Category Title</th>
                                  
                                  <th>Image</th> 
                                 <!--  <th>Price</th> 
                                  <th>Unit Name</th>   -->
                                  <th>Status</th>
                                  <th>Created Date</th>   
								                  <th>Action</th>     
                                </tr>
                            </thead>

                            <tbody id="postList">                        
                              
                             <?php $this->load->view('admin/category/category_in'); ?>
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
    
<div id="formmodel" class="modal"></div>
<script>
	function searchFilter(page_num,cur_page) {
	  page_num       = page_num?page_num:0;
	  activePage     = cur_page?cur_page:0;
	  var keywords   = $('#keywords').val();
	  //var type       = $('#type').val();
	  
	  var limit    = $('#limit').val();
    
	  var dataVar = 'page='+page_num+'&activePage='+activePage+'&keywords='+keywords+'&perpage='+limit;
	  $.ajax({
		type: 'GET',
		url: '<?=base_url('admin/category/ajaxPaginationData')?>/'+page_num,
		data:csrf_name+'='+hash+'&'+dataVar,
		beforeSend: function () {
		  $('.loading').show();
		},
		success: function (html) {
		  $('#postList').html(html);
			window.history.pushState("object or string", "Title", "<?=base_url('admin/category?')?>"+dataVar);
		  $('.loading').fadeOut("slow");
		}
	  });
	}

</script>

<script>
  function changeStatus(id,status)
  {
	$.ajax({
		type: 'POST',
		cache: false,
		url: '<?= base_url("admin/expert/changestatus")?>',
		data:'id='+id+'&status='+status,            
		success: function (result) {  
			if(result==1){
				alert("Status Change Successfully");
				location.reload();
			}else{
				alert("Process Failed,Please Try Again Later.");
			}
		}
	});
  }
</script>
<script>
    function deleterowAll(table,fieldname,fieldvalue) {
    //alert(fieldvalue);exit();
  var confirmModal = 
  $('<div class="modal fade">' +        
          '<div class="modal-dialog" style="width:450px">' +
          '<div class="modal-content">' +
          '<div class="modal-header">' +
            '<a class="close" data-dismiss="modal" >&times;</a>' +
            '<h4>Delete Confirmation</h4>' +
          '</div>' +

          '<div class="modal-body">' +
            '<p>Are you sure want to delete this records  ? </p>' +
          '</div>' +

          '<div class="modal-footer">' +
            '<button class="btn btn-danger btn-sm" data-dismiss="modal" style="width:70px;border-radius:40px;padding:6px 15px">CANCEL</button>' +
            '<button id="okButton" class="btn btn-success btn-sm" style="width:70px;border-radius:40px;padding:6px 13px">CONFIRM </button>' +
          '</div>' +
          '</div>' +
          '</div>' +
        '</div>');
    confirmModal.find('#okButton').click(function(event) {
     $.ajax({
      'url'   : "<?=base_url('admin/category/deleteAll')?>",
      'type'  : 'POST',
      'cache' : 'false',
      'async' : 'isAsync',
      
      'data'  : {
            csrf_name   : csrf_name,
            table     : table,
            fieldname   : fieldname,
            fieldvalue  : fieldvalue,
          },
      'beforeSend': function () {
              $('.loading').show();
            },
      'success' : function(res) {
    //  alert(res); exit();
        if(res == 1){ 
          $("#"+fieldvalue+"").remove();
        }
        else { location.reload(); }
        $('.loading').fadeOut("slow");
        location.reload();
      },
      'error' : function(request,error)
      {
        alert("Request: "+JSON.stringify(request));
      }
    });
      confirmModal.modal('hide');
    }); 

    confirmModal.modal('show');    
};
  </script>