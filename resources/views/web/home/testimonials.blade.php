{{--<section class="ptb80 custom-ptb-60" id="testimonials">--}}
{{--    <div class="container-fluid">--}}
{{--        <!-- Section Title -->--}}
{{--        <div class="section-title custom-pb-40">--}}
{{--            <h2 class="text-white text-center">{{ __('web.home_menu.testimonials') }}</h2>--}}
{{--        </div>--}}
{{--        <!-- Start of Owl Slider -->--}}
{{--        <div class="owl-carousel testimonial">--}}
{{--            <!-- Start of Slide item -->--}}
{{--            @foreach($testimonials as $testimonial)--}}
{{--                <div class="item">--}}
{{--                    <div class="review line-break">--}}
{{--                        <blockquote>{!! !empty(nl2br($testimonial->description))?nl2br($testimonial->description) : __('messages.common.n/a') !!}  </blockquote>--}}
{{--                    </div>--}}
{{--                    <div class="customer">--}}
{{--                        @if(!empty($testimonial->customer_image_url))--}}
{{--                            <img src="{{ $testimonial->customer_image_url }}" class="web-testimonial-customer-img image-stretching"--}}
{{--                                 alt="">--}}
{{--                        @else--}}
{{--                            <img src="{{ asset('assets/img/infyom-logo.png') }}"--}}
{{--                                 class="web-testimonial-customer-img thumbnail-preview" alt="">--}}
{{--                        @endif--}}
{{--                        <h4 class="uppercase pt20">{{ html_entity_decode($testimonial->customer_name) }}</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--        @endforeach--}}
{{--        <!-- End Slide item -->--}}
{{--        </div>--}}
{{--        <!-- End of Owl Slider -->--}}
{{--    </div>--}}
{{--</section>--}}

<section class="testimonial-section-two">
    <div class="container-fluid">
        <div class="testimonial-left"><img src="{{asset('web_front/images/resource/testimonial-left.png')}}" alt="">
        </div>
        <div class="testimonial-right"><img src="{{asset('web_front/images/resource/testimonial-right.png')}}" alt="">
        </div>
        <!-- Sec Title -->
        <div class="sec-title text-center">
            <h2>{{ __('web.home_menu.testimonials') }}</h2>
            {{--            <div class="text">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor</div>--}}
        </div>

        <div class="carousel-outer wow fadeInUp">
            <!-- Testimonial Carousel -->
            <div class="testimonial-carousel owl-carousel owl-theme">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-block-two">
                    <div class="inner-box touch-none">
                        <div class="thumb"><img class="home-banner h-100 w-100"
                                                src="{{ isset($testimonial->customer_image_url)? $testimonial->customer_image_url:asset('assets/img/infyom-logo.png') }}"
                                                alt=""></div>
                        <h4 class="title">Great quality!</h4>
                        <div class="text">{!! !empty(nl2br($testimonial->description))?nl2br($testimonial->description) : __('messages.common.n/a') !!}</div>
                        <div class="info-box">
                            <h4 class="name">{{ html_entity_decode($testimonial->customer_name) }}</h4>
                            {{--                            <span class="designation">Web Developer</span>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</section>
