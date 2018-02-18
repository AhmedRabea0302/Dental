@extends('site.layouts.master')
@section('content')
    <div style="width: 100%">
        @if(empty($blogs))
            <div>
                <h3 class="text-center" style="padding: 100px;font-weight: lighter; color: #f16528">No Results For This Search</h3>
            </div>
        @else
            <div class="section-content">
                <div class="row">
                    @foreach($blogs as $blog)

                        <div class="col-sm-4">
                            <div class="blog-item">
                                <div class="blog-item-img">
                                    <img src="{{ url('storage/uploads/blogs/'. $blog->blog['image_name']) }}" alt="...">
                                    <div class="blog-item-hover">
                                        <a href="{{ route('site.get_blog', ['slug' => $blog->blog['slug']]) }}" class="">
                                            اقرأ المزيد <i class="fa fa-angle-left"></i>
                                        </a>
                                    </div><!--End Blog-item-hover-->
                                </div><!--End Widget-box-img-->
                                <div class="blog-item-content">
                                    <div class="blog-info">
                                        <h3 class="text">
                                            <span>بواسطة</span>
                                            <span>{{$blog->blog->user['username']}}</span>
                                            <span>{{ $blog->created_at->format('d/m/y') }}</span>
                                        </h3>
                                    </div><!--End cont-head-->
                                    <h2 class="title">
                                        {{$blog->title}}
                                    </h2>
                                    <p>
                                        {!! substr($blog->description , 100) !!}
                                    </p>
                                </div><!--End Widegt-box-content-->
                            </div><!--End Widget-box-->
                        </div><!--End Col-md-4-->

                    @endforeach
                </div><!--End Row-->
                <div class="page-pager">
                    <nav aria-label="...">
                        {{--{{$blogs->links()}}--}}
                    </nav>
                </div><!--End Pager-->
            </div><!--End Section-content-->
    </div><!--End Container-->
    </section><!--End Section-->
    </div><!-- End Page-Content -->
        @endif
    </div>
@stop
