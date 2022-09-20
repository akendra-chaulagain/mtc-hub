@extends('layouts.master')
@section('content')
    {{-- <div class="google-map-two"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14125.155085098644!2d85.32210214380835!3d27.739237847207164!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x65c05fa92a8f20c!2sTop%20Jobs%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1657012388129!5m2!1sen!2snp" width="100%" height="368px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>


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
							
								@if (isset($contacts))
								@foreach ($contacts as $contact)
									<div class="info-box">
									<h6>{{$contact->caption}}</h6>
									 @php echo $contact->long_content ; @endphp
									</div>
								@endforeach
								@else
									<h6>Nepal</h6>
								<ul>
									<li>
										<i class="flaticon-direction-signs"></i>
										Basundhara-03 Kathmandu Nepal
									</li>
									<li>
										<i class="flaticon-multimedia-1"></i>
										<a href="mailto:roshan@topjobsnepal.com">roshan@topjobsnepal.com</a>
									</li>
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<a href="tel:015903103">01-5903103 </a> / <a href="tel:015903102">5903102</a>
									</li>
								</ul>
								</div>
								@endif
							
						</div>
						<div class="col-lg-7 col-12">
							<div class="form-wrapper">
								<form action="{{route('contactstore')}}" method="POST" class="theme-form-one form-validation" autocomplete="on" enctype='multipart/form-data'>
									@csrf	
									<div class="row">
										<div class="col-sm-6 col-12"><input type="text" placeholder="Name *" name="name" required></div>
										<div class="col-sm-6 col-12"><input type="number" placeholder="Phone *" name="number" required></div>
										<div class="col-sm-6 col-12"><input type="email" placeholder="Email *" name="email"></div>
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
			</div> <!-- /.contact-us-section --> --}}







    <div class="page-title-area bg_cover"
        style="background-image: url(https://images.pexels.com/photos/609768/pexels-photo-609768.jpeg?auto=compress&cs=tinysrgb&w=1600);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <h3 class="title">Contact</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== CONTACT INFO PART START ======-->

    <section class="contact-info-area">
        <div class="container">
            <div class="contact-info">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="write-massage-area">
                            <div class="write-massage-content">
                                <div class="write-massage-title">
                                    <h3 class="title">Feel free to get in touch with us.</h3>
                                </div>
                                <div class="write-massage-input">
                                    <form action="{{ route('contactstore') }}" method="POST" autocomplete="on"
                                        enctype='multipart/form-data'>
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="text" name="name" placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="text" name="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="number" name="number" placeholder="Phone" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box mt-10">
                                                    <input type="text" name="apply_for" placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="input-box mt-10">
                                                    <textarea name="message" id="#" cols="30" rows="10" placeholder="Message"></textarea>
                                                    <button class="main-btn main-btn-2">Send message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-info-content">
                            <h3 class="title">Contact info.</h3>
                            <ul>
                                <li><i class="flaticon-placeholder"></i> <strong>Registered Address:</strong>  {{ $global_setting->website_full_address }}
                                        </li>
                                <li><i class="flaticon-placeholder"></i> <strong>Corporate Address:</strong> {{ $global_setting->address_ne }}</li>

                                <li><i class="flaticon-message"></i> <a href="{{ $global_setting->site_email }}">{{ $global_setting->site_email }}</a> 
                                    {{-- <a href="mailto:mtchub@gmail.com"> mtchub@gmail.com</a> --}}
                                </li>

                                <li><i class="flaticon-phone-call"></i> <a href="{{ $global_setting->phone }}">{{ $global_setting->phone }}</a> / <a
                                        href="tel:{{ $global_setting->phone_ne }}">{{ $global_setting->phone_ne }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        




    </section>
@endsection
