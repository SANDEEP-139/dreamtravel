<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- javascript -->

<div class="content-wrapper">
  
   <!-- BEGIN PAGE CONTAINER-->
   <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->
      <!-- END PAGE HEADER-->
      <!-- BEGIN ADVANCED TABLE widget-->
       <div class="row-fluid box breadtop">
      <div class="span12">
        <!-- BEGIN EXAMPLE TABLE widget-->
        <h4 class="page-title" style="text-align:center">Welcome To DREAM MY TRIP </h4>
		<h3 style="text-align:center">Last Login ----- <?php echo $this->session->userdata('lastlogin');?> </h3>
      </div>
    </div>
      
	  <div class="row">
         <div class="col-md-6">
 
<div class="chart-container">
    <div class="bar-chart-container">
      <canvas id="bar-chart"></canvas>
    </div>
  </div>
 
 <!-- javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script>
      $(function(){
      //get the bar chart canvas
	     var cData = `<?php  print_r($chart_data); ?>`;
      //var cData = `<?php echo $chart_data; ?>`;
	     var a= JSON.parse(cData);
	  
       var ctx = $("#bar-chart");
 
      //bar chart data
       var data = {
        labels: a.label,
        datasets: [
          {
            label: a.label,
            data: a.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Monthly Payment",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create bar Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });
 
   });
</script>  


            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
			</div>
			
<div class="col-md-6">
			<div class="chart-container">
           <div class="pie-chart-container">
           <canvas id="pie-chart1"></canvas>
          </div>
           </div>
			
</div>

 <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_dataa; ?>`);
      var ctx = $("#pie-chart1");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Last Week Registered Users -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script>  
<br><br>

       </div>
	   <br><br>
	   <div class="row">
	         <div class="col-md-6">
			<div class="chart-container">
           <div class="pie-chart-container">
           <canvas id="pie-chart12"></canvas>
          </div>
           </div>
			
</div>

 <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_dataaaa; ?>`);
      var ctx = $("#pie-chart12");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Last Week Contactus Detail -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script> 
			
	 <div class="col-md-6">
			<div class="chart-container">
           <div class="pie-chart-container">
           <canvas id="pie-chart123"></canvas>
          </div>
           </div>
			
</div>

 <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_dataservce; ?>`);
      var ctx = $("#pie-chart123");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Last Week Services Details -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script> 
	   </div>
         <!-- END PAGE CONTAINER-->
      </div>

    </div>
  