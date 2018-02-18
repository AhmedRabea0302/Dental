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
                        <i class="fa fa-gift"></i>أضف ميزة الخدمات</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.post_services_features')}}" onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-3 col-md-offset-3">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 300px; height: 250px;
                                          background: #32c5d2;
                                          background: -webkit-linear-gradient(-90deg, #32c5d2 , #e1edef);
                                          background: -o-linear-gradient(-90deg, #32c5d2, #e1edef);
                                          background: -moz-linear-gradient(-90deg, #32c5d2, #e1edef);
                                        ">
                                            <img class="img-responsive center-block" src="" alt=""> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 250px;"> </div>
                                        <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> إختر صورة الميزة </span>
                                            <span class="fileinput-exists"> {{ trans('trans.change') }} </span>
                                            <input type="file" name="image_name">
                                        </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('trans.remove') }} </a>
                                        </div>
                                    </div>
                                </div><!--End Col-->

                            <br />

                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">الميزة (عربي)</label>
                                    <input type="text" name="service_title_ar" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">الميزة (انجليزي)</label>
                                    <input type="text" name="service_title_en" class="form-control"/>
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
                            </div>
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
                        <i class="fa fa-gift"></i>مميزات الخدمات
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
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>صورة الميزة</th>
                                    <th>الميزة</th>
                                    <th>{{ trans('trans.update') }}</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>
                                @foreach($features as $feature)
                                    <tr>
                                        <td><img src="{{url('storage/uploads/features') . '/' . $feature->image_name }}" class="img-responsive center-block" width="250px" height="200px;" /></td>
                                        <td>{{ $feature->getDetails()->where(['feature_id' => $feature->id ,'lang' => app()->getLocale()])->first()->title }}</td>
                                        <td><a href="{{ route('admin.get_update_features', ['id' => $feature->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('trans.update') }}</a></td>
                                        <td><a href="{{ route('admin.delete_features', ['id' => $feature->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('trans.delete') }}</a></td>
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

@endsection
