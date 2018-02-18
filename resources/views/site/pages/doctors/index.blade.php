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
                    <li class="active">فريق العمل</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    فريق دينتال
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
        <section class="section-lg contact-fix">
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
    </div><!-- End Page-Content -->
@stop