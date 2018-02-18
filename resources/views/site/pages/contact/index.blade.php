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
                    <li class="active">اتصل بنا</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    اتصل بنا
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
        <section class="section-md contact-fix contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="section-head">
                            <h2 class="section-title">
                                تواصـــل معنــا
                            </h2>
                            <p>

                                @if(app()->getLocale() == 'ar')
                                {!! $static->where('flag', 'contact_ar')->first()->content !!}
                                @else
                                {!! $static->where('flag', 'contact_en')->first()->content !!}
                                @endif
                            </p>
                        </div>
                        <form class="form AddForm" method="post" action="{{ route('site.send_message') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div id="warna"></div>
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
                                        <textarea name="message" class="form-control" placeholder="اكتب رسالتك" rows="8"></textarea>
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
            </div><!-- End container -->
        </section><!-- End Section -->
    </div><!-- End Page-Content -->
@stop
