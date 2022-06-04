 <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->

          <div class="user-panel">

            <div class="pull-left image">

              <img src="<?=base_url('assets/new/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">

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

             <li class=" treeview <?php if(current_url()==base_url('admin/user')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/user')?>">

                <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE USER</span></a>             

            </li>

             <li class=" treeview <?php if(current_url()==base_url('admin/category')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/category')?>">

                <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE CATEGORY</span></a>             

            </li>

             <li class=" treeview <?php if(current_url()==base_url('admin/subcategory')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/subcategory')?>">

                <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE SUB CATEGORY</span></a>             

            </li>

            <li class=" treeview <?php if(current_url()==base_url('admin/post')){ echo 'active'; } ?>" >

              <a href="<?=base_url('admin/post')?>">

                <img src="<?=base_url('assets/images/user.png')?>">&nbsp; <span>MANAGE POST </span></a>             

            </li>

           <li class=" treeview <?php if(current_url()==base_url('admin/changepassword')){ echo 'active'; } ?>" >

              <a href="">

                <img src="<?=base_url('assets/images/key.png')?>">&nbsp; <span>CHANGE PASSWORD</span></a>             

            </li>

	    <li class=" treeview" >

              <a href="<?= base_url('admin/admin/logout')?>">

                <img src="<?=base_url('assets/images/logout.png')?>">&nbsp; <span>LOGOUT</span></a>             

            </li>







      </ul>

	

  </section>

  <!-- /.sidebar -->

</aside>

