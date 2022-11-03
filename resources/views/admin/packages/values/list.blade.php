@extends('admin/layout/layout')
@section('page_title','Package Details')
@section('packages_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Packages</li>
                <li class="active">@yield('page_title')</li>
            </ol>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- end PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
    <p class="text-center text-green">{{session('msg')}}</p>
        <div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <a href="{{ route('admin.package.show') }}" class="btn btn-primary "> Back To Packages</a>
                    <h4>{{ $package->title }} Package</h4>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="portlet-body">
                <form method="POST" action="{{ route('admin.package.details.update', $package->id) }}">
                    @csrf
                    <div class="table-responsive" style="overflow-y: auto !important;">
                        <table  class="table table-striped table-bordered table-hover table-green">
                            <thead>
                                <tr>
                                    <th>Select Features</th>
                                    <th>Feature</th>
                                    <th>Icon(Y/N) / comment</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php $sr=1; ?>
                            @foreach($pkg_values as $list)
                                <tr>
                                    <td width="5%"><input type="checkbox" name="selected_{{ $list->id }}" @if (array_key_exists($list->id, $pkg_includes))
                                        checked="checked"
                                    @endif  value="{{ $list->id }}"></td>
                                    <td width="50%">
                                        {{ $list->title }}
                                    </td>
                                    <td width="40%"><input type="text" name="display_text_{{ $list->id }}"
                                    @if (array_key_exists($list->id, $pkg_includes))
                                    value="{{ $pkg_includes[$list->id] }}" 
                                    @endif
                                        placeholder="Enter comment / If Icon (Y/N)"></td>
                                    
                                </tr>
                        <?php $sr++; ?>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                        <button type="submit" class="btn btn-success"> Submit</button>
                        </div>
                        
                    </div>
                </form>
                <!-- /.table-responsive -->
            </div>
            <!-- /.portlet-body -->
        </div>
        <!-- /.portlet -->

    </div>
</div>





@endsection