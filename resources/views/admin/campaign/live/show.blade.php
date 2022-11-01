@extends('admin/layout/layout')
@section('page_title','Show Campaign')
@section('campaign_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<style>
  @media (min-width: 700px)
.modal-content {
  -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
  background-color: red;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Campaigns</li>
                <li class="active">@yield('page_title')</li>
            </ol>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- end PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
    <p class="text-center text-red">{{session('msg')}}</p>
        <div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                <a href="{{ route('campaign.show')}}" class="btn btn-success"> Back </a>
                    <h4> {{ $campaign->title}}</h4>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive" style="overflow-y: auto !important;"> 
                    <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                    <thead>
                        <tr>
                        <th scope="col">Influencer Name</th>
                        <th scope="col" >Link</th>
                        <th scope="col" >Deliverables</th>
                        <th scope="col" >Total Videos</th>
                        <th scope="col" >Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($influe_live as $list)
                            <tr>
                            <td>{{ $list->influencer_name }}</td>
                            <td><a href="{{ $list->influencer_link }}" target="_blank" > {{ $list->influencer_link }} </a> </td>
                            <td>{{ $list->deliverables }}</td>
                            <td>-</td>
                            <td> <div onclick="openModal('{{ $list->id }}')" class="btn btn-primary"> Add Videos</div></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.portlet-body -->
        </div>
        <!-- /.portlet -->

    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
        <div class="modal-content">
        
        </div>
    </div>
</div>



@endsection

@section('script')
  @parent
  <script>
    $(document).ready(function() {
      
    });

    function openModal(id) {
        var url = "{{ route('admin.campaign.live_brief.links.add', ':id') }}";
        url = url.replace(':id',id);
        // alert(url);
        $(".modal-content").load(url);
        $(".bd-example-modal-lg").modal('show');
       
    }
  </script>
@endsection