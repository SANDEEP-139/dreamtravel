<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span> <?php echo strtoupper($all_package[0]->trptype);?> TOUR PACKAGES </span><br><p style="font-size: 10px;"><?php echo count($all_package);?> PACKAGES</p></h2>
				
				<ul>
					<li><a href="<?php echo base_url();?>">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti"> Tour Package Booking </a>
					</li>
				</ul>
				
			</div>
		</div>
</section>
	
	<!--====== HOTELS LIST ==========-->
	<section class="hot-page2-alp hot-page2-pa-sp-top">
		<div class="container">
		
			<div class="row">
				<div class="hot-page2-alp-con">
					<!--LEFT LISTINGS-->
					
					<!--END LEFT LISTINGS-->
					<!--RIGHT LISTINGS-->
					<div class="col-md-12 hot-page2-alp-con-right">
						<div class="hot-page2-alp-con-right-1">
							<!--LISTINGS-->
							<div class="row">
								<!--LISTINGS START-->
						  <?php if(!empty($all_package)) {
                              foreach($all_package as $values) {
                               $imageData  = $this->My_model->fetchValue('md_tripimage','image',array('trip_id' => $values->id,'image_type' =>1));
                             //  echo $this->db->last_query();
						   ?>
								<div class="hot-page2-alp-r-list">
									<div class="col-md-3 hot-page2-alp-r-list-re-sp">
										<a href="<?php echo base_url('tour-details/'.$values->slug);?>">
											<div class="hotel-list-score"><?php echo $values->rating;?></div>
											<div class="hot-page2-hli-1"> <img src="<?php echo base_url($imageData)?>" alt=""> </div>
										</a>
									</div>
									<div class="col-md-6">
										<div class="trav-list-bod">
										<a href="<?php echo base_url('tour-details/'.$values->slug);?>"><h3><?php echo ucfirst($values->subtitle)?></h3></a>
										<p><?php echo substr($values->description,0,500);?>...</p>
											<a href="<?php echo base_url('tour-details/'.$values->slug);?>"><span style="color:red;">Read More</span></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
											<div class="hot-page2-alp-r-hot-page-rat"><?php echo $values->discount_percentage?>%Off</div> <span class="hot-list-p3-1">Prices Starting</span> <span class="hot-list-p3-2">₹<?php echo $values->discount_price?></span><span class="hot-list-p3-4">
												<a href="<?php echo base_url('tour-details/'.$values->slug);?>" class="hot-page2-alp-quot-btn">Book Now</a>
											</span> </div>
									</div>
									<div>
										<div class="trav-ami">
											<h4>Detail and Includes</h4>
											<ul>
												<li><img src="<?php echo base_url('front/images/icon/a14.png')?>" alt=""> <span>Sightseeing</span></li>
												<li><img src="<?php echo base_url('front/images/icon/a15.png')?>" alt=""> <span>Hotel</span></li>
												<li><img src="<?php echo base_url('front/images/icon/a16.png')?>" alt=""> <span>Transfer</span></li>
												<!--<li><img src="<?php echo base_url('front/images/icon/a17.png')?>" alt=""> <span>Luggage</span></li>
												<li><img src="<?php echo base_url('front/images/icon/a18.png')?>" alt=""> <span>Duration 8N/9D</span></li>
												<li><img src="<?php echo base_url('front/images/icon/a19.png')?>" alt=""> <span>Location : Rio,Brazil</span></li>-->
										     		<li><img src="<?php echo base_url('front/images/icon/dbl4.png')?>" alt=""> <span>Stay Plan</span></li>
											</ul>
										</div>	
									</div>
								</div>
							<?php }} else {?>
								<div class="col-md-12">
										<div class="trav-list-bod">
										<span class="text-center"><a href="<?php echo base_url();?>"><h3>Back</h3></a>
										<h4>Record not found</h4></span>
										</div>
									</div>
							<?php }?>
								<!--END LISTINGS-->


								
							</div>
						</div>
					</div>
					<!--END RIGHT LISTINGS-->
				</div>
			</div>
		</div>
	</section>
