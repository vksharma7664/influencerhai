<div class="row">
    <div class="form-group col-md-4">
        <label for="exampleInputEmail1">For Package </label>
        @error('for_package_id')<b class="text-center text-red">{{$message}}</b>@enderror
        <select class="form-control" name="for_package_id" required>
            <option value="">Select package For</option>
            @foreach($fpkg as $list)
            <option value="{{$list->id}}"  @if (isset($package) && $package->for_package_id == $list->id)
            selected="selected"
            @endif >{{$list->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Package Title </label>
        @error('title')<b class="text-center text-red">{{$message}}</b>@enderror
        <input type="text" name="title" class="form-control" placeholder="Enter title"  value="@if (isset($package)) {{ $package->title }} @endif" required>
    </div>
        <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Short Description </label>
        @error('short_desc')<b class="text-center text-red">{{$message}}</b>@enderror
        <input type="text" name="short_desc" class="form-control" placeholder="Enter short Description" value="@if (isset($package)) {{ $package->short_desc }} @endif" >
    </div>
   
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Long Description</label>
        <!-- <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Enter Short Description" required></textarea> -->
        @error('long_desc')<b class="text-center text-red">{{$message}}</b>@enderror
        <input type="text" name="long_desc" value="@if (isset($package)) {{ $package->long_desc }} @endif" class="form-control" placeholder="Enter Long Description"  >
        
    </div>
    <!-- <h3> Meta Details</h3> -->
   
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Package Type</label>
            @error('price_flag')<b class="text-center text-red">{{$message}}</b>@enderror
            <select class="form-control" name="price_flag" required onchange="return showprice(this.value)">
            <option value="">Select type</option>
                <option value="free"  @if(isset($package) && $package->price_flag == "free")
                selected="selected"
            @endif >Free</option>
                <option value="paid"  @if(isset($package) && $package->price_flag == "paid")
                selected="selected"
            @endif >Paid</option>
            </select>
        </div>
    <div class="row" style="display:none;" id="price-id">    
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Monthly Price</label>
                @error('monthly')<b class="text-center text-red">{{$message}}</b>@enderror
                <input type="text" name="monthly" value="@if (isset($package)) {{ $package->monthly }} @endif"  class="form-control" placeholder="Enter monthly price"  >
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Quarterly Price</label>
            @error('quarterly')<b class="text-center text-red">{{$message}}</b>@enderror
            <input type="text" name="quarterly" value="@if (isset($package)) {{ $package->quarterly }} @endif"  class="form-control" placeholder="Enter quarterly price"  >
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Yearly Price</label>
                @error('yearly')<b class="text-center text-red">{{$message}}</b>@enderror
                <input type="text" name="yearly" value="@if (isset($package)) {{ $package->yearly }} @endif"  class="form-control" placeholder="Enter yearly price"  >
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Package Status</label>
        @error('status')<b class="text-center text-red">{{$message}}</b>@enderror
        <select class="form-control" name="status" required onchange="return showprice(this.value)">
        <option value="">Select type</option>
            <option value="0"  @if(isset($package) && $package->status == 0)
            selected="selected"
        @endif >Deactivated</option>
            <option value="1"  @if(isset($package) && $package->status == 1)
            selected="selected"
        @endif >Activated</option>
        </select>
    </div>
   
    <div class="form-group col-md-12 text-center">
        <input type="submit" value="Submit" name="btn_submit" class="btn btn-success">
    </div>
</div>