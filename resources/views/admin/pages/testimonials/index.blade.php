@extends('admin.layouts.master')
@section('content')
    <style>
        .form-group {
            padding: 15px;
        }
        th, td {
            text-align: center;
            padding: 15px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">

            <div class="alert " id="warna">

            </div>

            @if(session()->has('c'))
                <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
            @endif

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{ trans('trans.add_testimonial') }}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_testimonial') }}" onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 450px; height: 250px;
                                          background: #32c5d2;
                                          background: -webkit-linear-gradient(-90deg, #32c5d2 , #e1edef);
                                          background: -o-linear-gradient(-90deg, #32c5d2, #e1edef);
                                          background: -moz-linear-gradient(-90deg, #32c5d2, #e1edef);
                                        ">
                                            <img class="img-responsive center-block" src="" alt=""> </div>
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
                                    <label class="lead">{{ trans('trans.add_testimonial_name_en') }}</label>
                                    <input type="text" name="test_name_en" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_testimonial_name_ar') }}</label>
                                    <input type="text" name="test_name_ar" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_testimonial_address_en') }}</label>
                                    <input type="text" name="test_address_en" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_testimonial_address_ar') }}</label>
                                    <input type="text" name="test_address_ar" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_testimonial_desc_en') }}</label>
                                    <textarea name="test_desc_en" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">{{ trans('trans.add_testimonial_desc_ar') }}</label>
                                    <textarea name="test_desc_ar" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle green addBTN"><i class="fa fa-plus"></i> {{ trans('trans.add') }}</button>
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

    <div class="row">
        <div class="col-md-12">

            <div class="alert " id="warna">

            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{ trans('trans.all_added_testimonials') }}
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_slider')}}" method="post" class="form-horizontal addFormWithImage" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>{{ trans('trans.testimonial_image') }}</th>
                                    <th>{{ trans('trans.testimonial_name') }}</th>
                                    <th>{{ trans('trans.update') }}</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td><img src="{{url('storage/uploads/testimonials') . '/' . $testimonial->image_name }}" class="img-responsive center-block" style="width: 150px; height: 100px" /></td>
                                        <td>{{ $testimonial->getDetails()->where(['test_id' => $testimonial->id ,'lang' => app()->getLocale()])->first()->name }}</td>
                                        <td><a href="{{ route('admin.get_update_testimonial', ['id' => $testimonial->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('trans.update') }}</a></td>
                                        <td><a href="{{ route('admin.delete_testimonial', ['id' => $testimonial->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('trans.delete') }}</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

@stop