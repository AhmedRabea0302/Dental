@extends('admin.layouts.master')
@section('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0p2dgpccy0nkyzpvzlwuujsf4i5c3p0qu16q9143x08mo9on"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل نص خدمات العيادة</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_clinic_service') }}" onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="value_en">{{ $statics->where('flag', 'clinic_service_en')->first()->content  }} </textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="value_ar">{{ $statics->where('flag', 'clinic_service_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل نص فريق الأطباء</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_doctors') }}" method="post" onsubmit="return false;" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="doctor_value_en">{{ $statics->where('flag', 'doctors_en')->first()->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="doctor_value_en">{{ $statics->where('flag', 'doctors_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل نص قصص النجاح</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_success') }}" method="post" onsubmit="return false;" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="success_value_en">{{ $statics->where('flag', 'success_en')->first()->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="success_value_ar">{{ $statics->where('flag', 'success_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل نص تواصل معنا</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_contact') }}" onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="contact_value_en">{{ $statics->where('flag', 'contact_en')->first()->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="contact_value_ar">{{ $statics->where('flag', 'contact_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل نص عن القيادة</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_leader') }}" method="post" onsubmit="return false;" class="AddForm form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="leader_value_en">{{ $statics->where('flag', 'leader_en')->first()->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="leader_value_ar">{{ $statics->where('flag', 'leader_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل نص إشترك معنا</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_subscribe') }}" method="post" onsubmit="return false;" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="subscribe_value_en">{{ $statics->where('flag', 'subscribe_en')->first()->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="subscribe_value_ar">{{ $statics->where('flag', 'subscribe_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل النص الأول صفحة الخدمات</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_subscribe') }}" onsubmit="return false;" method="post" class="AddForm form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="subscribe_value_en">{{ $statics->where('flag', 'service_page_en')->first()->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="subscribe_value_ar">{{ $statics->where('flag', 'service_page_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل النص الثاني صفحة الخدمات</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.update_subscribe') }}"  method="post" onsubmit="return false;" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="col-md-6">
                                <label class="lead">النص بالإنجليزية</label>
                                <textarea class="form-control tiny-editor" name="subscribe_value_en">{{ $statics->where('flag', 'service_page_para_en')->first()->content }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="lead">النص بالعربية</label>
                                <textarea class="form-control tiny-editor" name="subscribe_value_ar">{{ $statics->where('flag', 'service_page_para_ar')->first()->content }}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <br /><br />
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
@stop