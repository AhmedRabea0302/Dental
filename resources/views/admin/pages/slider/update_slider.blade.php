@extends('admin.layouts.master')
@section('content')
    
    <style>
        .form-group {
            padding: 15px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">

            <div class="alert " id="warna">

            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل السليدر</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_slider', ['id' => $slider->id])}}" onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 450px;
                                          background: #32c5d2;
                                          background: -webkit-linear-gradient(-90deg, #32c5d2 , #e1edef);
                                          background: -o-linear-gradient(-90deg, #32c5d2, #e1edef);
                                          background: -moz-linear-gradient(-90deg, #32c5d2, #e1edef);
                                        ">
                                            <img height="100%" class="img-responsive center-block" src="{{ url('storage/uploads/sliders') . '/' .$slider->image_name }}" alt=""> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 250px;"> </div>
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
                            </div><!--End form-group-->
                            <br />

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_slider_title_en') }}</label>
                                    <textarea name="slider_title_en" rows="4" class="form-control">{{ $slider->getDetails()->where(['lang' => 'en'])->first()->title }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_slider_title_ar') }}</label>
                                    <textarea name="slider_title_ar" rows="4" class="form-control">{{ $slider->getDetails()->where(['lang' => 'ar'])->first()->title }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_slider_caption_en') }}</label>
                                    <textarea name="slider_desc_en" rows="4" class="form-control">{{ $slider->getDetails()->where(['lang' => 'en'])->first()->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_slider_caption_ar') }}</label>
                                    <textarea name="slider_desc_ar" rows="4" class="form-control">{{ $slider->getDetails()->where(['lang' => 'ar'])->first()->description }}</textarea>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle green addBTN"><i class="fa fa-edit"></i> {{ trans('trans.update') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->
@endsection