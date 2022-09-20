@extends('layouts.master')
    @section("content")
        @include("website.navbar");
			<!--
			=====================================================
				Google Map
			=====================================================
			-->
			<!-- Google Map -->
			<div class="google-map-two"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14125.155085098644!2d85.32210214380835!3d27.739237847207164!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x65c05fa92a8f20c!2sTop%20Jobs%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1657012388129!5m2!1sen!2snp" width="100%" height="368px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>


			<!-- 
			=============================================
				Conatct us Section
			============================================== 
			-->
			<div class="contact-us-section section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>GET IN TOUCH</h2>
					</div> <!-- /.theme-title-one -->
					<div class="clearfix main-content no-gutters row">
						<div class="col-lg-5 col-12">
							<div class="form-data">
                          <h3>Contact Us</h3>
						  <ul>
							@if(isset($contacts))
							  <li class="form-Data-item mt-3">
                                     <span><i class="fa-solid fa-location-pin mt-4 mr-3"></i></span>
								<div>
									<h4>{{$contact->caption}}</h1>
						             <p>{{$contact->long_content}}</p>
								</div>
							  </li>
							@else
								<li class="form-Data-item mt-3">
                                     <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
								<div>
									<h4>Nepal</h1>
						             <p>Basundhara-03 , 01-5903103 , info@topjobsnepal.com</p>
								</div>
							  </li>
							@endif


						  </ul>

							</div>
						</div>
						<div class="col-lg-7 col-12">
							<div class="form-wrapper">
								<form action="{{route('contactstore')}}" method="POST" class="theme-form-one form-validation" autocomplete="on" enctype='multipart/form-data'>
									@csrf	
									<div class="row">
										<div class="col-sm-6 col-12"><input type="text" placeholder="Name *" name="name"></div>
										<div class="col-sm-6 col-12"><input type="text" placeholder="Phone *" name="number"></div>
										<div class="col-sm-6 col-12"><input type="email" placeholder="Email *" name="email"></div>
										<div class="col-sm-6 col-12"><input type="file" placeholder="Email *" name="file"></div>
										<input type="hidden" name="job_id" value="{{$job_slug}}">
										<div class="col-12"><textarea placeholder="Message" name="message"></textarea></div>

									</div> <!-- /.row -->
									<button class="theme-button-one">SEND MESSAGE</button>
								</form>
							</div> <!-- /.form-wrapper -->
						</div> <!-- /.col- -->
					</div> <!-- /.main-content -->
				</div> <!-- /.container -->

				<!--Contact Form Validation Markup -->
				<!-- Contact alert -->
				<div class="alert-wrapper" id="alert-success">
					<div id="success">
						<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						<div class="wrapper">
			               	<p>Your message was sent successfully.</p>
			             </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			    <div class="alert-wrapper" id="alert-error">
			        <div id="error">
			           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
			           	<div class="wrapper">
			               	<p>Sorry!Something Went Wrong.</p>
			            </div>
			        </div>
			    </div> <!-- End of .alert_wrapper -->
			</div> <!-- /.contact-us-section -->
   @include("website.company_partner")
    @endsection
    

