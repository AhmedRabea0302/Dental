@extends('admin.layouts.master')
@section('content')
    <style>
        table th, td {
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-md-12" >
            @if(Session::has('m'))
                <div class="alert alert-{{ session('c') }}">
                    {{ session('m') }}
                </div>
            @endif

            <div class="alert" id="warna">

            </div>

            <div class="portlet box green" style="padding: 15px">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Admin</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div><!--End portlet-title-->
                <div class="portlet-body form" >

                </div><!--End portlet-body-->
            </div><!--End portlet box green-->
        </div><!--End Col-md-12-->
    </div><!--nd Row-->
@stop