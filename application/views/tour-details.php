<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Location :  <?php echo $package_details[0]->location;?></li>
						<li class="dl2">Price : ₹<?php echo $package_details[0]->price;?></li>
						<li class="dl3">Duration : <?php echo $package_details[0]->duration;?></li>
						<li class="dl4"><a href="<?php echo base_url('booking/'.$package_details[0]->slug)?>">Book Now</a> </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space">
				<div class="col-md-9">
					<!--====== TOUR TITLE ==========-->
					<div class="tour_head">
						<h2><?php echo ucfirst($package_details[0]->subtitle);?>
                         <span class="tour_star">
                          <?php
                                           for($i = 1; $i <= 5; $i++ )
                                             {
                                              if($package_details[0]->rating >= $i){?>
                                   <i class="fa fa-star text-warning" aria-hidden="true"></i>              
                                   <?php
                                     }
                                   else{
                                    ?> 
                                  <i class="fa fa-star-o"
                                                    aria-hidden="true"></i> 
                                   <?php }}?>
                        </span>
                            <span class="tour_rat"><?php echo $package_details[0]->rating;?>
                            </span></h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Description</h3>
						<?php echo $package_details[0]->description;?> 
					</div>
					<!--====== ROOMS: HOTEL BOOKING ==========-->
					<div class="tour_head1 hotel-book-room">
						<h3>Photo Gallery</h3>
						<div id="myCarousel1" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-1">
                            <?php   
                              $imageName = $this->My_model->getfields(TRIPIMAGE,'image',array('trip_id' =>$package_details[0]->id));
                              if(!empty($imageName)){
                                    $i=0;
                                    foreach($imageName as $values){
                                        if($i == 0)
                                        {
                                            $class = "active";
                                        }
                                        else
                                        {
                                            $class='';
                                        }
                             ?>
							<li data-target="#myCarousel1" class="<?php echo $class;?>" data-slide-to="<?php echo $i; ?>"><img src="<?php echo base_url($values->image)?>" alt="Chania">
							</li>
                           <?php $i++; }}?> 
							<!-- 	<li data-target="#myCarousel1" data-slide-to="1"><img src="<?php echo base_url('front/images/gallery/t2.jpg')?>" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="2"><img src="<?php echo base_url('front/images/gallery/t3.jpg')?>" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="3"><img src="images/gallery/t4.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="4"><img src="<?php echo base_url('front/images/gallery/t5.jpg')?>" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="5"><img src="<?php echo base_url('front/images/gallery/s6.jpg')?>" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="6"><img src="<?php echo base_url('front/images/gallery/s7.jpg')?>" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="7"><img src="<?php echo base_url('front/images/gallery/s8.jpg')?>" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="8"><img src="<?php echo base_url('front/images/gallery/s9.jpg')?>" alt="Chania">
								</li> -->
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner carousel-inner1" role="listbox">
                            <?php  if(!empty($imageName)){
                                    $j=0;
                                    foreach($imageName as $values){
                                        if($j == 0)
                                        {
                                            $class = "active";
                                        }
                                        else
                                        {
                                            $class='';
                                        }
                             ?>
							<div class="item <?php echo $class;?>"> <img src="<?php echo base_url($values->image)?>" alt="Chania" width="460" height="345"> </div>
							 <?php $j++; }}?>	
							</div>
							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
							<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span></a>
						</div>
					</div>
					<!--====== TOUR LOCATION ==========-->
					<!-- <div class="tour_head1 tout-map map-container">
						<h3>Location</h3>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290415.157581651!2d-93.99661009218904!3d39.661150926343694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1467884030780" allowfullscreen></iframe>
					</div> -->
					<!--====== ABOUT THE TOUR ==========-->
					<!--<div class="tour_head1">-->
					<!--	<h3>About The Tour</h3>-->
					<!--	<table>-->
					<!--		<tr>-->
					<!--			<th>Places covered</th>-->
					<!--			<th class="event-res">Inclusions</th>-->
					<!--			<th class="event-res">Exclusions</th>-->
					<!--			<th>Event Date</th>-->
					<!--		</tr>-->
					<!--		<tr>-->
					<!--			<td>Rio De Janeiro ,Brazil</td>-->
					<!--			<td class="event-res">Accommodation</td>-->
					<!--			<td class="event-res">Return Airfare & Taxes</td>-->
					<!--			<td>Nov 12, 2017</td>-->
					<!--		</tr>-->
					<!--		<tr>-->
					<!--			<td>Iguassu Falls </td>-->
					<!--			<td class="event-res">8 Breakfast, 3 Dinners</td>-->
					<!--			<td class="event-res">Arrival & Departure transfers</td>-->
					<!--			<td>Nov 14, 2017</td>-->
					<!--		</tr>-->
					<!--		<tr>-->
					<!--			<td>Peru,Lima </td>-->
					<!--			<td class="event-res">First-class Travel</td>-->
					<!--			<td class="event-res">travel insurance</td>-->
					<!--			<td>Nov 16, 2017</td>-->
					<!--		</tr>-->
					<!--		<tr>-->
					<!--			<td>Cusco & Buenos Aires </td>-->
					<!--			<td class="event-res">Free Sightseeing</td>-->
					<!--			<td class="event-res">Service tax of 4.50%</td>-->
					<!--			<td>Nov 18, 2017</td>-->
					<!--		</tr>-->
					<!--	</table>-->
					<!--</div>-->
					<!--====== DURATION ==========-->
					<div class="tour_head1 l-info-pack-days days">
						<h3>Detailed Day Wise Itinerary</h3>
						<ul>
							<?php if(!empty($iternary_des)) {
								$ii=1;
                                 foreach($iternary_des as $values){
							  ?>
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span>Day : <?php echo $ii;?>  </span> <?php echo $values->title;?></h4>
								<?php echo $values->description;?>
							</li>
					     <?php $ii++; }} else {?>
					     	<span class="text-danger text-center">No iternary available in this package.</span>
					     <?php }?>
						</ul>
					</div>
					<div>
						
					</div>
				</div>
				
				
				<style>
				    .band1 {
    background-color: #e82b44;
    border-radius: 50%;
    width: 50px;
    top: 3px;
    height: 50px;
    right: 18px;
}
.band1 p {
    color: #fff !important;
    font-weight: bold;
    padding-top: 14px;
}
				</style>
				<div class="col-md-3 tour_r">
					<!--====== SPECIAL OFFERS ==========-->
					<div class="tour_right tour_offer">
						<div class="band1"><p><?php echo $package_details[0]->discount_percentage."%";?></p></div>
						<p>Special Offer</p>
						<h4>₹<?php echo $package_details[0]->discount_price;?><span class="n-td">
								<span class="n-td-1">₹<?php echo $package_details[0]->price;?></span>
								</span>
							</h4> <a href="<?php echo base_url('booking/'.$package_details[0]->slug)?>" class="link-btn">Book Now</a> </div>
					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Trip Information</h3>
						<ul>
							<li>Location :   <?php echo ucfirst($package_details[0]->location)?></li>
							<li>Arrival Date: <?php echo date("M d,Y",strtotime($package_details[0]->arrival_date))?></li>
							<li>Departure Date: <?php echo date("M d,Y",strtotime($package_details[0]->departure_date))?></li>
						
						</ul>
					</div>
					<!--====== PACKAGE SHARE ==========-->
					<div class="tour_right head_right tour_social tour-ri-com">
						<h3>Share This Package</h3>
						<ul>
							<li><a href="https://www.facebook.com/Dreammytrip-Tourism-106692181840856/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
						    	<li><a href="https://www.instagram.com/dreammytriptourism/" target="_blank"><i class="fa fa-instagram" aria-hidden="true" style="background-color:#8a3ab9;"></i></a></li>
						
							<li><a href="https://www.linkedin.com/company/dreammytrip" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="https://api.whatsapp.com/send/?phone=918860855563&text&app_absent=0"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						
						</ul>
					</div>
					
				
					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Us Now</h4>
							<h4 style="font-size:15px;"><i class="fa fa-phone" aria-hidden="true"></i>
							8860855563/8287815398</h4> </div>
					</div>
					<!--====== PUPULAR TOUR PACKAGES ==========-->
				
				</div>
			</div>
		</div>
	</section>
	<!--====== TIPS BEFORE TRAVEL ==========-->

