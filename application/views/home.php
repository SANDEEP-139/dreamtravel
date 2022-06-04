<div class="slider-section">
 <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php if(!empty($banner)) {
           foreach($banner as $values){
        ?>
        <div class="swiper-slide"><img src="<?php echo base_url($values->image)?>"></div>
        <?php }}?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
        <div class="tourz-search">
            <div class="container">
                <div class="row">

                    <div class="tourz-search-1">
                        <h1 class="dream-now">DreamMyTrip Tourism</h1>
                        <p>Make everyone's dream will come true by DreamMyTrip Tourism. It brings you top domestic and international packages with exciting offers and discounts including flights and hotels booking with affordable prices</p>
                    </div>
          
        
            
            
                </div>
            </div>
        </div>
          
</div>  <style>    .tourz-search-1-tour{position: relative;top: -90px;    z-index: 999;}.tourz-search-1-tour1{position: absolute;left: 7%;right: 7%;top: -144px;z-index: 9;}.tourz-search-1{top: -80px;}    @media only screen and (max-width: 767px) and (min-width: 10px) {.visa-section-container{float: left;width: 100%;}.tourz-search-1 p {    display:none !important;}	  .tourz-search-1-tour{position: relative;top: 0px;float: left;width: 100%;min-height: 385px;     z-index: 99;}		.tourz-search-1-tour1{position: relative;left: 0px;right: 0px;top: -45px;z-index: 9;}    }  </style>  <div class="tourz-search-1-tour"><div class="tourz-search-1-tour1">            <div id="adivaha-wrapper"><script charset="utf-8" type="text/javascript" src="https://www.abengines.com/ui/v2/77A88929/combo/"></script></div>          </div>          </div>

    <!--HEADER SECTION-->
    
    <!-- <div class="search-container show" id="myID">-->
    <!--<div class="container">-->
    <!--<div class="serch-box">-->
    <!--    <div class="serchh">-->
          
    <!--  <div class="tourz-searchs">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
                   
          
          
            
            
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
          
    <!--   </div>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    

   
    <!--END HEADER SECTION-->

<div class="visa-section-container">
    <div class="container">
        <div class="row">
            <div class="col-md-4 wow slideInUp" data-wow-duration="0.5s" style="z-index: 999 !important;">
                <div class="visa">
                   <img src="<?php echo base_url('front/images/icon/visa-application.jpg')?>" style="width:100%"> 
                   <div class="visa-text" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal1">
                       <h5>VISA</h5>
                   </div>
                </div>
            </div>
            <div class="col-md-4 wow slideInUp" data-wow-duration="0.5s" style="z-index: 999 !important;">
                <div class="visa">
                    <img src="<?php echo base_url('front/images/icon/train-stopped.jpg')?>" style="width:100%"> 
                    <div class="visa-text"  style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal5">
                        <h5>TRAIN</h5>
                   </div>
                </div>
                
            </div>
            <div class="col-md-4 wow slideInUp" data-wow-duration="0.5s" style="z-index: 999 !important;">
                <div class="visa">
                    <img src="<?php echo base_url('front/images/icon/taxi-app.jpg')?>" style="width:100%">  
                    <div class="visa-text" style="cursor: pointer;"  data-toggle="modal" data-target="#exampleModal8">
                       <h5 >CUSTOMIZE CAB</h5>
                   </div>
                  
                </div>
                
            </div>
        </div>
    </div>
    
</div>

   




<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;">Visa Enquiry Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?php echo base_url('home/enquryvisa')?>">
            
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
        <label for="inputLocation" style="font-size:18px;">Country</label>
      <input type="text" class="form-control" name="country" placeholder="Country" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputDrop-off" style="font-size:18px;">City</label>
      <input type="text" class="form-control" name="location" placeholder="City" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputPickup-Date" style="font-size:18px;">Required Date</label>
      <input type="date" class="form-control" name="pickdate" required>
    </div>
  </div>
 

 
  <button type="submit" class="btn btn-primary" style="cursor: pointer;">Send Enquiry</button>
</form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; font-size: 22px; color: #e91e63;">Train Enquiry Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('home/enqurytrain')?>">
        
   <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputEmail4" style="font-size:18px;">Name</label>
      <input type="text" class="form-control" name="fname" placeholder="Full Name" required>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4" style="font-size:18px;">Contact Number</label>
      <input type="text" class="form-control" name="phone" placeholder="Contact Number" onkeypress="return numbersonly(event)" required>
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
 

 
  <button type="submit" class="btn btn-primary" style="cursor:pointer;">Send Enquiry</button>
</form>
      </div>
      
    </div>
  </div>
