<section>
		<div class="rows inner_banner inner_banner_2" style="background: url(<?php echo base_url($aboutus[0]->image)?>) no-repeat center center;">
			<div class="container">
				<h2><span><?php echo ucfirst($aboutus[0]->title) ?> -</span></h2>
				<ul>
					<li><a href="#inner-page-title">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti"><?php echo ucfirst($aboutus[0]->title) ?></a>
					</li>
				</ul>
				
			</div>
		</div>
	</section>
	<!--====== ABOUT CONTENT ==========-->
	<section class="tourb2-ab-p-2 com-colo-abou">
		<div class="container">
			<!-- TITLE & DESCRIPTION -->
			<div class="spe-title">
				 <h2>About <span>DreamMyTrip</span> Tourism</h2>
			</div>
			<div class="row tourb2-ab-p1">
				<div class="col-md-12 col-sm-12vb">
					<div class="tourb2-ab-p1-left">
						<?php echo $aboutus[0]->ldescription?>
						 </div>
				</div>
				<!--<div class="col-md-6 col-sm-6">-->
				<!--	<div class="tourb2-ab-p1-right"> <img src="images/iplace-8.jpg" alt="" /> </div>-->
				<!--</div>-->
			</div>
		</div>
	</section>


	
	<section class="Career-container">
	    <div class="container">
	        <div class="hadding">
	            <h3>OUR<span class="color-chang"> VISION</span></h3>
	        </div>
	        <div class="row">
	            <div  class="col-md-12">
	                <div class="Easy-Bookings">
	                   
						   <?php echo $vision[0]->description;?>
						
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

      	<section class="why-dmy-container">
	    <div class="container">
	        <div class="hadding">
	            <h3>Board of <span class="color-chang">Directors</span></h3>
	        </div>
	        <div class="row tourb2-ab-p1">
				<div class="col-md-12 col-sm-12vb">
					<div class="tourb2-ab-p1-left">
					<div class="designation"><b><?php echo $director_first[0]->title; ?></b></div>
					<div class="row">
					    <div class="col-md-8">
					       
					            <?php echo $director_first[0]->description; ?>
					       
					    </div>
					    <div class="col-md-4">
					        <div class="images-box" style="padding-top: 20px;">

					            <img src="<?php echo base_url($director_first[0]->image)?>" style="width:100%;height:270px; object-fit: cover;border-radius: 10px;">
					        </div>
					    </div>
					</div>
					
					<div class="designation"> <b><?php echo $director_second[0]->title; ?></b> </div>
					<div class="row">
					    <div class="col-md-8">
					       
					            <?php echo $director_second[0]->description; ?>
					      
					    </div>
					    <div class="col-md-4">
					        <div class="images-box" style="padding-top: 20px;">
					            <img src="<?php echo base_url($director_second[0]->image)?>" style="width:100%;height:270px; object-fit: cover;border-radius: 10px;">
					        </div>
					    </div>
					</div>
					
					
						 </div>
				</div>
			</div>
	    </div>
	</section>



	<section class="Our-Products-container">
	    <div class="container">
	        <div class="hadding">
	            <h3>Our <span class="color-chang">Products</span></h3>
	        </div>
	        <div class="row">
	        	    <?php if(!empty($product)) {
                        foreach($product as $values){
	        	     ?>
					       <div class="col-md-3">
					           <div class="images-contant">
					               <a href="<?php echo base_url();?>">
					               <img src="<?php echo base_url($values->image)?>" style="width: 55%;">
					               <h5><?php echo $values->title;?></h5>
					               </a>
					           </div>
					       </div>
					 <?php }}?>
					       
					   </div>
	    </div>
	</section>
	
	
	<section class="why-dmy-container">
	    <div class="container">
	        <div class="hadding">
	            <h3>Why <span class="color-chang">DreamMyTrip?</span></h3>
	        </div>
	        <div class="row">
	            <div  class="col-md-6">
	                <div class="Easy-Booking">
	                    <h3>Easy Booking</h3>
	                    <p>We offer easy and appropriate flight and hotel bookings with exciting offers.</p>
	                </div>
	            </div>
	            <div  class="col-md-6">
	                 <div class="Easy-Booking">
	                    <h3>Exciting Deals</h3>
	                    <p>Enjoy exciting deals on flight, hotels, buses, car rental & tour packages.</p>
	                </div>
	            </div>
	            <div  class="col-md-6">
	                 <div class="Easy-Booking">
	                    <h3>Most Trusted Brand</h3>
	                    <p>We are all with a strong focus on fulfilling customer needs and service. we are the most trusted online travel brand.</p>
	                </div>
	            </div>
	            <div  class="col-md-6">
	                 <div class="Easy-Booking">
	                    <h3>Memorable Experiences</h3>
	                    <p>Join the DreamMyTrip Family –Created their most memorable experiences with us.</p>
	                </div>
	            </div>
	            <div  class="col-md-6">
	                 <div class="Easy-Booking">
	                    <h3>Great Peers</h3>
	                    <p>We are a team of supporters. Our folks are ambitious, very supportive, Fun loving, go getters, aware and proactive.</p>
	                </div>
	            </div>
	            <div  class="col-md-6">
	                 <div class="Easy-Booking">
	                    <h3>24/7 Support</h3>
	                    <p>Get assistance 24/7 on any kind of travel related query.We are happy to support you.</p>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	
	
	
	<section class="Career-container">
	    <div class="container">
	        <div class="hadding">
	            <h3><span class="color-chang"><?php echo ucfirst($career[0]->title);?></span></h3>
	        </div>
	        <div class="row">
	            <div  class="col-md-12">
	                <div class="Easy-Bookings">
	                 <?php echo $career[0]->description;?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	
	<section class="gallery-container">
	    <div class="container">
	        <div class="hadding">
	            <h3><span class="color-chang">Gallery</span></h3>
	        </div>
	        <div class="row"> 
	        	<?php if(!empty($gallery)) {
                   foreach($gallery as $values){
	        	 ?>
	            <div class="col-md-4">
	                <div class="gallery">
	                   <img src="<?php echo base_url($values->image)?>" alt="" style="width: 100%;">
	                </div>
	            </div>
	          <?php }}?>
	        </div>
	    </div>
	</section>
	