@extends('admin.layouts.master')
@section('content')

    <style>
        .form-group {
            padding: 15px;
        }
        th, td {
            text-align: center;
            padding: 20px;
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
                        <i class="fa fa-gift"></i>إضافة صورة جديدة للمعرض</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.add_gallery')}}" onsubmit="return false;" method="post" class="form-horizontal" enctype="multipart/form-data">
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="lead">إختر القسم المناسب للصورة</label>
                                    <select class="form-control" name="gallery_category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{$category->details()->where('lang', app()->getLocale())->first()->name }}</option>
                                        @endforeach
                                    </select>
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
                        <i class="fa fa-gift"></i>الصور المضافة
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
                        <div class="form-body">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>الصورة</th>
                                    <th>اسم القسم</th>
                                    <th>{{ trans('trans.update') }}</th>
                                    <th>{{ trans('trans.delete') }}</th>
                                </tr>
                                @foreach($gallery as $one_gallery)
                                    <tr>
                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-4 col-md-offset-4">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 150px; height: 100px;
                                                                  background: #32c5d2;
                                                                  background: -webkit-linear-gradient(-90deg, #32c5d2 , #e1edef);
                                                                  background: -o-linear-gradient(-90deg, #32c5d2, #e1edef);
                                                                  background: -moz-linear-gradient(-90deg, #32c5d2, #e1edef);
                                        ">
                                                                <img class="img-responsive center-block" src="{{url('storage/uploads/gallery/'.$one_gallery->image_name ) }}" alt=""> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 250px;"> </div>
                                                            <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> {{ trans('trans.select_image') }} </span>
                                                            <span class="fileinput-exists"> {{ trans('trans.change') }} </span>
                                                            <input type="file" name="image_name" class="cat_image">
                                                        </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('trans.remove') }} </a>
                                                            </div>
                                                        </div>
                                                    </div><!--End Col-->
                                                </div><!--End form-group-->
                                            </td>
                                            <td>
                                            <br><br>
                                                <select class="form-control categoryID" name="cate_id">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" @if($category->id == $one_gallery->category['id']){{'selected'}}@endif>{{$category->details()->where('lang', app()->getLocale())->first()->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><br><br>
                                                <a class="editCatImageBTN btn btn-info" data-token="{{ csrf_token() }}" data-url="{{ route('admin.update_gallery', ['id' => $one_gallery->id]) }}" data-id="{{ $one_gallery->id }}">{{trans('trans.update')}}</a>
                                            </td>

                                        <td><br><br><a href="{{ route('admin.delete_gallery', ['id' => $one_gallery->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('trans.delete') }}</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

@stop
