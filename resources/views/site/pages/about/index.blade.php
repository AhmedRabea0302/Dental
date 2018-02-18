@extends('site.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-header-img">
            <img src="{{ asset('assets/site/images/page-head.png') }}" alt="...">
        </div>
        <div class="container">
            <div class="breadcramb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li class="active">عن العيادة</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    عن العيادة
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
    <div class="page-content">
        <section class="section-md about style-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-head">
                            <h3 class="section-title">
                                من نحن
                            </h3>
                            {!! $about->getDetails()->where(['about_id' => 1, 'lang' => app()->getLocale()])->first()->content !!}
                            <a href="about.html" class="more">
                                المزيد
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div><!-- End col -->
                    <div class="col-md-6">
                        <div class="section-img">
                            <img src="{{ asset('storage/uploads/about' . '/' . $about->first()->image_name) }}" alt="about">
                        </div><!-- End Section-Img -->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Section -->
        <section class="section-lg colored">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title">
                        فريق الأطباء
                    </h2>
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $static->where('flag', 'doctors_ar')->first()->content !!}
                        @else
                            {!! $static->where('flag', 'doctors_en')->first()->content !!}
                        @endif
                    </p>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach($doctors as $doctor)
                            <div class="col-sm-4">
                                <div class="widget-box team-item" style="margin-top: 50px">
                                    <div class="widget-box-img">
                                        <img src="{{ url('storage/uploads/doctors' . '/'. $doctor->image_name) }}" alt="...">
                                    </div><!--End Widget-box-img-->
                                    <div class="widget-box-content">
                                        <div class="cont">
                                            <h3 class="title">
                                                د/ {{$doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => app()->getLocale()])->first()->name}}
                                            </h3>
                                            <span class="text">
                                                {{$doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => app()->getLocale()])->first()->job_title}}
                                                    </span>
                                            <ul class="social-list">
                                                <?php
                                                $doctor_links = $doctor->getLinks()->where('doctor_id', $doctor->id)->get();
                                                ?>

                                                @foreach($doctor_links as $one_doctor)
                                                    <li>
                                                        <a href="{{ $one_doctor->first()->link }}">
                                                            <i class="fa {{ $one_doctor->first()->icon }}"></i>
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul><!-- End Social-List -->
                                        </div><!--End cont-head-->
                                    </div><!--End Widegt-box-content-->
                                </div><!--End Widget-box-->
                            </div><!--End Col-md-3-->

                        @endforeach
                    </div><!--End Row-->
                </div><!--End Section-content-->
            </div><!--End Container-->
        </section><!--End Section-->
        <section class="section-lg testimonial style-2">
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
                        <div class="col-md-10">
                            <div id="owl-example" class="owl-carousel">
                                @foreach($testimonials as $testimonial)
                                    <div class="item">
                                    <div class="comment">
                                        <p>
                                            {{ $testimonial->getDetails()->where(['test_id' => $testimonial->id, 'lang' => app()->getLocale()])->first()->description }}                                        </p>

                                    </div><!-- End Comment -->
                                    <div class="owner-detail">
                                        <div class="owner-img">
                                            <img src="{{ asset('storage/uploads/testimonials/' . '/' . $testimonial->image_name) }}" alt="">
                                        </div><!-- End Owner-Img -->
                                        <div class="owner-info">
                                            <h3 class="title title-sm">{{ $testimonial->getDetails()->where(['test_id' => $testimonial->id, 'lang' => app()->getLocale()])->first()->name }}</h3>
                                            <span>{{ $testimonial->getDetails()->where(['test_id' => $testimonial->id, 'lang' => app()->getLocale()])->first()->address }}</span>
                                        </div><!-- End Owner-Info -->
                                        <i class="fa fa-quote-right"></i>
                                    </div><!-- End Owner-Detail -->
                                </div><!-- End Item -->
                                @endforeach
                            </div>
                        </div><!-- End col -->
                    </div><!-- End row --->
                </div><!-- End Section-Content -->
            </div><!-- End container -->
        </section><!-- End Section -->
    </div>
@stop