<section>
		<div class="rows inner_banner inner_banner_2" style="background: url(<?php echo base_url($contactus[0]->image)?>) no-repeat center center;">
			<div class="container">
				<h2><span><?php echo ucfirst($contactus[0]->title) ?> -</span></h2>
				<ul>
					<li><a href="#inner-page-title">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti"><?php echo ucfirst($contactus[0]->title) ?></a>
					</li>
				</ul>
				
			</div>
		</div>
	</section>
     
        
      
	<div class="contact-form-container">
		<span class="text-center">
       	   <?php 
       	     if($this->session->flashdata('msg')) {
             echo $this->session->flashdata('msg');
            }
       	   ?>
       </span>
		<div class="container">

			<div class="spe-title col-md-12">
					<h2><span><?php echo ucfirst($contactus[0]->description)?></span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<?php echo $contactus[0]->ldescription?>
				</div>
			<div class="row">
				<div class="col-md-6">
					<div class="contact-form">
<form method="post" id="myForm" action="<?php echo base_url('home/contactnow')?>">
  <div class="form-row">
  	 <div class="form-group col-md-6">
      <label for="inputname4">Name</label>
      <input type="text" name="name" class="form-control" id="inputname4" placeholder="Name" data-validation="required" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputmobile4">Mobile Number</label>
      <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" minlength="10"  id="inputmobile4" placeholder="Mobile Number" name="mobile" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputSubject4">Subject</label>
      <input type="text" class="form-control" id="inputSubject4" name="subject" placeholder="Subject" required>
    </div>
    <div class="form-group col-md-12">
      <label for="inputMassage4">Massage</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" required name="message" rows="3"></textarea>
    </div>
   
  </div>
  
  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="rows contact-map map-container">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14014.207093696095!2d77.3171974!3d28.5832194!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f410a31f2ec8865!2sDreamMyTrip%20Tourism%20India%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1637299033528!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
				</div>
			</div>
		</div>
	</div>
	<section>
		<div class="form form-spac rows con-page" style="padding-top: 0px !important;">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				

		<div class="pg-contact">
                        
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con1"> <img src="img/contact/1.html" alt="">
                            <h4>Address</h4>
                            <p><?php echo $settings[0]->address?> </p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con3"> <img src="img/contact/2.html" alt="">
                            <h4>CONTACT INFO:</h4>
                            <p> <a href="tel://0099999999" class="contact-icon">Phone: +91 <?php echo $settings[0]->contact?></a>
                                <br> <a href="tel://0099999999" class="contact-icon">Mobile: +91 <?php echo $settings[0]->contact1?></a>
                                <br> <a href="mailto:<?php echo $settings[0]->email?>" class="contact-icon">Email: <?php echo $settings[0]->email?></a> </p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con4"> <img src="img/contact/3.html" alt="">
                            <h4>Website</h4>
                            <p> <a href="#">Website: <?php echo $settings[0]->website?></a>
                                <br> <a href="#">Facebook: #</a>
                        </div>
                    </div>				
			</div>
		</div>
	</section>


	
		

