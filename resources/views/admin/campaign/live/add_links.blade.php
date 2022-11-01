<div class="col-12 col-md-12 col-lg-12" style="float: none;">
    <div class="card card-danger">
        <div class="card-header">
            <h4>Edit Deliverables*</h4>
        </div>
        <div class="card-body">
            <div class="form-group row " >
                <!-- <div class="col-lg-3 col-md-3 ml-10">
                    
                </div> -->
                <div class="col-lg-4 col-md-4">
                    <div class="control-label">Platform</div>
                    <div class="control-label btn btn-outline-primary">{{$campaign['platform']}}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('brand.campaign.live_brief.details.save', $influe_live->id) }}">
                @csrf
                
                @foreach (getDeliverablesNames() as $key => $one)
                   
                        <div class=" row " >
                            <div class="col-lg-6 col-md-4">
                                <label class="custom-switch mt-2">
                                    <span class="custom-switch-description">{{$one}}</span>
                                </label>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                   
                                </div>
                            </div>   
                        </div>
                    
                @endforeach
                <div class="row ">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>