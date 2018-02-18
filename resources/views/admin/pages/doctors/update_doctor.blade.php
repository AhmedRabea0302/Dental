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

            <div class="alert " id="warna"></div>

            @if(session()->has('c'))
                <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
            @endif

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل الطبيب</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.post_update_doctor', ['id' => $doctor->id])}}" onsubmit="return false;" method="post" class="form-horizontal addFormWithImage" enctype="multipart/form-data">
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
                                            <img class="img-responsive center-block" width="100%" height="100%" src="{{url('storage/uploads/doctors') . '/' . $doctor->image_name}}" alt=""> </div>
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
                                    <label class="lead">تعديل إسم الطبيب (عربي)</label>
                                    <input type="text" name="name_ar" class="form-control" value="{{ $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => 'ar'])->first()->name }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">تعديل إسم الطبيب (إنجليزي)</label>
                                    <input type="text" name="name_en" class="form-control" value="{{ $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => 'en'])->first()->name }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">تعديل تخصص الطبيب (عربي)</label>
                                    <input type="text" name="sector_ar" class="form-control" value="{{ $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => 'ar'])->first()->job_title }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">تعديل تخصص الطبيب (إنجليزي)</label>
                                    <input type="text" name="sector_en" class="form-control" value="{{ $doctor->getDetails()->where(['doctor_id' => $doctor->id, 'lang' => 'en'])->first()->job_title }}"/>
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
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

    <div class="row">
        <div class="col-md-12">

            <div class="alert " id="warna"></div>

            @if(session()->has('c'))
                <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
            @endif

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>إضافة رابط جديد للطبيب</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_doctor_social_link', ['id' => $doctor->id])}}" method="post" onsubmit="return false;" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">أضف رابط موقع التواصل للطبيب</label>
                                    <input type="text" name="link" class="form-control"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead label-control">إختر أيقونة رابط التواصل للطبيب</label>
                                    <select class="form-control fa" name="icon">
                                        @foreach($icons as $key => $icon)
                                            <option value="{{$key}}">{{$icon}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div><!--End Col-->

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
                        <i class="fa fa-gift"></i>روابط التواصل المضافة</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="form-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>رابط التواصل الإجتماعي</th>
                                <th>أيقونة التواصل الاجتماعي</th>
                                <th>{{trans('trans.update')}}</th>
                                <th>{{trans('trans.delete')}}</th>
                            </tr>

                            @foreach($social_links as $link)
                                <tr>
                                    <td><input type="text" name="edit_link" value="{{ $link->link }}" class="form-control doctor_social_link" /></td>
                                    <td>
                                        <select class="form-control fa doctor_social_icon" name="edit_icon">
                                            @foreach($icons as $key => $icon)
                                                <option value="{{ $key }}" @if($link->icon == $key){{'selected'}}@endif>{{$icon}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                   <td><a class="editDocTypeBTN btn btn-info" data-token="{{ csrf_token() }}" data-url="{{ route('admin.update_doctor_social_link', ['id' => $link->id]) }}" data-id="{{ $link->id }}">{{trans('trans.update')}}</a></td>

                                    <form method="post" action="{{ route('admin.delete_doctor_social_link', ['id' => $link->id]) }}">
                                        {{ csrf_field() }}
                                        <td><input type="submit" class="btn btn-danger" value="{{trans('trans.delete')}}" /></td>
                                    </form>
                                </tr>
                            @endforeach
                        </table>

                        <div class="clearfix"></div>
                    </div>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

@endsection