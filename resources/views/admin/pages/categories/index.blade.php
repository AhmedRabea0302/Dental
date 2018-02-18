@extends('admin.layouts.master')
@section('content')
    <style>
        table th, td {
            padding: 15px;
            text-align: center;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="alert " id="warna">

            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>إضافة قسم</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{route('admin.add_category')}}" method="post" class="form-horizontal" onsubmit="return false;" enctype="multipart/form-data">
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="lead label-control">إسم القسم ( عربي )</label>
                                    <input type="text" value="" name="category_name_ar" class="form-control">
                                </div><!--End Col-->

                                <div class="col-md-6">
                                    <label class="lead label-control">إسم القسم ( إنجليزي )</label>
                                    <input type="text" value="" name="category_name_en" class="form-control">
                                </div><!--End Col-->
                            </div><!--End form-group-->

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

            @if(session()->has('c'))
                <div class="alert alert-{{ session('c') }}">{{ session('m') }}</div>
            @endif

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>الأقسام المضافة</div>
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
                        <table class="table table-hover table-striped table-bordered">
                            <tr>
                                <th>إسم القسم بالعربية</th>
                                <th>إسم القسم بالإنجليزية</th>
                                <th>{{ trans('trans.update') }}</th>
                                <th>{{ trans('trans.delete') }}</th>
                            </tr>

                            @foreach($category as $cat)
                                <tr>

                                    <td> <input type="text" name="name_ar" class="form-control name_ar" value="{{ $cat->details()->where('lang' , 'ar')->first()->name }}"/></td>
                                    <td> <input type="text" name="name_en" class="form-control name_en" value="{{ $cat->details()->where('lang' , 'en')->first()->name }}" /></td>
                                    <td>
                                        <a class="editCatBTN btn btn-info" data-token="{{ csrf_token() }}" data-url="{{ route('admin.update_category', ['id' => $cat->id]) }}" data-id="{{ $cat->id }}">{{trans('trans.update')}}</a>
                                    </td>

                                    <form method="post" action="{{ route('admin.delete_category', ['id' => $cat->id]) }}">
                                        <td>
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('trans.delete') }}</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- END FORM-->
                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->

    @endsection