<div class="row">
    <div class="form-group col-md-4">
        <label for="exampleInputEmail1">For Feature </label>
        @error('package_value_area_id')<b class="text-center text-red">{{$message}}</b>@enderror
        <select class="form-control" name="package_value_area_id" required>
            <option value="">Select feature For</option>
            @foreach($pkg_val_area as $list)
            <option value="{{$list->id}}"  @if (isset($feature) && $feature->package_value_area_id == $list->id)
            selected="selected"
            @endif >{{$list->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-8">
        <label for="exampleInputEmail1">Feature Title </label>
        @error('title')<b class="text-center text-red">{{$message}}</b>@enderror
        <input type="text" name="title" class="form-control" placeholder="Enter title"  value="@if (isset($feature)) {{ $feature->title }} @endif" required>
    </div>
   
    <div class="form-group col-md-12 text-center">
        <input type="submit" class="btn btn-success">
    </div>
</div>