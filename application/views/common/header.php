<body>
    <!-- Preloader -->
 <!--   <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>-->

    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url('front/images/dream_my_trip.png')?>" alt="" />
            </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="<?php echo base_url()?>" class="ed-mi-close"><i class="fa fa-times"></i></a>
                             <a href="<?php echo base_url()?>"<h4>Home pages</h4></a>
                            
                            <h4>Domestic Places</h4>
                             <h5 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal13" class="Domestic">Domestic Tour Guidlines</h5>
                             <h5 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal15" class="Domestic">Customise Packages</h5>
                            <h5>Domestic Tour Packages</h5>
                             <ul>
                                            <?php if(!empty($domestic_package)) {
                                               foreach($domestic_package as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?>          
                                           </ul>
                            
                            <h5>Weekend Packages</h5>
                             <ul>
                                          <?php if(!empty($weekend_package)) {
                                               foreach($weekend_package as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                        
                                        </ul>  
                           <h5>Honeymoon Packages</h5>
                             <ul>
                                          <?php if(!empty($honeymoon_package)) {
                                               foreach($honeymoon_package as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                        
                            </ul>               
                            
                            
                            
                            <h4>International Places</h4>
                             <h5 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal12">International Tour Guidlines</h5>
                             <h5 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal15">Customise Packages</h5>
                            <h5>International Tour Packages</h5>
                             <ul>
                                            <?php if(!empty($domestic_Ipackage)) {
                                               foreach($domestic_Ipackage as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?>          
                                           </ul>
                            
                            <h5>Weekend Packages</h5>
                             <ul>
                                          <?php if(!empty($weekend_Ipackage)) {
                                               foreach($weekend_Ipackage as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                        
                                        </ul>  
                           <h5>Honeymoon Packages</h5>
                             <ul>
                                          <?php if(!empty($honeymoon_Ipackage)) {
                                               foreach($honeymoon_Ipackage as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                        
                            </ul>                 
                            
                            
                            
                           
                           
                           
                            <h4 class="ed-dr-men-mar-top">User login pages</h4>
                            <ul>
                                 <li><a href="https://dreammytriptourism.com/page/myaccounts/">Customer Login</a></li>
                                  <li><a href="https://dreammytriptourism.com/page/agents/">Agent Login</a></li>
                            </ul>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                               
                                <li><a href="#">Contact Number: +91-8860855563, +91-8287815398</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                <?php  if(!empty($this->session->userdata('user_logged_in'))) {?>
                                <li><a href="<?php echo base_url('home/logout')?>" type="button">Logout(<?php echo $this->session->userdata('username')?>)</a>
                                </li>
                                <?php }?> 
                                <!--else {?>
                                 <li><a href="#" type="button" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                                </li>
                               
                                <li><a href="#" type="button" data-toggle="modal" data-target="#exampleModal2">Sign Up</a>
                                </li>-->
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="https://www.facebook.com/Dream-My-Trip-Tourism-106692181840856" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                        <li><a href="https://www.instagram.com/dreammytriptourism/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                                        <li><a href="https://www.linkedin.com/company/dreammytrip" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="text-center"><?php if(!empty($this->session->flashdata('msg')))
           {
            echo $this->session->flashdata('msg');
           }
          ?>  
          </span>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="sign">
        <h3>Sign In</h3>
        </div>
        <form class="cd-form" method="post" action="<?php echo base_url('home/userLogin')?>">
					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signinemail" name="email" type="email" placeholder="E-mail" required>
						
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border" id="signinpassword" name="password" type="password"  placeholder="Password" required>
						
					</p>

					<<!--p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>-->

					<p class="fieldset">
						<input class="full-width" type="submit" value="Sign In">
					</p>
					<div class="Create-Account">
					<p style="text-align: right;">Create Account</p>
					</div>
				</form>
      </div>
    </div>
  </div>
</div>
        
        
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="sign">
        <h3>Sign Up</h3>
        </div>
        <form class="cd-form" method="post" id="myForm" action="<?php  echo base_url('home/registeruser')?>">
            
            <p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Usernamee</label>
						<input class="full-width has-padding has-border" id="signupusername" name="username"  type="text" placeholder="Username" required>
					</p>
					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signinemaillll" type="email"  onchange="checkEmail()"  name="email" placeholder="E-mail" required>
						
					</p>
                      <span id="msggg"></span>
					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border" id="signin-password" type="password" name="password" placeholder="Password" required>
						
					</p>

					<!--<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>-->

					<p class="fieldset">
						<input class="full-width" type="submit" value="Sign Up">
					</p>
		</form>
      </div>
    </div>
  </div>
  </div>
        
  <div class="modal fade" id="exampleModal15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;">Customise Packages Enquiry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="<?php echo base_url('home/enqurycustpackage')?>">
        
   <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">First Name</label>
      <input type="text" class="form-control" name="fname" placeholder="Full Name" required>
    </div>
    <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">Last Name</label>
      <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4" style="font-size:18px;">Contact Number</label>
      <input type="text" class="form-control" name="phone" onkeypress="return numbersonly(event)"  placeholder="Contact Number">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="font-size:18px;">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required> 
    </div>
    <div class="form-group col-md-6">
        <label for="inputLocation" style="font-size:18px;">Pickup Location</label>
      <input type="text" class="form-control" name="pickuplocation" placeholder="Pickup Location" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputLocation" style="font-size:18px;">Drop Location</label>
      <input type="text" class="form-control" name="droplocation" placeholder="Drop Location" required>
    </div>
     <div class="form-group col-md-12">
        <label for="inputDrop-off" style="font-size:18px;">Duration Day/Night</label>
      <input type="text" class="form-control" name="duration" placeholder="Duration Day/Night" required>
    </div>
    
    
  </div>
 

 
  <button type="submit" class="btn btn-primary" style="cursor:pointer;">Send Enquiry</button>
</form>
      </div>
      
    </div>
  </div>
</div>      

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="<?php echo base_url()?>"><img src="<?php echo base_url('front/images/dream_my_trip.png')?>" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="<?php echo base_url('about-us')?>">About us</a></li>
                                <li class="cour-menu">
                                    <a href="#!" class="mm-arr">Domestic Places</a>
                                    <div class="mm-pos">
                                        <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                    <h4 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal13" class="Domestic">Domestic Tour Guidlines</h4>
                                                    <h4 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal15" class="Domestic">Customise Packages</h4>
                                                     
                                                </div>
                                                <style>
                                                
                                                .Domestic{
                                                        color:#000 !important;
                                                    }
                                                
                                                    .Domestic:hover{
                                                        color:#e23464 !important;
                                                        text-decoration: underline;
                                                    }
                                                </style>
                                        <div class="mm1-com mm1-cour-com mm1-s3">
                                         <h4>Domestic Tour Packages</h4>
                                            <ul>
                                            <?php if(!empty($domestic_package)) {
                                               foreach($domestic_package as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?>          
                                           </ul>

                                                    
                                                </div>
                                               
                                <div class="mm1-com mm1-cour-com mm1-s3">
                                    <h4>Weekend Packages</h4>
                                        <ul>
                                            <?php if(!empty($weekend_package)) {
                                               foreach($weekend_package as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                        
                                        </ul>
                                                   
                                                </div>
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                   <h4>Honeymoon Packages</h4>
                                                    <ul>
                                          <?php if(!empty($honeymoon_package)) {
                                               foreach($honeymoon_package as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                    </ul>
                                                   
                                                </div>
                                                
                                              
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!--<li class="about-menu">-->
                                <!--    <a href="#" class="mm-arr">Domestic Places</a>-->
                                    <!-- MEGA MENU 1 -->
                                <!--    <div class="mm-pos">-->
                                <!--        <div class="about-mm m-menu">-->
                                <!--            <div class="m-menu-inn">-->
                                                
                                                
                                <!--                <div class="mm1-com mm1-s3">-->
                                <!--                    <h4>Domestic Tour Guidlines</h4>-->
                                <!--                    <ul>-->
                                <!--                        <li><a href="#">All Booking</a></li>-->
                                <!--                        <li><a href="#">Tour Package Booking</a></li>-->
                                <!--                        <li><a href="#">Hotel Booking</a></li>-->
                                <!--                        <li><a href="#">Car Rentals Booking</a></li>-->
                                <!--                        <li><a href="#">Flight Booking</a></li>-->
                                <!--                        <li><a href="#">Slider Booking</a></li>-->
                                <!--                    </ul>-->
                                <!--                </div>-->
                                <!--                <div class="mm1-com mm1-s4">-->
                                <!--                    <h4>Domestic Tour Packages</h4>-->
                                <!--                    <ul>-->
                                <!--                        <li><a href="#">All Package</a></li>-->
                                <!--                        <li><a href="#">Family Package</a></li>-->
                                <!--                        <li><a href="#">Honeymoon Package</a></li>-->
                                <!--                        <li><a href="#">Group Package</a></li>-->
                                <!--                        <li><a href="#">WeekEnd Package</a></li>-->
                                <!--                        <li><a href="#">Regular Package</a></li>-->
                                <!--                        <li><a href="#">Custom Package</a></li>-->
                                <!--                    </ul>-->
                                <!--                </div>-->
                                <!--                 <div class="mm1-com mm1-s4">-->
                                <!--                    <h4>Weekend Packages</h4>-->
                                <!--                    <ul>-->
                                <!--                        <li><a href="#">All Package</a></li>-->
                                <!--                        <li><a href="#">Family Package</a></li>-->
                                <!--                        <li><a href="#">Honeymoon Package</a></li>-->
                                <!--                        <li><a href="#">Group Package</a></li>-->
                                <!--                        <li><a href="#">WeekEnd Package</a></li>-->
                                <!--                        <li><a href="#">Regular Package</a></li>-->
                                <!--                        <li><a href="#">Custom Package</a></li>-->
                                <!--                    </ul>-->
                                <!--                </div>-->
                                <!--                 <div class="mm1-com mm1-s4">-->
                                                    
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</li>-->
                                <li class="about-menu">
                                    <a href="#" class="mm-arr">International Places</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="about-mm m-menu">
                                            <div class="m-menu-inn">
                                                
                                                
                                                <div class="mm1-com mm1-s3">
                                                    <h4 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal12" class="Domestic">International Tour Guidlines</h4>
                                                    <h4 style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal15" class="Domestic">Customised Packages</h4>
                                                    
                                                </div>
                                                <div class="mm1-com mm1-s4">
                                                    <h4>International Tour Packages</h4>
                                                    <ul>
                                                       <?php if(!empty($domestic_Ipackage)) {
                                               foreach($domestic_Ipackage as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                    </ul>
                                                </div>
                                                 <div class="mm1-com mm1-s4">
                                                    <h4>Business Packages</h4>
                                                    <ul>
                                                         <?php if(!empty($weekend_Ipackage)) {
                                               foreach($weekend_Ipackage as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                    </ul>
                                                </div>
                                                 <div class="mm1-com mm1-s4">
                                                    <h4>Honeymoon Packages</h4>
                                                    <ul>
                                                        <?php if(!empty($honeymoon_Ipackage)) {
                                               foreach($honeymoon_Ipackage as $values){
                                             ?>       
                                            <li><a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?></a></li>
                                            <?php }}?> 
                                                    </ul>
                                                </div>
                                                
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li><a href="<?php echo base_url('contact-us')?>">Contact us</a></li>												    <li><a href="https://dreammytriptourism.com/page/myaccounts/">Customer Login</a></li>                                  <li><a href="https://dreammytriptourism.com/page/agents/">Agent Login</a></li>
                
                 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    
    
    
 
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
<script>
     function checkEmail()
     {
       var signupemail = $("#signinemaillll").val();
       $.ajax({

 		   type:'POST',
 		   url: '<?= base_url('home/checkemail')?>',
 		   data:'email='+signupemail,
 		   success:function(resdata)
 		   {
 		       //alert(resdata);
 		       //return false;
 		   	  if(resdata == 1)
 		   	  {
              $("#signinemaillll").val('');
               $("#msggg").html('<div class="alert alert-danger"><strong>This email is already exists.Please try another one.</strong></div>');
 		   	  }
 		   	  else
 		   	  {
 		   	   $("#msggg").html('');
 		   	   $("#signinemaillll").val(signupemail);
 		   	  }
 		   }
 	});
     }
</script>

    <!--END HEADER SECTION-->