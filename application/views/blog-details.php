


	<!--====== ALL POST ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!--===== POSTS ======-->
				<div class="rows">
					<div class="posts">
						<div class="col-md-6 col-sm-6 col-xs-12"> <img src="<?php echo base_url($blogdetails[0]->image)?>" alt="" /> </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<h3><?php echo $blogdetails[0]->title;?></h3>
							<h5><span class="post_author">Author: Admin</span><span class="post_date">Date: <?php echo date('d M,Y',strtotime($blogdetails[0]->blog_date))?></span></h5>
						<!--	<div class="post-btn">
								<ul>
									<li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a>
									</li>
									<li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a>
									</li>
									<li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a>
									</li>
								</ul>
							</div>-->							
								 <?php echo $blogdetails[0]->description;?>
								 <a href="<?php echo base_url('blogs') ?>" class="link-btn">Back</a>
						</div>
					</div>
				</div>
				<!--===== POST END ======-->
			</div>
		</div>
	</section>
	