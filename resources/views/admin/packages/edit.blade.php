@extends('admin/layout/layout')
@section('page_title','Edit Package')
@section('packages_right_in','in')
@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Package</li>
                <li class="active">@yield('page_title')</li>
            </ol>
        </div>
    </div>
</div>
    <div class="row">
    <div class="col-lg-12">
        <div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h4>@yield('page_title')</h4>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div id="basicFormExample" class="panel-collapse collapse in">
                <div class="portlet-body">
                    <form role="form" method="post"  action="{{route('admin.package.update', $package['id'])}}"enctype="multipart/form-data">
                    @csrf
                    @include('admin.packages.form') 
                    </form>
                </div>
            </div>
        </div>
        <!-- /.portlet -->
        </div>
    </div>
@endsection


@section('script')
<script>

    $(document).ready(function(){
        var pay_type = "{{$package['price_flag']}}";
        showprice(pay_type);
        // alert('vikesh');
    });

    function showprice(obj){
        if(obj == 'free'){
            $("#price-id").hide();
        }else{
            $("#price-id").show();
        }
    }
</script>

@endsection