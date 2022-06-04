    <section class="footer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="footer-link">
                        <h4>OUR PRODUCTS</h4>
                        
                        <ul class="two-columns">
                                       <?php if(!empty($product)) {
                                          foreach($product as $values){
                                              if($values->title =='Customize Cab'){
                                         ?>
                                        <li> <a href="" data-toggle="modal" data-target="#exampleModal8"><?php echo $values->title;?></a> </li> 
                                         <?php }
                                           else {
                                           ?>
                                            <li> <a href="<?php echo base_url();?>"><?php echo $values->title;?></a> </li> 
                                         <?php   
                                           }
                                         }}?>
                                        <li> <a href="<?php echo base_url();?>">Dream Tour & Trips</a> </li>
                                        <li> <a href="<?php echo base_url();?>">Honeymoon Packages </a> </li>
                                        <li> <a href="<?php echo base_url();?>">International Hotels</a> </li>
                                    </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-link">
                        <h4>ABOUT THE SITE</h4>
                     <ul class="two-columns">
                          <li> <a href="<?php echo base_url('contact-us')?>"><?php echo ucfirst($contactus[0]->title) ?></a> </li>
                        <li> <a href="<?php echo base_url('about-us')?>"><?php echo ucfirst($aboutus[0]->title) ?></a> </li>
                        <li> <a href="<?php echo base_url('payment-security')?>"><?php echo ucfirst($paymentsecurity[0]->title) ?></a> </li>
                        <li> <a href="<?php echo base_url('privacy-policy')?>"><?php echo ucfirst($privacy[0]->title) ?> </a> </li>
                        <li> <a href="<?php echo base_url('user-agreement')?>"><?php echo ucfirst($useragreement[0]->title) ?></a> </li>
                        <li> <a href="<?php echo base_url('terms-conditions')?>"><?php echo ucfirst($terms[0]->title) ?></a> </li>
                        <li> <a href="<?php echo base_url('feedback')?>"><?php echo ucfirst($feedback[0]->title) ?> </a> </li>
                        <li> <a href="<?php echo base_url('disclaimer')?>"><?php echo ucfirst($disclaimer[0]->title) ?></a></li>
                         <li> <a href="<?php echo base_url('blogs')?>">Blog</a></li>
                     </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-link">
                        <h4>PARTNER WITH DREAMMYTRIP</h4>
                        <ul class="two-columns">
                                        <li> <a href="#" data-toggle="modal" data-target="#exampleModal11">Travel Agent Registration</a> </li>
                                        <li> <a href="" data-toggle="modal" data-target="#exampleModal9">Register Your Hotel</a> </li>
                                        <li> <a href="#" data-toggle="modal" data-target="#exampleModal10">Register Your Cab</a> </li>
                                    </ul>
                    </div>
                </div>
                
<div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;">Travel Agent Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('home/agentregister')?>">
     
   <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">First Name</label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" required>
    </div>
    <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">Last Name</label>
      <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4" style="font-size:18px;">Contact Number</label>
      <input type="text" class="form-control" name="phone" onkeypress="return numbersonly(event)" placeholder="Contact Number" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="font-size:18px;">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputLocation" style="font-size:18px;">Travel Agent Name</label>
      <input type="text" class="form-control" name="agentName" placeholder="Travel Agent Name" required>
    </div>
     <div class="form-group col-md-6">
        <label for="inputDrop-off" style="font-size:18px;">City / Location</label>
      <input type="text" class="form-control" name="city" placeholder="City/Location" required>
    </div>
    
    
  </div>
 

 
  <button type="submit" class="btn btn-primary" style="cursor:pointer;">Send Enquiry</button>
</form>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;">Cab Register Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('home/registercab')?>">
        
   <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">First Name</label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" required>
    </div>
    <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">Last Name</label>
      <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4" style="font-size:18px;">Contact Number</label>
      <input type="text" class="form-control" name="phone" onkeypress="return numbersonly(event)" placeholder="Contact Number" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="font-size:18px;">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputLocation" style="font-size:18px;">Cab Name</label>
      <input type="text" class="form-control" name="cabname" placeholder="Cab Name" required>
    </div>
     <div class="form-group col-md-6">
        <label for="inputDrop-off" style="font-size:18px;">Vehicle Number</label>
      <input type="text" class="form-control" name="vehiclenumber" placeholder="Vehicle Number" required>
    </div>
    <div class="form-group col-md-12">
        <label for="inputDrop-off" style="font-size:18px;">Location</label>
      <input type="text" class="form-control" name="location" placeholder="Location" required>
    </div>
    
  </div>
 

 
  <button type="submit" class="btn btn-primary" style="cursor:pointer;">Send Enquiry</button>
</form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;">Hotal Enquiry Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('home/registerHotel')?>">
        
   <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">First Name</label>
      <input type="text" class="form-control" name="fname" placeholder="First Name" required>
    </div>
    <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">Last Name</label>
      <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4" style="font-size:18px;">Contact Number</label>
      <input type="text" class="form-control" onkeypress="return numbersonly(event)" name="phone" placeholder="Contact Number" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="font-size:18px;">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputLocation" style="font-size:18px;">Hotal Name</label>
      <input type="text" class="form-control" name="hotelname" placeholder="Hotal Name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputDrop-off" style="font-size:18px;">Location</label> 
      <input type="text" class="form-control" name="location" placeholder="Location" required>
    </div>
    
  </div>
 

 
  <button type="submit" class="btn btn-primary" style="cursor:pointer;">Send Enquiry</button>
