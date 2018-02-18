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
                    <li><a href="{{ route('site.services') }}">خدمات العيادة</a></li>
                    <li class="active">{{ $service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->name }}</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    {{ $service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->name }}
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
        <section class="section-md contact-fix">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="service-detail">
                            <div class="service-img">
                                <img src="{{url('storage/uploads/services/' . '/' . $service->service_image_name)}}">
                            </div><!-- End Service-Img -->
                            <div class="service-content">
                                <div class="service-icon-box">
                                    <img src="{{url('storage/uploads/services/' . '/' . $service->icon_image_name)}}">
                                </div><!-- End Service-Icon-Box -->
                                <p>
                                {{ $service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->desc1 }}
                                </p>
                                <p>
                                {{ $service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->desc2 }}
                                </p>
                            </div><!-- End Service-Content -->
                            <div class="feature">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="feature-head">
                                            <h3 class="title title-md">
                                                مميزات {{$service->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->name}}
                                            </h3>
                                        </div><!-- End Feature-Head -->
                                        <ul class="feature-list">
                                            @foreach($all_features as $one_feature)
                                                <li>{{ $one_feature }}</li>
                                            @endforeach

                                        </ul><!-- End Feature-List -->
                                    </div><!-- End col -->
                                    <div class="col-md-6">
                                        <div class="service-video">
                                            <a href="{{ $service->link }}" data-type="prettyPhoto[gallery]" class="service-img">
                                                <img src="{{url('storage/uploads/services/' . '/' . $service->service_image_name)}}">
                                                <div class="video-icon"></div>
                                            </a>
                                        </div><!-- End Service-Video -->
                                    </div><!-- End col -->
                                </div><!-- End row -->

                            </div><!-- End Feature -->
                        </div><!-- End Service-Detail -->
                    </div><!-- End col -->
                    <div class="col-md-3 col-md-offset-1">
                        <aside>
                            <div class="aside-widget">
                                <div class="widget-title">
                                    <h3>الخدمات</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="toggle-container" id="sercices">
                                        @foreach($all_related as $related)
                                        <div class="panel">
                                            <a href="#item-1" data-toggle="collapse" data-parent="#sercices"  class="collapsed">
                                                <img src="{{asset('assets/site/images/services/item-1.jpg')}}" alt="">
                                                تركيب الاسنان
                                            </a>
                                            <div class="panel-collapse collapse" id="item-1">
                                                <div class="panel-content">
                                                    <p>
                                                        تقديم أفضل ماوصلت اليه التقنيه وتكنولوجيا المعلومات من تجهيزات عالية الجوده وتقديم الخدمات مابعد البيع والاستشارات والحلول والالتزام بالمشاركه والتطوير لمنشئاتكم وتقديم أفضل الأسعار بما يتناسب مع جميع فئات المجتمع
                                                    </p>
                                                </div><!-- end content -->
                                            </div><!--End panel-collapse-->
                                        </div><!--End Panel-->
                                        <div class="panel">
                                            <a href="#item-2" data-toggle="collapse" data-parent="#sercices" class="collapsed">
                                                <img src="{{ url('storage/uploads/services/' . '/' . $related->service_image_name) }}" alt="">
                                                {{ $related->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->name }}
                                            </a>
                                            <div class="panel-collapse collapse" id="item-2">
                                                <div class="panel-content">
                                                    <p>
                                                        {{ $related->getDetails()->where(['service_id' => $service->id, 'lang' => app()->getLocale()])->first()->desc1 }}
                                                    </p>
                                                </div><!-- end content -->
                                            </div><!--End panel-collapse-->
                                        </div><!--End Panel-->
                                        @endforeach

                                    </div><!--End toggle-container-->
                                </div><!--End widget-content-->
                            </div><!--End widget-->

                        </aside><!-- End Aside -->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Section -->
    </div><!-- End Page-Content -->
@stop