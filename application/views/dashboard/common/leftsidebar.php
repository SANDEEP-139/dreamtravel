
	<!-- Section sidebar -->
	<div class="section section--sidebar" id="sidebar">
	
			<nav class="sidebar-menu"> 
				<ul>
					<li class="dashboard"><a href="dashboard.html"><b>Dashboard</b></a></li>
					<li class="components has-submenu"><a href="#"><b>Components<span class="submenu-arrow"></span></b></a>
						<ul class="sidebar-menu__submenu">
							<li><a href="dashboard__grid.html">Grid</a></li>	
							<li><a href="dashboard__charts.html">Charts</a></li>
							<li><a href="dashboard__forms.html">Forms</a></li>
							<li><a href="dashboard__tabs.html">Tabs</a></li>
							<li><a href="dashboard__toggles.html">Toggles</a></li>
							<li><a href="dashboard__tables.html">Tables</a></li>
							<li><a href="dashboard__typography.html">Typography</a></li>
						</ul>
					</li>
					<li class="appointment"><a href="dashboard__appointments.html"><b>Appointments</b></a></li>
					<li class="doctors has-submenu"><a href="#"><b>Doctors<span class="submenu-arrow"></span></b></a>
						<ul class="sidebar-menu__submenu">
							<li><a href="dashboard__doctors-add.html">Add new doctor</a></li>
							<li><a href="dashboard__doctors.html">View all doctors</a></li>
						</ul>
					</li>
					<li class="patients has-submenu"><a href="#"><b>Patients<span class="submenu-arrow"></span></b></a>
						<ul class="sidebar-menu__submenu">
							<li><a href="dashboard__patients-add.html">Add new patient</a></li>
							<li><a href="dashboard__patients.html">View all patients</a></li>
							<li><a href="dashboard__patient.html">Patient profile</a></li>
						</ul>
					</li>		
					<li class="inbox"><a href="dashboard__messages.html"><b>Messages<span class="submenu-bubble">3</span></b></a></li>
					<li class="settings"><a href="#"><b>Settings</b></a></li>
				</ul>
			</nav>
	
	</div>
	
	<!-- Section sidebar -->
	<div class="section section--content" id="content">
		<header class="content-header">
		
			<div class="sidebar-resize"></div>
			<div class="mobile-menu"><div class="st-burger-icon st-burger-icon--medium"><span></span></div></div>
			
			<div class="content-header__user content-header__dropdown">  
			    <div class="content-header__user-avatar content-header__dropdown-activate" data-dropdown="userdropdown">
					<div class="content-header__user-thumb"><img src="images/avatar-2.jpg" alt="" title=""/></div>
					<span class="content-header__user-name">Nathalie Roberts</span>
			    </div>  
				<nav class="dropdown-menu dropdown-menu--header dropdown-menu--user-menu " id="userdropdown"> 	
				<h3 class="dropdown-menu__subtitle">User menu</h3>
				<ul>   
				    <li><a href="#">My profile</a></li>
				    <li><a href="#">Activity</a></li>
				    <li><a href="#">Switch account</a></li>
				    <li><a href="#">Support</a></li>
				    <li class="logout"><a href="#" class="button button--general button--red-border">Logout</a></li>
				</ul>
				</nav>
			</div>
			
			<div class="content-header__notifications content-header__dropdown">  
			    <div class="content-header__notifications-icon content-header__icon content-header__dropdown-activate" data-dropdown="notificationsdropdown">
					<img src="images/icons/icons-24-gray/notifications.png" alt="" title=""/>
					<span class="content-header__icon-bubble">6</span>
				</div>  
				<nav class="dropdown-menu dropdown-menu--header dropdown-menu--notifications-menu" id="notificationsdropdown"> 			
				<h3 class="dropdown-menu__subtitle">You have <strong>6</strong> notifications</h3>
				<ul>    
					<li class="d-flex justify-sb"><span class="important">IMPORTANT</span>Michael D. kidney surgery <b class="task-time">today</b></li>
					<li class="d-flex justify-sb"><span class="important">IMPORTANT</span>FLU Alert report generated <b class="task-time">today</b></li>
					
					<li class="d-flex justify-sb"><span>Meeting with <strong>Dr. Joshua</strong> </span> <b class="task-time">tomorrow</b></li>
					<li class="d-flex justify-sb"><span>Remember to create prescriptions for <strong>Alexander P.</strong></span> <b class="task-time">tomorrow</b></li>
					<li class="d-flex justify-sb"><span><strong>Jada Sacks</strong> canceled the appointment at Cardiology, Dr. Michael V. </span> <b class="task-time">24 jan, 19</b></li>
					<li class="d-flex justify-sb"><span>Sarah D. registered as new patient of <strong>Dr. George</strong> at Dermatology </span> <b class="task-time">28 jan, 19</b></li>
					<li class="view-all"><a href="#" class="button button--general button--blue-border">View all</a></li>
				</ul>
				</nav>
			</div>
			
			<div class="content-header__quicklinks content-header__dropdown">  
			        <div class="content-header__quicklinks-icon content-header__icon content-header__dropdown-activate" data-dropdown="quicklinksdropdown">
					<img src="images/icons/icons-24-gray/submenu.png" alt="" title=""/>
				</div>  
				<nav class="dropdown-menu dropdown-menu--header dropdown-menu--quicklinks-menu" id="quicklinksdropdown"> 	
				<h3 class="dropdown-menu__subtitle">Quick links</h3>				
				<ul>
				        <li><a href="#">Add new doctor</a></li>
					<li><a href="#">Add new patient</a></li>
					<li><a href="#">Generate reports</a></li>
				</ul>
				</nav>
			</div>