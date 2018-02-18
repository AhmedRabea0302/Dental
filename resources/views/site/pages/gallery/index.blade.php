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
                    <li class="active">معرض الصور</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    معرض الصور
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
        <section class="section-lg contact-fix gallery">
            <div class="container">
                <div class="section-head">
                    <ul class="mix-list">
                        <li class="active filter" data-filter="all">الكل</li>
                        @foreach($categories as $category)
                            <li class="filter" data-filter=".{{$category->translate()->name}}">{{$category->translate()->name}}</li>
                        @endforeach
                    </ul>
                </div><!--End Section-head-->
                <div class="section-content" id="gallery">
                    <div class="row">
                        @foreach($gallery as $image)
                        <div class="col-sm-4 mix {{$image->category->translate()->name}}">
                            <div class="gallery-item">
                                <div class="gallery-img">
                                    <a href="{{ asset('storage/uploads/gallery/'.$image->image_name) }}" class="image-corners">
                                        <img src="{{ asset('storage/uploads/gallery/'.$image->image_name) }}">
                                    </a>
                                </div><!-- End Block-Head -->
                            </div><!--End gallery-item-->
                        </div><!--End Col-md-4-->
                        @endforeach
                    </div><!--End Row-->
                </div><!--End Section-content-->
            </div><!--End Container-->
        </section><!--End Section-->
    </div><!-- End Page-Content -->
@stop