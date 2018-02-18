@extends('admin.layouts.master')
@section('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0p2dgpccy0nkyzpvzlwuujsf4i5c3p0qu16q9143x08mo9on"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <style>
        table {
            width: 80%;
        }
        th, td {
            text-align: center;
            padding: 20px;
        }
    </style>
    <div class="row">
        <div class="alert" id="warna"></div>

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
                        <i class="fa fa-gift"></i>الرسائل</div>
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
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>اسم المرسل</th>
                                    <th>البريد</th>
                                    <th>الرسالة</th>
                                    <th>{{ trans('trans.reply') }}</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>

                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->fname }} {{$message->lname}}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td><a href="{{ route('admin.get_reply_message', ['id' => $message->id]) }}" class="btn btn-info"><i class="fa fa-paper-plane"></i> رد</a></td>
                                        <td><a href="{{ route('admin.post_delete_message', ['id' => $message->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> حذف</a></td>
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

    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>معلومات التواصل</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_contact_info') }}"  onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <table class="table table-bordered">
                                <h2>أضف معلومة تواصل</h2>
                                <tr>
                                    <th>الأيقونة</th>
                                    <th>العنوان</th>
                                    <th>القيمة</th>
                                    <th>إضافة</th>
                                </tr>

                                <form>
                                    {{ csrf_field() }}
                                    <tr>
                                        <th>
                                            <select name="font_class" style="margin-top: 50px" class=" fa form-control input-circle custom-form-control">
                                                @foreach($icons as $key => $icon)
                                                    <option value="fa {{$key}}">{{$icon}}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th>
                                            <label class="lead">إنجليزي</label>
                                            <textarea class="form-control tiny-editor" name="title_en"></textarea>
                                            <br />
                                            <label class="lead">عربي</label>
                                            <textarea class="form-control tiny-editor" name="title_ar"></textarea>
                                        </th>
                                        <th>
                                            <label class="lead">إنجليزي</label>
                                            <textarea class="form-control tiny-editor" name="value_en"></textarea>
                                            <br />
                                            <label class="lead">عربي</label>
                                            <textarea class="form-control tiny-editor" name="value_ar"></textarea>
                                        </th>
                                        <th>
                                            <button  style="margin-top: 50px" type="submit" class="btn btn-success addBTN"><i class="fa fa-plus"></i> {{ trans('trans.add') }}</button>
                                        </th>
                                    </tr>
                                </form>
                            </table>

                            <table class="table table-bordered">
                                <tr>
                                    <th>الأيقونة</th>
                                    <th>العنوان</th>
                                    <th>القيمة</th>
                                    <th>{{ trans('trans.update') }}</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>

                                @foreach($contact_info as $info)

                                    <tr>
                                        <td><label class="lead"><i class="fa fa-{{ $info->icon }}"></i></label></td>
                                        <td><label class="lead">{!! $info->getDetails()->where(['contact_id' => $info->id,'lang' => app()->getLocale()])->first()->title !!}</label></td>
                                        <td><label class="lead">{!! $info->getDetails()->where(['contact_id' => $info->id,'lang' => app()->getLocale()])->first()->description !!}</label></td>
                                        <td><a href="{{ route('admin.get_update_contact_info', ['id' => $info->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i> {{ trans('trans.update') }}</a></td>
                                        <td><a href="{{ route('admin.delete_contact_info', ['id' => $info->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> {{ trans('trans.delete') }}</a></td>
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