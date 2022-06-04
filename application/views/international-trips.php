<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span>International Trips</span></h2>
				<ul>
					<li><a href="<?php echo base_url();?>">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">International Trips</a>
					</li>
				</ul>
				
			</div>
		</div>
	</section>
	<!--====== ABOUT CONTENT ==========-->
 
 
 
 <section>
        <div class="rows tb-space pad-top-o pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>International  <span> Trips</span> </h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>TAILORMADE TRAVEL PACKAGES</p>
                </div>
                <!-- CITY -->
                
                <?php if(!empty($international_tour)) {
                       $i=0; 
                    foreach($international_tour as $values){
                
             ?>
                <div class="col-md-3">
                   <a href="<?php echo base_url('all-package/'.$values->slug);?>">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="<?php echo base_url($values->image)?>" style="height:200px;" alt=""> </div>
                            <div class="tour-mig-lc-con tour-mig-lc-con2">
                                <h5><?php echo $values->title; ?></h5>
                                <p>Starting from ₹<?php echo $values->price; ?></p>
                            </div>
                        </div>
                    </a>
                </div>

               <?php }}?>
              
            </div>
        </div>
    </section>
 