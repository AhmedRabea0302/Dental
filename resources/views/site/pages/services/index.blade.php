@extends('site.layouts.master')
@section('content')
    <div class="page-header">
        <div class="page-header-img">
            <img src="{{asset('assets/site/images/page-head.png')}}" alt="...">
        </div>
        <div class="container">
            <div class="breadcramb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                    <li class="active">خدمات العيادة</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    خدمات العيادة
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
        <section class="section-lg services">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="content-head">
                                <h2 class="content-title">
                                    @if(app()->getLocale() == 'ar')
                                        {!! $static->where('flag', 'service_page_ar')->first()->content !!}
                                    @else
                                        {!! $static->where('flag', 'service_page_en')->first()->content !!}
                                    @endif
                                </h2>
                                @if(app()->getLocale() == 'ar')
                                    {!! $static->where('flag', 'service_page_para_ar')->first()->content !!}
                                @else
                                    {!! $static->where('flag', 'service_page_para_en')->first()->content !!}
                                @endif
                            </div>
                            <div class="content-body">
                                <div class="row">
                                    @foreach($features as $feature)
                                    <div class="col-md-6">
                                        <div class="widget-icon">
                                            <div class="widget-icon-head">
                                                <img src="{{url('storage/uploads/features') . '/' . $feature->image_name}}" alt="...">
                                            </div><!--End Widget-icon-head-->
                                            <div class="widget-icon-cont">
                                                <P>
                                                    {{ $feature->getDetails()->where(['feature_id' => $feature->id, 'lang' => app()->getLocale()])->first()->title }}
                                                </P>
                                            </div><!--End Widget-icon-cont-->
                                        </div><!--End Widget-icon-->
                                    </div><!--End Col-md-6-->
                                    @endforeach

                                </div><!--End Row-->
                            </div>
                        </div><!--End Col-md-6-->
                        <div class="col-md-4 section-img">
                            <img src="{{asset('assets/site/images/services/service-sec-3.png') }}" alt="...">
                        </div><!--End Col-md-6-->
                    </div><!--End Row-->
                </div><!--End Section-content-->
            </div><!--End Container-->
        </section><!--End Section-->
        <section class="section-lg colored contact-fix">
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
                                                        <img src="{{  url('storage/uploads/services/'.$service->icon_image_name) }}" alt="...">
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

            </div><!-- End container -->
        </section><!-- End Section -->
    </div><!-- End Page-Content -->
@stop