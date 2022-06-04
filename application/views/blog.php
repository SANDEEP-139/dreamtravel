<!--====== BANNER ==========-->
	<section>
	   
		<div class="rows inner_banner inner_banner_1" style="background: url(<?php echo base_url($blogibanner[0]->image)?>) no-repeat center center;">
			<div class="container">
				<h2><?php echo $blogibanner[0]->description ?></h2>
				<ul>
					<li><a href="#inner-page-title">Home</a> </li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Blog Posts</a> </li>
				</ul>
			
			</div>
		</div>
	</section>
	<!--====== ALL POST ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2><?php echo $blogibanner[0]->ldescription ?></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<!--===== POSTS ======-->
				<div class="rows">
				    <?php if(!empty($blogS)) {
				       foreach($blogS as $values){
				    ?>
					<div class="posts">
						<div class="col-md-6 col-sm-6 col-xs-12"> <img src="<?php echo base_url($values->image)?>" alt="" /> </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3><?php echo ucfirst($values->title)?></h3>
							<h5><span class="post_author">Author: Admin</span><span class="post_date">Date: <?php echo date('d M,Y',strtotime($values->blog_date))?></span></h5>
							 <?php echo $values->description;?>
							<a href="<?php echo base_url('blog-details/'.$values->id) ?>" class="link-btn">Read more</a> </div>
					</div>
				  <?php }}?>
				</div>
				<!--===== POST END ======-->
			</div>
		</div>
	</section>