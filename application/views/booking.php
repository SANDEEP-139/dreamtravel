<!--DASHBOARD-->
    <section>
        <div class="tr-register">
            <div class="tr-regi-form v2-search-form">
                <h4>Booking by <span>Email</span></h4>
                <p>It's free and always will be.</p>
             
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Thank you for arranging a wonderful trip for us! Our team will contact you shortly!
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                  <label>Enter your Name</label>
                                    <input type="text" id="name"  class="validate" name="name" required>
                                  
                                </div>
                                <div class="input-field col s6">
                                    <label>Enter your phone</label>
                                    <input type="text"  maxlength="10" id="phone"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="validate" name="phone" required>
                                    
                                </div>
                                 <div class="input-field col s6">
                                    <input type="email" id="email"  class="validate" name="email" required>
                                    <label>Enter your email</label>
                                </div>
                                 <div class="input-field col s6">
                                    <input type="date" id="ddate" placeholder="Departure Date"  name="ddate" required>
                                    
                                </div>
                             <div class="input-field col s6">
                                    <select name="noofadults" id="noofadults">
                                        <option value="">No of adults</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                       
                                </div>
                                <div class="input-field col s6">
                                    <select name="noofchildrens" id="noofchildrens">
                                        <option value="" >No of childrens</option>
                                          <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>                                            
                                    </select>
                                </div>

                            </div>
                            
                            
                            <div class="row">
                                <div class="input-field col s12">
                                     <label>Address</label>
                                    <textarea class="validate" id="address"></textarea>
                                   
                                </div>
                                
                                
                            </div>
                           
                                                     
                            <div class="row">
                                <div class="input-field col s12">
                                         <a href="javascript:void(0)"><button type="button" style="width:100%;" class="waves-effect waves-light tourz-sear-btn v2-ser-btn buy_now" data-amount="<?php echo $all_package[0]->discount_price ?>" data-id="<?php echo $all_package[0]->id ?>" >Book Now</button></a>
                                    <!--<input type="submit" value="Book Now" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">-->
                                </div>
                            </div>
                    
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var SITEURL = "<?php echo base_url() ?>";
$('body').on('click', '.buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
var product_id =  $(this).attr("data-id");
var name= $("#name").val();
var email = $("#email").val();
var phone = $("#phone").val();
var address = $("#address").val();
var noofadults = $('#noofadults option:selected').val();
var ddate = $("#ddate").val();

var noofchildrens =  $('#noofchildrens option:selected').val();
if(name == '')
{
    alert('Please enter name');
    return false;
}
else if(email == '')
{
    alert('Please enter email');
}
else if(phone == '')
{
    alert('Please enter mobile number');
}
else if(address == '')
{
    alert('Please enter address ');
}
else if(ddate == '')
{
    alert('Please enter daparture date.');
}
else if(noofadults == '')
{
    alert('Please enter number of adult');
}

else if(noofchildrens == '')
{
    alert('Please enter number of childrens');
}
else {
var options = {
"key": "rzp_live_QwQvun7Jt0X1aL",
"amount": (totalAmount*100), // 2000 paise = INR 20
"name": "Dream my Trip",
prefill: {
      email: "shuklashashank721@gmail.com",
      contact: "8860855563",
    },
    
"description": "Payment",
"image": "https://dreammytriptourism.com/front/images/dream_my_trip.png",
"handler": function (response){
$.ajax({
   
url: "<?php echo base_url('payment/successform')?>",
type: 'post',
data: {
razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,razorpay_order_id:response.order_id,razorpay_signature:response.signature,name:name,email:email,phone:phone,address:address,ddate:ddate,noofadults:noofadults,noofchildrens:noofchildrens,razorpay_status:response.status,
}, 
success: function (msg) {
      //alert(msg);
     // return false;
          if(msg == 'success'){
window.location.href = "<?php echo base_url('home')?>";
}
else
{
  window.location.href = "<?php echo base_url('home')?>";  
}
}
});
},
"theme": {
"color": "#528FF0"
}
};
}
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
</script>
    <!--END DASHBOARD-->
