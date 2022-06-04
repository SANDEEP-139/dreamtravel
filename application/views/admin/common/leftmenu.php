 <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->

          <div class="user-panel">

            <div class="pull-left image">

              <?php if(!empty($this->session->userdata('userimage'))) {?>
              <img src="<?=base_url('assets/new/dist/img/dream_my_trip.png')?>" class="img-circle" alt="User Image">
            <?php } else {?>
               <img src="<?=base_url('assets/new/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
            <?php }?>


            </div>

            <div class="pull-left info">

              <p style="font-size: 16px;"><?=COMPANYNAME?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online </a>

            </div>

            <small class="label pull-right label-success" style="color:#153359 !important; background:#fff !important; top:30px; position:relative;">v 1.0</small>

          </div>

          <!-- search form -->

           <ul class="sidebar-menu">

           <li class=" treeview <?php if(current_url()==base_url('admin/dashboard')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/dashboard')?>">

                <img src="<?=base_url('assets/images/dashboard.png')?>">&nbsp; <span>DASHBOARD</span></a>             

            </li>

           

             <li class=" treeview <?php if(current_url()==base_url('admin/category')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/category')?>">

                <img src="<?=base_url('assets/images/dashboard.png')?>">&nbsp; <span>MANAGE TRIP CATEGORY</span></a>             

            </li>
          <li class=" treeview <?php if(current_url()==base_url('admin/trip')){ echo 'active'; } ?>" >
          <a href="<?= base_url('admin/trip')?>">
          <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE MENU TRIP</span></a>    </li>

           <li class=" treeview <?php if(current_url()==base_url('admin/subtrip')){ echo 'active'; } ?>" >
          <a href="<?= base_url('admin/subtrip')?>">
          <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE SUBTRIP</span></a>    </li>

         <li class=" treeview <?php if(current_url()==base_url('admin/iternary')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/iternary')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE ITERNARY</span></a>             
           </li>
            <li class=" treeview <?php if(current_url()==base_url('admin/blog')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/blog')?>">

                <img src="<?=base_url('assets/images/dashboard.png')?>">&nbsp; <span>MANAGE BLOG</span></a>             
            </li>
          <li class=" treeview <?php if(current_url()==base_url('admin/banner')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/banner')?>">

                <img src="<?=base_url('assets/images/dashboard.png')?>">&nbsp; <span>MANAGE BANNER</span></a>             
            </li>
              <li class=" treeview <?php if(current_url()==base_url('admin/project')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/project')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE PACKAGE</span></a>             
           </li>
            <li class=" treeview <?php if(current_url()==base_url('admin/gallery')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/gallery')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE GALLERY</span></a>             
           </li>
            <li class=" treeview <?php if(current_url()==base_url('admin/hotels')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/hotels')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE TOP HOTEL</span></a>             
           </li>
           <li class=" treeview <?php if(current_url()==base_url('admin/product')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/product')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE PRODUCT</span></a>             
           </li>
            <li class=" treeview <?php if(current_url()==base_url('admin/page')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/page')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE PAGE</span></a>             
           </li>
            <li class=" treeview <?php if(current_url()==base_url('admin/contactus')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/contactus')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE CONTACTUS</span></a>             
           </li>
           
           <li class=" treeview <?php if(current_url()==base_url('admin/enquiry')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/enquiry')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE ENQUIRY</span></a>             
           </li>
           
          <li class=" treeview <?php if(current_url()==base_url('admin/setting')){ echo 'active'; } ?>" >
           <a href="<?= base_url('admin/setting')?>">
          <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>GLOBAL SETTING</span></a>             

           </li>
          <!-- 
           <li class=" treeview <?php if(current_url()==base_url('admin/information')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/information')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE INFORMATION</span></a>             
           </li>

         
           <li class=" treeview <?php if(current_url()==base_url('admin/partner')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/partner')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE PARTNER</span></a>             
           </li>
             <li class=" treeview <?php if(current_url()==base_url('admin/video')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/video')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE VIDEO</span></a>             
           </li>
            <li class=" treeview <?php if(current_url()==base_url('admin/testimonial')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/testimonial')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE TESTIMONIALS</span></a>             
           </li>
            
           <li class=" treeview <?php if(current_url()==base_url('admin/blog')){ echo 'active'; } ?>" >
              <a href="<?= base_url('admin/blog')?>">
              <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE BLOG</span></a>             
           </li>

         
           
           
              -->

     <!--    <li class=" treeview <?php if(current_url()==base_url('admin/setting')){ echo 'active'; } ?>" >
           <a href="<?= base_url('admin/setting')?>">
          <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>GLOBAL SETTING</span></a>             

        </li>  -->
       <!--   <li class=" treeview <?php if(current_url()==base_url('admin/changepassword')){ echo 'active'; } ?>" >

              <a href="<?= base_url('admin/admin/changepassword')?>">

                <img src="<?=base_url('assets/images/key.png')?>">&nbsp; <span>CHANGE PASSWORD</span></a>             

            </li>  --> 

	     <li class=" treeview" >

              <a href="<?= base_url('admin/admin/logout')?>">

                <img src="<?=base_url('assets/images/logout.png')?>">&nbsp; <span>LOGOUT</span></a>             

        </li>

      </ul>

	

  </section>

  <!-- /.sidebar -->

</aside>