</div>


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


                    <div class="col-md-12 text-center">
                        <a href="<?php echo base_url('domestic-trips')?>"><button type="button" class="btn btn-danger px-5 rounded-0">Read More</button></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

 <section>
        <div class="rows tb-space pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                   <h2>Top <span> Weekend Trips</span></h2>
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
                    <?php if(!empty($weekend_tour)) {
                        $valdur = 0.3;

                       foreach($weekend_tour as $values){
                       
                          $valdur = $valdur+0.2;

                     ?>
                    <div class="col-md-4 wow slideInUp" data-wow-duration="<?php echo $valdur;?>">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"> <img src="<?php echo base_url($values->image)?>" style="height:260px;" alt=""> </div>
                                 <img src="<?php echo base_url($values->image);?>"  style="height:260px;"  alt=""> </div>
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
                    <?php }}?>

                    <div class="col-md-12 text-center">
                        <a href="<?php echo base_url('weekend-trips')?>"><button type="button" class="btn btn-danger px-5 rounded-0">Read More</button></a>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="rows tb-space pad-top-o pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Top International  <span> Trips</span></h2>
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
                       
                      
                    if($i==0)
                        {
                     ?>
                <div class="col-md-6">
                    <a href="<?php echo base_url('all-package/'.$values->slug);?>">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="<?php echo base_url($values->image)?>" alt=""  style="min-height: 400px;"> </div>
                            <div class="tour-mig-lc-con">
                                <h5><?php echo $values->title; ?></h5>
                                <p>Starting from ₹<?php echo $values->price; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
              <?php } else {?>
                <div class="col-md-3">
                    <a href="<?php echo base_url('all-package/'.$values->slug);?>">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img src="<?php echo base_url($values->image)?>" alt="" style="min-height: 200px;"> </div>
                            <div class="tour-mig-lc-con tour-mig-lc-con2">
                                <h5><?php echo $values->title; ?></h5>
                                <p>Starting from ₹<?php echo $values->price; ?></p>
                            </div>
                        </div>
                    </a>
                </div>

               <?php }  $i++;}}?>
          
               

                <div class="col-md-12 text-center">
                        <a href="<?php echo base_url('international-trips');?>"><button type="button" class="btn btn-danger px-5 rounded-0">Read More</button></a>
                </div>
            </div>
        </div>
    </section>
    
    
    
    <section>
        <div class="rows tb-space pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                   <h2>Dream <span> Trips</span></h2>
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
                      <?php if(!empty($dream_tour)) {
                        $valdur = 0.3;

                       foreach($dream_tour as $values){
                        
                          $valdur = $valdur+0.2;

                     ?>
                    <div class="col-md-4 wow slideInUp" data-wow-duration="<?php echo $valdur;?>">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"> <img src="<?php echo base_url($values->image)?>" style="height:260px;" alt=""> </div>
                                 <img src="<?php echo base_url($values->image)?>"  style="height:260px;" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2">
                                   <a href="<?php echo base_url('all-package/'.$values->slug);?>"><?php echo $values->title; ?>
                                        <h4><?php echo $values->title;?></h4>
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
                                        <li><span class="ho-hot-pri-dis">₹<?php echo $values->price; ?></span><span class="ho-hot-pri">₹<?php echo $values->price; ?></span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php }}?>
                    <div class="col-md-12 text-center">
                        <a href="<?php echo base_url('dream-trips')?>"><button type="button" class="btn btn-danger px-5 rounded-0">Read More</button></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    
    
 
    
    <!--====== HOME HOTELS ==========-->
    <section>
        <div class="rows tb-space pad-top-o pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Top  <span>Rated Hotels! </span> </h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. Book Hotel rooms and enjoy your holidays with distinctive experience</p>
                </div>
                <!-- HOTEL GRID -->
                <div class="to-ho-hotel">
                    <!-- HOTEL GRID -->
                    <?php if(!empty($hotel)) {
                        foreach($hotel as $values) {
                     ?>
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"> <img src="<?php echo base_url($values->image)?>" alt=""> </div>
                                <div class="hom-hot-av-tic"></div> <img src="<?php echo base_url($values->image)?>" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2">
                                    <a href="#">
                                        <h4><?php echo strtoupper($values->title)?></h4>
                                    </a>
                                </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>City: illunois,united states
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
                                        <li><span class="ho-hot-pri-dis">₹<?php echo $values->price;?></span><span class="ho-hot-pri">₹<?php echo $values->price;?></span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php }}?>
                </div>
            </div>
        </div>
    </section>
    <!--====== SECTION: FREE CONSULTANT ==========-->
  
    <section>
        <div class="offer" style="background: url(<?php echo base_url($footerdata[0]->discount_background)?>) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4"><?php echo $footerdata[0]->discount_text;?></span>                            <span class="ol-3"></span> <span class="ol-5">₹<?php echo $footerdata[0]->discount_price;?>/-</span>
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration="0.5s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="<?php echo base_url('front/images/icon/dis1.png')?>" alt="">
                  </a><span>Free WiFi</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.7s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="<?php echo base_url('front/images/icon/dis2.png')?>" alt=""> </a><span>Breakfast</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.9s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="<?php echo base_url('front/images/icon/dis3.png')?>" alt=""> </a><span>Pool</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.1s">
                                    <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="<?php echo base_url('front/images/icon/dis4.png')?>" alt=""> </a><span>Television</span>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="offer-r">
                            <div class="or-1"> <span class="or-11">go</span> <span class="or-12">Stays</span> </div>
                            <div class="or-2"> <span class="or-21">Get</span> <span class="or-22"><?php echo $footerdata[0]->discount_percantage;?>%</span> <span class="or-23">Off</span><span class="or-25"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== EVENTS ==========-->
    
    
    

    
    
    <section>
        <div class="rows pla pad-bot-redu tb-space">
            <div class="pla1 p-home container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title spe-title-1">
                    <h2>Top <span>Sight Seeing</span> in this month</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
                </div>
                <div class="popu-places-home">
                    <!-- POPULAR PLACES 1 -->
                    <?php if(!empty($packages)) {
                      foreach($packages as $values){
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-12 place">
                        <div class="col-md-6 col-sm-12 col-xs-12"> <img src="<?php echo base_url($values->image)?>" alt="" /> </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <h3><span><?php echo $values->package_name?></span> <?php echo $values->duration?></h3>
                            <p><?php echo substr(strip_tags($values->description),0,200)?></p> <a href="<?php echo base_url();?>" class="link-btn">more info</a> </div>
                    </div>
                   <?php }}?>
                </div>
                
            </div>
        </div>
    </section>

    
    
