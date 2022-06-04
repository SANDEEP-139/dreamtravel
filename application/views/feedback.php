<section>
		<div class="rows inner_banner inner_banner_2">
			<div class="container">
				<h2><span>Feedback -</span></h2>
				<ul>
					<li><a href="#inner-page-title">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="#inner-page-title" class="bread-acti">Feedback</a>
					</li>
				</ul>
				
			</div>
		</div>
	</section>
	
	<style>
	    .aapp {
    padding: 20px;
    box-shadow: 0px 0px 4px 0px !important;
}
.wpcf7-form-control-wrap {
    padding: 10px 20px;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    -o-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
    text-align: left;
    width: 100%;
    display: block;
    background: #f2f2f2;
    border: 1px solid #e3e3e3;
    border-radius: 0;
    height: 45px;
    line-height: 21px;
    margin-bottom: 10px;
    -webkit-appearance: none;
    -moz-appearance: none;
}
.question h4 {
    text-transform: uppercase;
    border-bottom: 1px solid #E8E8E8;
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-weight: 700;
}



.rate-area:not(:checked) > input {
	position: absolute;
	top: -9999px;
	clip: rect(0, 0, 0, 0);
}

.rate-area:not(:checked) > label {
	float: left;
	width: 0.8em;
	overflow: hidden;
	white-space: nowrap;
	cursor: pointer;
	font-size: 180%;
	color: lightgrey;
}

.rate-area:not(:checked) > label:before {
	content: "★";
}

.rate-area > input:checked ~ label {
	color: gold;
}

.rate-area:not(:checked) > label:hover,
.rate-area:not(:checked) > label:hover ~ label {
	color: gold;
}

.rate-area > input:checked + label:hover,
.rate-area > input:checked + label:hover ~ label,
.rate-area > input:checked ~ label:hover,
.rate-area > input:checked ~ label:hover ~ label,
.rate-area > label:hover ~ input:checked ~ label {
	color: gold;
}


 

</style>
	<section>
	    <div class="container">
	    	 
	        <div class="row aapp">
	             <div class="col-md-12">
	             	<div class="question">
            <h4>Feedback Form</h4>
        </div>
	                 <div class="feedback">
	                      <form method="post" action="<?php echo base_url('home/feedbackme')?>">
  <div class="form-row">
       <div class="form-group col-md-6">
      <label for="inputEmail4">Full Name</label>
      <input type="text" class="form-control wpcf7-form-control-wrap" name="name" id="inputFull" placeholder="Full Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control wpcf7-form-control-wrap" name="email" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputContact">Contact Number</label>
      <input type="number" class="form-control wpcf7-form-control-wrap" name="phone" id="inputContact" placeholder="Contact Number" required>
    </div>
     <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control wpcf7-form-control-wrap"  name="city" id="inputCity" placeholder="City" required>
    </div>
     <div class="form-group col-md-6">
      <label for="inputCode">Pin Code</label>
      <input type="text" class="form-control wpcf7-form-control-wrap" name="pincode"  id="inputCity" placeholder="Pin Code" required>
    </div>
    <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control wpcf7-form-control-wrap" id="inputAddress" name="address" placeholder="Address" required>
  </div>
    <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1"> Describe Your Feedback </label>
    <textarea class="form-control wpcf7-form-control-wrap" id="exampleFormControlTextarea1" required rows="3" placeholder="Describe Your Feedback"></textarea>
  </div>
  
   <div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1"> Rating </label>
    <ul class="rate-area">

	<input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>
	<input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>
	<input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>
	<input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>
	<input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>
</ul>
  </div>

 
  </div>
  
 <br>
 <br>
 <br>
 <br>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	                 </div>
	             </div>
	        </div>
	    </div>
	</section>
	