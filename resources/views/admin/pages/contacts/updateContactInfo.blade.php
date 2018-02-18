@extends('admin.layouts.master')
@section('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=0p2dgpccy0nkyzpvzlwuujsf4i5c3p0qu16q9143x08mo9on"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <Style>
        th, td {
            text-align: center;
            padding: 20px;
        }
    </Style>
    <div class="row">
        <div class="col-md-12">
            <div class="alert" id="warna"></div>

            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div id="warna"></div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>تعديل معلومات التواصل</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.post_update_contact_info', ['id' => $info->id]) }}" onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>الأيقونة</th>
                                    <th>العنوان</th>
                                    <th>القيمة</th>
                                    <th>{{ trans('trans.add') }}</th>
                                </tr>

                                <form>
                                    {{ csrf_field() }}
                                    <tr>

                                        <th>
                                            <select name="font_class" style="margin-top: 50px" class="fa form-control input-circle custom-form-control">
                                                @foreach($icons as $key => $icon)
                                                    <option value="{{$key}}" @if($info->icon == $key){{'selected'}}@endif>{{$icon}}</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th>
                                            <label class="lead">إنجليزي</label>
                                            <textarea class="form-control tiny-editor" name="title_en">{{ $info->getDetails()->where(['contact_id' => $info->id, 'lang' => 'en'])->first()->title }}</textarea>
                                            <br />
                                            <label class="lead">عربي</label>
                                            <textarea class="form-control tiny-editor" name="title_ar">{{ $info->getDetails()->where(['contact_id' => $info->id, 'lang' => 'ar'])->first()->title }}</textarea>
                                        </th>
                                        <th>
                                            <label class="lead">إنجليزي</label>
                                            <textarea class="form-control tiny-editor" name="value_en">{{ $info->getDetails()->where(['contact_id' => $info->id, 'lang' => 'en'])->first()->description }}</textarea>
                                            <br />
                                            <label class="lead">عربي</label>
                                            <textarea class="form-control tiny-editor" name="value_ar" type="text">{{$info->getDetails()->where(['contact_id' => $info->id, 'lang' => 'ar'])->first()->description}}</textarea>
                                        </th>
                                        <th>
                                            <button  style="margin-top: 50px" type="submit" class="btn btn-success addBTN"><i class="fa fa-edit"></i> {{ trans('trans.update') }}</button>
                                        </th>
                                    </tr>
                                </form>
                            </table>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->
@stop