</form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;">Cab Enquiry Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('home/enqurycab')?>">
           
   <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">Name</label>
      <input type="text" class="form-control" name="fname" placeholder="Full Name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4" style="font-size:18px;">Contact Number</label>
      <input type="text" class="form-control" name="phone" onkeypress="return numbersonly(event)" placeholder="Contact Number" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="font-size:18px;">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputLocation" style="font-size:18px;">Pick-up Location</label>
      <input type="text" class="form-control" name="pickuplocation" placeholder="Pick-up Location" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputDrop-off" style="font-size:18px;">Drop-off Location</label>
      <input type="text" class="form-control" name="droplocation" placeholder="Drop-off Location" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputPickup-Date" style="font-size:18px;">Pickup Date</label>
      <input type="date" class="form-control" name="pickdate" placeholder="Pickup Date" required>
    </div>
  </div>
 

 
  <button type="submit" class="btn btn-primary" style="cursor: pointer;">Send Enquiry</button>
</form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;"><?php echo ucfirst($domesticguide[0]->title)?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
            <?php echo $domesticguide[0]->description; ?>
            </p>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;"><?php echo ucfirst($internationalguide[0]->title)?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $internationalguide[0]->description; ?>
      </div>
      
    </div>
  </div>
</div>

                <!--<div class="col-md-2">-->
                <!--    <div class="footer-link">-->
                <!--        <h4>POPULAR AIRLINES</h4>-->
                <!--        <ul class="two-columns">-->
                <!--                        <li> <a href="#">About Us</a> </li>-->
                <!--                        <li> <a href="#">FAQ</a> </li>-->
                <!--                        <li> <a href="#">Feedbacks</a> </li>-->
                <!--                        <li> <a href="#">Blog </a> </li>-->
                <!--                        <li> <a href="#">Use Cases</a> </li>-->
                <!--                        <li> <a href="#">Advertise us</a> </li>-->
                <!--                        <li> <a href="#">Discount</a> </li>-->
                <!--                        <li> <a href="#">Vacations</a> </li>-->
                <!--                        <li> <a href="#">Branding Offers </a> </li>-->
                <!--                        <li> <a href="#">Contact Us</a> </li>-->
                <!--                    </ul>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-md-3">
                    <div class="footer-link">
                        <h4>PAYMENT & SECURITY</h4>
                       <div class="PAYMENT-images">
                           <img src="<?php echo base_url('front/images/icon/amexcredit.jpg')?>" style="width: 60px; border-radius: 5px; margin: 4px;" >
                           <img src="<?php echo base_url('front/images/icon/MasterCard1.png')?>" style="width: 60px; border-radius: 5px; margin: 4px;">
                           <img src="<?php echo base_url('front/images/icon/visa.png')?>" style="width: 60px; border-radius: 5px; margin: 4px;">
                           <img src="<?php echo base_url('front/images/icon/paypal.png')?>" style="width: 60px; border-radius: 5px; margin: 4px;">
                           <img src="<?php echo base_url('front/images/icon/rupay.png')?>" style="width: 60px; border-radius: 5px; margin: 4px;">
                           
                       </div>
                       <br>
                       <br>
                       <!--<h4>FOLLOW US ON</h4>-->
                       <!--<div class="foot-social foot-spec foot-com">-->
                       <!--    <ul>-->
                       <!--                 <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>-->
                       <!--                 <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>-->
                       <!--                 <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>-->
                       <!--                 <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>-->
                       <!--                 <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>-->
                       <!--             </ul>-->
                       <!--</div>-->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-link">
                       <!-- <h4>Download DreamMyTrip App</h4>-->
                       <!--<div class="PAYMENT-images">-->
                       <!--    <img src="images/icon/app.png" style="width: 170px; border-radius: 5px; margin: 4px;">-->
                       <!--</div>-->
                       <h4>FOLLOW US ON</h4>
                       <div class="foot-social foot-spec foot-com">
                           <ul>
                                        <li><a href="https://www.facebook.com/Dream-My-Trip-Tourism-106692181840856" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                        <li><a href="https://www.instagram.com/dreammytriptourism/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                                        <li><a href="https://www.linkedin.com/company/dreammytrip" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                    </ul>
                       </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="copy-right">
                         <p style="color:#fff;">Designed Powered by Weblieu Technologies Pvt. Ltd.  <a href="https://www.weblieu.com"> Web Designing Company in Delhi (India)</a></p
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="button-enqueryss">

   <a href="#" type="button" data-toggle="modal" data-target="#exampleModal"><h4 class="btn"> Sign In </h4></a>

</div>

<div class="button-enquerys" type="button" data-toggle="modal" data-target="#exampleModal2"> <h4 class="btn">Sign Up</h4></div>-->
    
    <!--========= Scripts ===========-->
    <script src="<?php echo base_url('front/js/jquery-latest.min.js')?>"></script>
    <script src="<?php echo base_url('front/js/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('front/js/wow.min.js')?>"></script>
    <script src="<?php echo base_url('front/js/materialize.min.js')?>"></script>
    <script src="<?php echo base_url('front/js/custom.js')?>"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "918860855563", // WhatsApp number
            //call_to_action: "Hi, how may we help you? message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
            
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
      <script>

           myID = document.getElementById("myID");

var myScrollFunc = function () {
    var y = window.scrollY;
    if (y >= 300) {
        myID.className = "search-container show"
    } else {
        myID.className = "search-container hide"
    }
};

window.addEventListener("scroll", myScrollFunc);
           
 </script>

    <!-- Initialize Swiper -->
   <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        centeredSlides: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    <script>
    function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode != 46 && unicode > 31 &&unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}
     </script>
  
</body>

</html>