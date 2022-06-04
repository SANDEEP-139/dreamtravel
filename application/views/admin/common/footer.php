

<div id="errordiv"></div>
<div id="successdiv"></div>
<footer class="main-footer">

    <div class="pull-right hidden-xs">
       <b>Powered By </b><a href="" target="_blank">Weblieu Technology</a>
    </div>
    <strong>@2021.</strong>
  All rights reserved.
</footer>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<!--New JS-->
<script src="<?=base_url('assets/new/dist/js/app.min.js')?>"></script>

<script src="<?=base_url('assets/new/plugins/fastclick/fastclick.min.js')?>"></script>
<script src="<?=base_url('assets/new/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<script src="<?=base_url('assets/new/dist/js/demo.js')?>"></script>
<script src="<?=base_url('assets/new/dist/js/common.js')?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>
  $.validate({
    form : '#myForm',
    validateHiddenInputs : true,
    onSuccess : function($form) {
      
      $('#smt').hide();
      $('#buttonreplacement').show(); 
    }
   
  });
</script>

<script type="text/javascript">
	$(window).load(function() {
		$(".loading").fadeOut("slow");
	});
	window.setTimeout(function() {
	  $(".msg").fadeTo(500, 0).slideUp(500, function(){
		  $(this).remove();
	  });
	}, 10000);
</script>
<script type="text/javascript"> 
 $('.enterSearch').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
          searchFilter(); 
      }
  });
</script>

<style type="text/css">
	li.ui-menu-item { font-size:12px !important; }
</style> 
<script type="text/javascript">
    function pagelimit(type)
    {
    //alert(type);
    var limit = document.getElementById("limit").value;
    window.location=type+"&limit="+limit;
    }
</script>
<script>
  
  $(document).ready(function(){
    $('input.timepicker').timepicker({});
});
</script>
 
<script>
function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
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
$(document).ready(function(){
    $(':input').on('focus',function(){
        $(this).attr('autocomplete', 'off');
    });
})
</script>

  
  <?php $this->load->view("admin/common/footer_js"); ?>

</body>
<!-- END BODY -->
</html>