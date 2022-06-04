<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span>Domestic Places</span></h2>
				<ul>
					<li><a href="<?php echo base_url();?>">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Domestic Places</a>
					</li>
				</ul>
				
			</div>
		</div>
</section>
	<!--====== ABOUT CONTENT ==========-->
 <section>
        <div class="rows tb-space pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                   <h2>Top <span>Domestic Trips</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>YOU MIGHT INTEREST</p>
                </div>
                <!-- HOTEL GRID -->
                <div class="to-ho-hotel">
                    <!-- HOTEL GRID -->
                    <?php if(!empty($domestic_tour)) {
                        $valdur = 0.3;

                       foreach($domestic_tour as $values){
                       // echo $values->id;
                       // $imagename = $this->My_model->fetchValueimage('md_tripimage','image',array('trip_id' =>$values->id,'image_type'=>1));
                       
                          $valdur = $valdur+0.2;
                     ?>
                    <div class="col-md-4 wow fadeInUp" data-wow-duration="<?php echo $valdur;?>">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"> <img src="<?php echo base_url($values->image)?>" style="height:260px;" alt=""> </div>
                                 <img src="<?php echo base_url($values->image)?>" style="height:260px;" alt=""> 
                            </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2">
                                    <a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?>
                                        <h4><?php echo ucfirst($values->title)?></h4>
                                    </a>
                                </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: 
                                      <?php
                                           for($i = 1; $i <= 5; $i++ )
                                             {
                                              if($values->rating >= $i){?>
                                   <i class="fa fa-star text-warning" aria-hidden="true"></i>              
                                   <?php
                                     }
                                   else{
                                    ?> 
                                  <i class="fa fa-star-o"
                                                    aria-hidden="true"></i> 
                                   <?php }}?>
                              

                                            </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">₹<?php echo $values->price?></span><span class="ho-hot-pri">₹<?php echo $values->price?></span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                    <!-- HOTEL GRID -->
                </div>
            </div>
        </div>
    </section>
 
 
 
 
 
 
 
 
 
 
    