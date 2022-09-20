 <section class="product-box-area">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-5">
                 <div class="news-title text-center">
                     <h3 class="title">Our best product.</h3>
                 </div>
             </div>
         </div>
         <div class="row product-box-active">
             @foreach ($home_best_products as $home_productitem)
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <a href="/our-products/{{  $home_productitem->nav_name }}">
                         <div class="single-product mt-30">
                             @if ($home_productitem->banner_image)
                                 <img src="{{ $home_productitem->banner_image }}">
                             @else
                                 <img src="/website/defaultproduct.jpg">
                             @endif
                             <h4 class="title">{{ $home_productitem->caption }}</h4>
                         </div>
                     </a>
                 </div>
             @endforeach

         </div>


     </div>
     {{-- <div class="row justify-content-center text-center">
         <div class="col-lg-5">
             <a class="main-btn main-btn-2" href="item-list.html">View All</a>
         </div>
     </div> --}}
     </div>
 </section>
