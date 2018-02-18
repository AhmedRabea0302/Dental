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
                    <li class="active">المدونة</li>
                </ol>
            </div><!--End Breadcamp-->
            <div class="page-title">
                <h2 class="title">
                    المدونة
                </h2>
            </div>
        </div><!--End Container-->
    </div><!-- End page-header -->
    <div class="page-content">
        <section class="section-lg contact-fix">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title">
                        مقالات العيادة
                    </h2>
                    <p>
                        @if(app()->getLocale() == 'ar')
                            {!! $static->where('flag', 'clinic_blogs_ar')->first()->content !!}
                        @else
                            {!! $static->where('flag', 'clinic_blogs_en')->first()->content !!}
                        @endif                    </p>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach($blogs as $blog)

                            <div class="col-sm-4">
                            <div class="blog-item">
                                <div class="blog-item-img">
                                    <img src="{{ url('storage/uploads/blogs/' . '/' . $blog->image_name) }}" alt="...">
                                    <div class="blog-item-hover">
                                        <a href="{{ route('site.get_blog', ['slug' => $blog->slug]) }}" class="">
                                            اقرأ المزيد <i class="fa fa-angle-left"></i>
                                        </a>
                                    </div><!--End Blog-item-hover-->
                                </div><!--End Widget-box-img-->
                                <div class="blog-item-content">
                                    <div class="blog-info">
                                        <h3 class="text">
                                            <span>بواسطة</span>
                                            <span>{{ $blog->user()->first()->username }}</span>
                                            <span>{{ $blog->created_at->format('d/m/y') }}</span>
                                        </h3>
                                    </div><!--End cont-head-->
                                    <h2 class="title">
                                        {{ $blog->getDetails()->where(['blog_id' => $blog->id, 'lang' => app()->getLocale()])->first()->title }}
                                    </h2>
                                    <p>
                                        {{ substr($blog->getDetails()->where(['blog_id' => $blog->id, 'lang' => app()->getLocale()])->first()->description, 0, 200) }} ...
                                    </p>
                                </div><!--End Widegt-box-content-->
                            </div><!--End Widget-box-->
                        </div><!--End Col-md-4-->

                        @endforeach
                    </div><!--End Row-->
                    <div class="page-pager">
                        <nav aria-label="...">
                            {{$blogs->links()}}
                        </nav>
                    </div><!--End Pager-->
                </div><!--End Section-content-->
            </div><!--End Container-->
        </section><!--End Section-->
    </div><!-- End Page-Content -->
@stop