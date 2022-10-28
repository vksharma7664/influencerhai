@extends('brand.layouts.app')
 

@section('css')
  @parent
  <style>

  	.label{
  		margin-bottom: 0rem
  	}
  	
  	.no-bullets {
	  list-style-type: none; /* Remove bullets */
	}

	.no-bullets>li {
	  margin-bottom: none; /* Remove bullets */
	}

  </style>

@endsection


 
@section('content')
 <div class="main-content">
        <section class="section">
           <div class="section-header">
           <a href="{{ route('brand.campaign.list')}}" class="btn btn-light"> Back </a>
            <h1>{{ ucwords(auth::user()->company_name) }}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('brand.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('brand.campaign.list')}}">Campaign</a></div>
              <div class="breadcrumb-item">Details</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">{{ $campaign->title }}</h2>
            
            <!-- <div class="row">
              	<div class="col-1 col-md-2 col-lg-2">
                  <h6>Total Influencers:</h6>
		        </div>
                <div class="col-3 col-md-3 col-lg-2">
                  6
		        </div>
		    </div> -->

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    Total Influencers: {{ count($influencer_list) }}
                    </div>
                    <div class="card-body" style="padding-top: 0px;">
                      <div class="text-center text-green">{{session('msg')}}</div>
                        <table class="table table-bordered" style="overflow-y:auto !important;">
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
                                @foreach ($influencer_list as $list)
                                    <tr>
                                    <td>{{ $list->influencer_name }}</td>
                                    <td><a href="{{ $list->influencer_link }}" target="_blank" > {{ $list->influencer_link }} </a> </td>
                                    <td>{{ $list->deliverables }}</td>
                                    <td>-</td>
                                    <td> <div onclick="openModal('{{ $list->id }}')" class="btn btn-outline-info"> Edit Deliverable</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="section-title mt-0">Selected Influencers List</div>
                                    
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> -->
                    </div>
                    <!-- <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div> -->
                </div>
              </div>
                
              
            </div>
          </div>
        </section>
      </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                </div>
            </div>
        </div>

@endsection

@section('scripts')
  @parent
  <script>
    $(document).ready(function() {
      
    });

    function openModal(id) {
        var url = "{{ route('brand.campaign.live_brief.details', ':id') }}";
        url = url.replace(':id',id);
        // alert(url);
        $(".modal-content").load(url);
        $(".bd-example-modal-lg").modal('show');
       
    }
  </script>
@endsection

