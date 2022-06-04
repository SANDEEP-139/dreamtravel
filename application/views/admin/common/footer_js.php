 <!----- USING DATEPICKER JS ------>
 
<script src="<?php echo base_url('ckeditor/ckeditor.js')?>"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
   
  $( function() {
    $( ".datepicker" ).datepicker({ 
		dateFormat: 'dd-mm-yy',

		changeYear: true,
		changeMonth: true,
		yearRange: '1970:2021'
		// maxDate: '@maxDate',
		}).datepicker("setDate",'now');

  } );
    
  $(".alert").fadeIn('slow').animate({opacity: 2.0}, 1500).fadeOut('slow'); 

  </script>

<script>
  $( function() {
    $(".datepicker1").datepicker({ 
		dateFormat: 'dd-mm-yy',

		changeYear: true,
		changeMonth: true,
		yearRange: '1970:2021'
		// maxDate: '@maxDate',
		});

  } );
    
  $(".alert").fadeIn('slow').animate({opacity: 2.0}, 1500).fadeOut('slow'); 

  </script>


 <!--hide flash message-->
<script>








function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode != 46 && unicode > 31 &&unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}


 function onlyletter(e){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
   // });
}

$(".restrictSpace").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});


///////------- DELET RECORDS FOR AJAX FUNCTION COMMON FUNCTION ------/////////
function deleterow(table,fieldname,fieldvalue) {

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
			'url' 	: "<?=base_url('admin/common/del_single')?>",
			'type' 	: 'POST',
			'cache' : 'false',
			'async'	: 'isAsync',
			
			'data' 	: {
						csrf_name 	: csrf_name,
						table 		: table,
						fieldname 	: fieldname,
						fieldvalue 	: fieldvalue,
					},
			'beforeSend': function () {
							$('.loading').show();
						},
			'success' : function(res) {
			//alert(res); exit();
				if(res == "ok"){ 
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




  ///////------- CHANGE STATUS FOR COMMON FUNCTION ------/////////
function rowstatus(table,idfield,id,statusfield,status) {
	//alert('');exit();
	var confirmModal = 
	$('<div class="modal fade">' +        
          '<div class="modal-dialog" style="width:450px">' +
          '<div class="modal-content">' +
          '<div class="modal-header">' +
            '<a class="close" data-dismiss="modal" >&times;</a>' +
            '<h4>Status Confirmation</h4>' +
          '</div>' +

          '<div class="modal-body">' +
            //'<p>Hi do you want to Change '+ currstatus +' To status '+changestatus+'? </p>' +
			'<p>Are you sure you want to Change  status  ? </p>' +
          '</div>' +

          '<div class="modal-footer">' +
            '<button class="btn btn-danger btn-sm" data-dismiss="modal" style="width:70px;border-radius:40px;padding:6px 15px">No</button>' +
            '<button id="okButton" class="btn btn-success btn-sm" style="width:70px;border-radius:40px;padding:6px 15px">Yes </button>' +
          '</div>' +
          '</div>' +
          '</div>' +
        '</div>');
		
    confirmModal.find('#okButton').click(function(event) {
		 $.ajax({

        'url' : "<?php echo base_url('admin/common/change_status'); ?>",
        'type' : 'GET',
        'data' : {
            table 			: table,
            idfield 		: idfield,
            id 				: id,
            statusfield 	: statusfield,
            status 			: status,
        },
        'success' : function(res) {
        //	alert(res);
		if(res == "ok"){ location.reload(); }
		else { alert('Error');  }
		
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
	
<!----- MULTI DELETE OPTION SCRIPT-------->


<script>
 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
				 if($(".chkclass")){ $(".del_button").show(); }
             }
         }
     } else {
             for(var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
				 $(".del_button").hide(); 
              }
             }
           }
 }	
	
function daleteall(tab,fieldname,refloc){ 
	//alert(tab+" "+refloc);
	if ($('.chkclass:checked').length) {
          var chkId = '';
          $('.chkclass:checked').each(function () {
            chkId += $(this).val() + ",";
          });
          chkId = chkId.slice(0, -1);
		  ///alert(chkId);
		    if (confirm("Are you sure want to delete selected records ?")) {
                confirm_value.value = "Yes";

				$.ajax({
					'url' : "<?php echo base_url('admin/common/del_multi'); ?>",
					'type' : 'POST',
					'async': 'isAsync',
					'data' : {
						tab 		: tab,
						fieldname 	: fieldname,
						fieldvalue 	: chkId,
						refloc	 	: refloc,
					},
					'success' : function(res) {
					//alert(res);
					//if(res == "ok"){ location.reload(); }
					//else { alert('Error');  }
					},
					'error' : function(request,error)
					{
						alert("Request: "+JSON.stringify(request));
					}
				});
			} else { confirm_value.value = "No"; }
			
			
			
        }
        else {
          alert('Please select atleast one ');
        }
	}
</script>
	  
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
   // modules : 'location, date, security, file,toggleDisabled',
	//disabledFormFilter : 'form.toggle-disabled',
	showErrorDialogs : false,
    onModulesLoaded : function() {
    $('.country').suggestCountry();
    $('.state').suggestState();
    }
  });
  

</script>
<script>

////======	LOAD CONTOLLER VIA IN MODEL
function loadmodelbox(location,respid,data)
	{
		if(location != ""){
			
			$('#myModal').modal('show');
	
		$.ajax({
			url : location,
			type: "POST",
			data :'&data='+data,
			success: function(res)
			{ 
					
				///alert(res); exit();
				$("."+respid).html(res);
			},
			error: function ( request, errorThrown)
			{ alert("Please reload now");  }
		});
		}
	}
$(document).ready(function() {
		$("#myModal").modal({
			show: false,
			backdrop: 'static'
		});
		
	});
	
	
$("form").attr('autocomplete', 'off');
	
</script>

<script>
	$('form').submit(function (event) {
	if ($(this).hasClass('submitted')) {
		event.preventDefault();
		//return false;
	}
	else {
		$('.btn').removeClass('btn-info');
		$('.btn').addClass('btn-success');
		$(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i> Please wait..');
		$(this).addClass('submitted');
	}
});
</script>
