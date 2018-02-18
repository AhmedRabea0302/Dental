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
        <section class="section-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-post">
                            <div class="Blog-post-head">
                                <h3 class="title title-md">
                                    {{  $blog->getDetails()->where(['blog_id' => $blog->id, 'lang' => app()->getLocale()])->first()->title }}
                                </h3>
                                <div class="blog-post-info">
                                    <div class="blog-post-img">
                                        <img src="{{ url('storage/uploads/blogs/' . '/' . $blog->image_name) }}" alt="blog-img">
                                    </div><!-- End Blog-Post-Img -->
                                    <div class="blog-post-detail">
                                        <p>
                                            بواسطة <span>{{$blog->user()->first()->username}}</span> - {{ $blog->created_at->format('d/m/y') }}
                                        </p>
                                        <ul class="icons">
                                            <li>
                                                <p>12</p>
                                                <i class="fa fa-eye"></i>
                                            </li>
                                            <li>
                                                <p>15</p>
                                                <i class="fa fa-comment"></i>
                                            </li>
                                        </ul><!-- End Icons -->
                                    </div><!-- End Blog-Post-Detail -->

                                </div><!-- End Blog-Post-Info -->
                            </div><!-- End Blog-Post-Head -->
                            <div class="blog-post-content">
                                <p> {{  $blog->getDetails()->where(['blog_id' => $blog->id, 'lang' => app()->getLocale()])->first()->description }} </p>

                                <ul class="share-icon a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <li>
                                        <a class="a2a_dd" href="https://www.addtoany.com/share">
                                            <i class="fa fa-share-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="a2a_button_facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="a2a_button_twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="a2a_button_google_plus">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                </ul><!-- End Share-Icon -->
                            </div><!-- End Blog-Post-content -->
                        </div><!-- End Blog-Post -->
                        <div class="blog-post-comments">
                            <div class="blog-comments-title">
                                <h3 class="title title-md">التعليقات</h3>
                            </div><!-- End Blog-Comments-title -->
                            <div class="comment" id="comment">
                                @include('site.pages.blog.comment')
                            </div><!-- End Comments -->

                        </div><!-- End Blog-Post-Comments -->
                        <div class="write-comment">
                            <div class="blog-comments-title">
                                <h3 class="title title-md">اضافة تعليق</h3>
                            </div><!-- End Blog-Comments-title -->
                            <form class="form" id="comment-form" method="post" action="{{ route('site.blog_add_comment', ['id' => $blog->id]) }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="الاسم">
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني">
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="اكتب رسالتك" rows="8"></textarea>
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="custom-btn">أضف تعليق</button>
                                        </div><!-- End Form-Group -->
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </form><!-- End form -->
                        </div><!-- End Write-Comment -->
                    </div><!-- End col -->
                    <div class="col-md-3 col-md-offset-1">
                        <aside>
                            <div class="aside-widget">
                                <div class="widget-title">
                                    <h3>البحث</h3>
                                </div>
                                <div class="widget-content">
                                    <form class="search-form" method="GET" action="{{ route('site.blog_search') }}">
                                        {{ csrf_field() }}
                                        <input type="text" class="form-control" name="search" placeholder="اكتب ما تبحث عنه...">
                                    </form><!-- End Search-Widget -->
                                </div><!--End widget-content-->
                            </div><!--End widget-->
                            <div class="aside-widget">
                                <div class="widget-title">
                                    <h3>اخر الاخبار</h3>
                                </div>
                                <div class="widget-content " >
                                    <ul class="recent-list">
                                        @foreach($latest_blogs as $latest)
                                            <li>
                                                <div class="recent-item-img">
                                                    <img src="{{ url('storage/uploads/blogs' . '/' . $latest->image_name) }}">
                                                </div><!-- End Recent-Item -->
                                                <div class="recent-item-content">
                                                    <a href="{{ route('site.get_blog', ['slug' =>  $latest->slug]) }}">
                                                        {{ $latest->translate()->title }}
                                                    </a>
                                                    <span class="blog-date">
{{ $latest->created_at->format('y, d M') }}
                                                                </span>
                                                </div><!-- End Recent-Content -->
                                            </li>
                                        @endforeach

                                    </ul><!-- End Recent-List -->
                                </div><!--End widget-content-->
                            </div><!--End widget-->
                            <div class="aside-widget">
                                <div class="widget-title">
                                    <h3>الموضوعات</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="categories-list">
                                        @foreach($blogs as $blog)
                                            <li>
                                                <a href="{{ route('site.get_blog', ['slug' =>  $blog->slug]) }}" >
{{ $blog->getDetails()->where(['blog_id' => $blog->id, 'lang' => app()->getLocale()])->first()->title }}
                                                    <span>{{  $blog->created_at->format('d') }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul><!-- End Categories-List -->
                                </div><!--End widget-content-->
                            </div><!--End widget-->
                        </aside><!-- End Aside -->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End container -->
        </section><!-- End Section -->
    </div><!-- End Page-Content -->
@endsection