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
                    <li class="active">احجز موعد</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    احجز موعدك
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
        <section class="section-md contact-fix appointment-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div id="warna"></div>
                        <form class="form AddForm" action="{{ route('site.post_reserve') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="full_name" placeholder="الاسم كاملا">
                                    </div><!-- End Form-Group -->
                                </div><!-- End col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف">
                                    </div><!-- End Form-Group -->
                                </div><!-- End col -->
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني">
                                    </div><!-- End Form-Group -->
                                </div><!-- End col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="check-radio-item inline">
                                            <input type="radio" class="form-control" value="0" name="type" id="male">
                                            <label for="male">ذكر</label>
                                        </div>
                                        <div class="check-radio-item inline">
                                            <input type="radio" class="form-control" value="1" name="type" id="female">
                                            <label for="female">انثى</label>
                                        </div>
                                        <div class="check-radio-item inline">
                                            <input type="radio" class="form-control" value="2" name="type" id="child">
                                            <label for="child">طفل</label>
                                        </div>
                                    </div><!-- End Form-Group -->
                                </div><!-- End col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="date" placeholder="ميعاد الحجز">
                                    </div><!--End Form-group-->
                                </div><!--End Col-md-6-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="period" placeholder="وقت الحجز">
                                    </div><!--End Form-group-->
                                </div><!--End Col-md-6-->
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
                    <div class="col-md-3 section-img">
                        <img src="{{asset('assets/site/images/test.png')}}" alt="...">
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Section -->
    </div><!-- End Page-Content -->
@stop