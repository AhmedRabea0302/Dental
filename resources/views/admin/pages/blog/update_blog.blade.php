@extends('admin.layouts.master')
@section('content')
    <Style>
        th, td {
            text-align: center;
            padding: 15px;
        }
        .form-group {
            padding: 10px;
        }
    </Style>
    <div class="row">
        <div class="col-md-12">
            <div class="alert " id="warna">

            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل مدونة</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.post_update_blog', ['id' => $blog->id])}}" onsubmit="return false;" method="post" class="form-horizontal " enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-8">
                                    <div>
                                        <label class="lead"></label>
                                    </div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 450px; height: 250px;
                                          background: #32c5d2;
                                          background: -webkit-linear-gradient(-90deg, #32c5d2 , #e1edef);
                                          background: -o-linear-gradient(-90deg, #32c5d2, #e1edef);
                                          background: -moz-linear-gradient(-90deg, #32c5d2, #e1edef);
                                        ">
                                            <img style="width: 100%; height: 100%;" src="{{url('storage/uploads/blogs' . '/' . $blog->image_name)}}">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> {{ trans('trans.select_image') }} </span>
                                            <span class="fileinput-exists"> {{ trans('trans.change') }} </span>
                                            <input type="file" name="image_name">
                                        </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('trans.remove') }} </a>
                                        </div>
                                    </div>
                                </div><!--End Col-->
                                <span class="help-block"></span>
                            </div><!--End form-group-->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">عنوان المدونة (إنجليزي)</label>
                                    <input type="text" class="form-control" name="blog_title_en" value="{{$blog->getDetails()->where(['lang' => 'en', 'blog_id' => $blog->id])->first()->title}}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="lead">عنوان المدونة (عربي)</label>
                                    <input type="text" class="form-control" name="blog_title_ar" value="{{$blog->getDetails()->where(['lang' => 'ar', 'blog_id' => $blog->id])->first()->title}}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead label-control">الكلمات الدلالية (إنجليزي)</label>
                                    <input type="text" class="form-control" name="blog_keywords_en" data-role="tagsinput" value="{{$blog->getDetails()->where(['lang' => 'en', 'blog_id' => $blog->id])->first()->keywords }}">
                                </div><!--End Col-->
                            </div><!--End form-group-->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead label-control">الكلمات الدلالية (عربي)</label>
                                    <input type="text" class="form-control" name="blog_keywords_ar" data-role="tagsinput" value="{{$blog->getDetails()->where(['lang' => 'ar', 'blog_id' => $blog->id])->first()->keywords}}">
                                </div><!--End Col-->
                            </div><!--End form-group-->

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="lead label-control">محتوى المدونة (إنجليزي)</label>
                                    <textarea rows="4" name="blog_content_en" class="form-control">{{$blog->getDetails()->where(['lang' => 'en', 'blog_id' => $blog->id])->first()->description}}</textarea>
                                </div><!--End Col-->
                            </div><!--End form-group-->

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="lead label-control">محتوى المدونة (عربي)</label>
                                    <textarea rows="4" name="blog_content_ar" class="form-control">{{$blog->getDetails()->where(['lang' => 'ar', 'blog_id' => $blog->id])->first()->description}}</textarea>
                                </div><!--End Col-->
                            </div><!--End form-group-->

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle green addBTN"><i class="fa fa-edit"></i> {{ trans('trans.update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->
@stop