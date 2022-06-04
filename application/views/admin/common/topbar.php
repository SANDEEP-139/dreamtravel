<header class="main-header">
	<!-- Logo -->
	<a href="<?=base_url('admin/dashboard')?>" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <span class="logo-mini"><img src="<?=base_url('assets/mini-logo.png')?>" /></span>
	  <!-- logo for regular state and mobile devices -->
	  <!-- <span class="logo-lg"><img src="<?=base_url('assets/admin-logo.png')?>" /></span> -->
	  
	  <span class="logo-lg" style="font-weight:600;"><?=COMPANYNAME?></span>
	</a>

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
	  <!-- Sidebar toggle button-->
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" >
		<span class="sr-only">Toggle navigation</span>
	  </a>
	  <!-- Navbar Right Menu -->
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
		  <!-- Messages: style can be found in dropdown.less-->              
		  <!-- User Account: style can be found in dropdown.less -->			  
		  <li class="dropdown user user-menu">
			<a href="<?=base_url('admin/admin/logout')?>"  >
			  <b>
				<small style="font-size: 13px;" class="label bg-yellow"></small>
				&nbsp;
				<?php if($this->session->userdata('admin_username')) echo ucfirst($this->session->userdata('admin_username')); ?> <i class="fa fa-power-off"></i>
			  </b>
			</a>               
		  </li>
		  <!-- Control Sidebar Toggle Button -->             
		</ul>
	  </div>

	</nav>
	</header>