@extends('site.layouts.master')
@section('content')
    <section class="home-slider">
        <div id="slider">
            <div class="fullwidthbanner-container">
                <div id="revolution-slider">

                    @foreach($sliders as $slider)
                    <ul>
                        <li data-transition="random" data-slotamount="7" data-masterspeed="800">
                            <img src="{{ url('storage/uploads/sliders/') . '/' . $slider->image_name }}" alt="">
                            <div class="tp-caption sfr stt custom-font-1 tp-resizeme"
                                 data-x="right"
                                 data-hoffset="0"
                                 data-y="140"
                                 data-speed="400"
                                 data-start="700"
                                 data-easing="easeInOut">
                                {{$slider->translated()->title}}
                            </div>
                            <div class="tp-caption sfr stb custom-font-2 tp-resizeme"
                                 data-x="right"
                                 data-hoffset="0"
                                 data-y="290"
                                 data-speed="400"
                                 data-start="1000"
                                 data-easing="easeInOut">
                                 @foreach( explode("\n" , $slider->translated()->description) as $description)
                                    {{$description}}
                                 @endforeach
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div><!--End fullwidthbanner-container-->
        </div><!--End slider-->
    </section><!--End home-slider-->

    <div class="page-content">
        <section class="section-md about">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="section-img">
                            <img src="{{url('storage/uploads/about/') . '/' . $about->image_name}}" alt="about">
                        </div><!-- End Section-Img -->
                    </div><!-- End col -->
                    <div class="col-md-7">
                        <div class="section-head">
                            <h3 class="section-title">
                                من نحن
                            </h3>
                            {!!  $about->getDetails()->where(['about_id' => $about->id, 'lang' => app()->getLocale()])->first()->content !!}
                            <a href="{{ route('site.about') }}" class="more">
                                المزيد
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Section -->
        <section class="section-lg colored">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title">
                        خدمات العيادة
                    </h2>
                    @if(app()->getLocale() == 'ar')
                            {!! $static->where('flag', 'clinic_service_ar')->first()->content !!}
                        @else
                            {!! $static->where('flag', 'clinic_service_en')->first()->content !!}
                    @endif
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-md-4">
                                <div class="widget-box service">
                                    <div class="widget-box-img">
                                        <img src="{{  url('storage/uploads/services/') . '/' . $service->service_image_name}}" alt="...">
                                    </div><!--End Widget-box-img-->
                                    <a href="{{ route('site.single_service', ['slug' => $service->slug]) }}" class="widget-box-content">
                                        <div class="cont">
                                            <h3 class="title">
                                                {{ $service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->name }}
                                            </h3>
                                            <span class="icon">
                                                <img src="{{  url('storage/uploads/services/') . '/' . $service->icon_image_name}}" alt="...">
                                            </span>
                                            <p>
                                                {{ $service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->desc1 }}
                                            </p>
                                        </div><!--End cont-head-->
                                    </a><!--End Widegt-box-content-->
                                </div><!--End Widget-box-->
                            </div><!--End Col-md-4-->
                        @endforeach

                    </div><!--End Row-->
                </div><!--End Section-content-->
            </div><!--End Container-->
        </section><!--End Section-->
        <section class="section-lg">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title">
                        فريق الأطباء
                    </h2>
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {{ $static->where('flag', 'doctors_ar')->first()->content }}
                        @else
                            {{ $static->where('flag', 'doctors_en')->first()->content }}
                        @endif
                    </p>
                </div>
                <div class="section-content">
                    <div class="row">

                        @foreach($doctors as $doctor)
                            <div class="col-md-3 col-sm-6">
                                <div class="widget-box">
                                    <div class="widget-box-img">
                                        <img src="{{ url('storage/uploads/doctors/' . '/' . $doctor->image_name) }}" alt="...">
                                    </div><!--End Widget-box-img-->
                                    <div class="widget-box-content">
                                        <div class="cont">
                                            <h3 class="title">
                                                د/{{ $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => app()->getLocale()])->first()->name }}
                                            </h3>
                                            <span class="text">
                                                    {{ $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => app()->getLocale()])->first()->job_title }}
                                            </span>
                                        </div><!--End cont-head-->
                                    </div><!--End Widegt-box-content-->
                                </div><!--End Widget-box-->
                            </div><!--End Col-md-3-->
                        @endforeach

                    </div><!--End Row-->
                </div><!--End Section-content-->
            </div><!--End Container-->
        </section><!--End Section-->
        <section class="section-md testimonial">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title">
                        قصص النجــاح
                    </h2>
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $static->where('flag', 'success_ar')->first()->content !!}
                        @else
                            {!! $static->where('flag', 'success_en')->first()->content !!}
                        @endif
                    </p>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="slider-widget">
                                <div id="success-story" class="success-story carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($testimonials as $key => $value)
                                            <li data-target="#success-story" data-slide-to="{{$key}}" class="@if($key == 0){{'active'}}@endif" ></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($testimonials as $key => $value)
                                            <div class="item @if($key == 0) {{'active'}} @endif">
                                                <div class="caption">
                                                    <p>
                                                        {{  $value->getDetails()->where(['test_id' => $value->id, 'lang' => app()->getLocale()])->first()->description }}
                                                    </p>
                                                    <div class="Caption-owner">
                                                        <h3 class="title title-sm">
                                                            {{  $value->getDetails()->where(['test_id' => $value->id, 'lang' => app()->getLocale()])->first()->name }}
                                                        </h3>
                                                        <span>{{  $value->getDetails()->where(['test_id' => $value->id, 'lang' => app()->getLocale()])->first()->address }}</span>
                                                    </div><!-- End caption-Owner -->
                                                </div><!-- End Caption -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- End Slider Widget -->
                        </div><!-- End col -->
                        <div class="col-md-5">
                            <div class="section-img">
                                <img src="{{ asset('assets/site/images/png.png') }}" alt="">
                            </div><!-- End Section-Img -->
                        </div><!-- End col -->
                    </div><!-- End row -->

                </div><!-- End Section-Content -->
            </div><!-- End container -->
        </section><!-- End Section -->
        <section class="section-md contact-fix">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title">
                        تواصـــل معنــا
                    </h2>
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {{ $static->where('flag', 'contact_ar')->first()->content }}
                        @else
                            {{ $static->where('flag', 'contact_en')->first()->content }}
                        @endif
                    </p>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-7">
                            <div id="warna"></div>
                            <form class="form AddForm" action="{{ route('site.send_message') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="fname" class="form-control" placeholder="الاسم الاول">
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="lname" class="form-control" placeholder="الاسم الاخير">
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني">
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" name="phone" class="form-control" placeholder="رقم الهاتف">
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="اكتب رسالتك" rows="8"></textarea>
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="custom-btn">ارســــــــــــــال</button>
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </form>
                        </div><!-- End col -->
                        <div class="col-md-5">
                            <div class="map-wrap">
                                <div id="map"></div>
                            </div><!--End map-wrap-->
                        </div><!-- End col -->
                    </div><!-- End row -->
                </div><!-- End Section-Content -->
            </div><!-- End container -->
        </section><!-- End Section -->

    </div><!-- End Page-Content -->


@stop