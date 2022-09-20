 <section class="testimonial-area">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-5">
                 <div class="news-title text-center mb-30">
                     <h3 class="title">What our client saying.</h3>
                 </div>
             </div>
         </div>
         <div class="row testimonial-active">
             @foreach ($testimonial as $testimonialitem)
                 <div class="col-lg-12 col-md-4">
                     <div class="testimonial-item text-center">
                         <p>{!! $testimonialitem->short_content !!}</p>
                         <h4 class="title">{{ $testimonialitem->caption }}</h4>
                         <img src="{{ $testimonialitem->banner_image }}" alt="testimonial">
                        <div class="icon">
                            <img src="/website/images/quote-icon.png" alt="">
                        </div>
                     </div>
                 </div>
             @endforeach


         </div>
     </div>
     <div class="testimonial-pattern">
         <img src="assets/images/testimonial-pattern.png" alt="">
     </div>
 </section>
