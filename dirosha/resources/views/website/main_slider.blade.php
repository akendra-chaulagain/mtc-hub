

<div class="rev_slider_wrapper">
    <div class="rev_slider" id="slider-1" data-version="5.0">
        <ul>
            @foreach ($sliders as $slider)
                <!-- SLIDE 1 -->
                <li data-fstransition="fade" data-transition="fade" data-easein="default" data-easeout="default"
                    data-slotamount="1" data-masterspeed="1200" data-delay="8000" data-title="Dirosa">
                    <!-- MAIN IMAGE -->
                    <img src="/dirosha/{{ $slider->banner_image }}" alt="" data-bgrepeat="no-repeat" data-bgfit="cover"
                        data-bgparallax="7" class="rev-slidebg">

                    <!-- HERO TITLE -->
                    <div class="tp-caption hero-text" data-x="30" data-y="center"
                        data-voffset="[-140,-120,-100,-180]" data-fontsize="[72,62,52,46]"
                        data-lineheight="[72,62,52,46]" data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
									"delay":1000,
									"speed":900,
									"frame":"0",
									"from":"y:150px;opacity:0;",
									"ease":"Power3.easeOut",
									"to":"o:1;"
									},{
									"delay":"wait",
									"speed":1000,
									"frame":"999",
									"to":"opacity:0;","ease":"Power3.easeOut"
								}]'
                        data-splitout="none">{{ $slider->caption ?? " " }}e<span class="hero-dot">.</span>
                    </div>

                    <!-- HERO SUBTITLE -->
                    <div class="tp-caption small-text" data-x="30" data-y="center" data-voffset="[-40,-30,-20,0]"
                        data-fontsize="[21,21,21,21]" data-lineheight="34" data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
									"delay":1100,
									"speed":900,
									"frame":"0",
									"from":"y:150px;opacity:0;",
									"ease":"Power3.easeOut",
									"to":"o:1;"
									},{
									"delay":"wait",
									"speed":1000,
									"frame":"999",
									"to":"opacity:0;","ease":"Power3.easeOut"
								}]'>
                        {!! $slider->short_content ?? " " !!}
                    </div>

                </li> 
            @endforeach




        </ul>
    </div>
</div>


