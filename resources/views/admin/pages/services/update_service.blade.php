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
                        <i class="fa fa-gift"></i>تعديل الخدمة</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.post_update_service', ['id' => $service->id])}}" method="post" onsubmit="return false;" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-3">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 300px; height: 200px;
                                          background: #32c5d2;
                                          background: -webkit-linear-gradient(-90deg, #32c5d2 , #e1edef);
                                          background: -o-linear-gradient(-90deg, #32c5d2, #e1edef);
                                          background: -moz-linear-gradient(-90deg, #32c5d2, #e1edef);
                                        ">
                                            <img class="img-responsive center-block" src="{{ url('storage/uploads/services') . '/' .  $service->service_image_name }}" alt=""> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 250px;"> </div>
                                        <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> إختر صورة الخدمة </span>
                                            <span class="fileinput-exists"> {{ trans('trans.change') }} </span>
                                            <input type="file" name="service_image_name">
                                        </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('trans.remove') }} </a>
                                        </div>
                                    </div>
                                </div><!--End Col-->

                                <div class="col-md-3 col-md-offset-2">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="
                                          background: #32c5d2;
                                          background: -webkit-linear-gradient(-90deg, #32c5d2 , #e1edef);
                                          background: -o-linear-gradient(-90deg, #32c5d2, #e1edef);
                                          background: -moz-linear-gradient(-90deg, #32c5d2, #e1edef);
                                        ">
                                            <img class="img-responsive center-block" src="{{ url('storage/uploads/services') . '/' .  $service->icon_image_name }}" alt=""> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 250px;"> </div>
                                        <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> إختر صورة الأيقونة </span>
                                            <span class="fileinput-exists"> {{ trans('trans.change') }} </span>
                                            <input type="file" name="icon_image_name">
                                        </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('trans.remove') }} </a>
                                        </div>
                                    </div>
                                </div><!--End Col-->
                            </div><!--End form-group-->

                            <br />

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">إسم الخدمة (عربي)</label>
                                    <input type="text" name="service_title_ar" class="form-control" value="{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'ar'])->first()->name }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">إسم الخدمة (انجليزي)</label>
                                    <input type="text" name="service_title_en" class="form-control" value="{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'en'])->first()->name }}"/>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">وصف الخدمة الاول ( عربي ) </label>
                                    <textarea name="service_desc1_ar" rows="4" class="form-control">{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'ar'])->first()->desc1 }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">وصف الخدمة الاول ( انجليزي ) </label>
                                    <textarea name="service_desc1_en" rows="4" class="form-control">{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'en'])->first()->desc1 }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">وصف الخدمة الثاني ( عربي ) </label>
                                    <textarea name="service_desc2_ar" rows="4" class="form-control">{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'ar'])->first()->desc2 }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">وصف الخدمة الثاني ( انجليزي ) </label>
                                    <textarea name="service_desc2_en" rows="4" class="form-control">{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'en'])->first()->desc2 }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">المميزات ( عربي ) </label>
                                    <textarea name="features_ar" rows="4" class="form-control">{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'ar'])->first()->features }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="lead">المميزات ( إنجليزيه )</label>
                                    <textarea name="features_en" rows="4" class="form-control">{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'en'])->first()->features }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="lead">رابط الفيديو</label>
                                    <input type="text" name="link" class="form-control" value="{{ $service->link }}"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="lead">الكلمات الدلالية ( العربية )</label>
                                    <input type="text" name="keywords_ar" class="form-control" data-role="tagsinput" value="{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'ar'])->first()->keywords }}"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="lead"> الكلمات الدلالية ( إنجليزي )</label>
                                    <input type="text" name="keywords_en" class="form-control" data-role="tagsinput" value="{{ $service->getDetails()->where(['service_id' => $service->id ,'lang' => 'en'])->first()->keywords }}"/>
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
@endsection