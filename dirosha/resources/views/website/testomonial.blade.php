


 <!-- Testimonials -->
 <section class="section-wrap bg-dark-overlay" style="background-image: url(images/bg.jpg);">
     <div class="container">
         <div class="title-row text-center">
             <p class="subtitle">Testimonials</p>
             <h2 class="section-title">What clients say about us</h2>
             <i class="quote">“</i>
         </div>

         <div class="slick-slider slick-testimonials">
             @foreach ($testimonial as $testimonialitem)

             <div class="testimonial clearfix">
                 <div class="testimonial__body">
                     <p class="testimonial__text">“{!! $testimonialitem->short_content !!}”</p>
                 </div>
                 <div class="testimonial__info">
                     {{-- <span class="testimonial__author">{{ $testimonialitem->caption }}</span> --}}
                     <span class="testimonial__company">{{ $testimonialitem->caption }}</span>
                 </div>
             </div>

             @endforeach



         </div> <!-- end slider -->

     </div>
 </section> <!-- end testimonials -->
