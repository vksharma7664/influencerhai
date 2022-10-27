<div class="row">
   
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1"> Title </label>
        @error('title')<b class="text-center text-red">{{$message}}</b>@enderror
        <input type="text" name="title" class="form-control" placeholder="Enter title" @if(isset($page)) value="{{ $page->title }}" @endif  required>
    </div>
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Long Description</label>
        <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Enter Short Description" required> @if(isset($page)) {{ $page->long_desc }} @endif</textarea>
        <script>
        CKEDITOR.replace( 'long_desc', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        });
        </script>
    </div>
    <!-- <h3> Meta Details</h3> -->
    
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Meta Title</label>
         @error('meta_title')<b class="text-center text-red">{{$message}}</b>@enderror
        <input type="text" name="meta_title" class="form-control"  @if(isset($page)) value="{{ $page->meta_title }}" @endif placeholder="Enter meta Title" required>
    </div>
   
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Meta Description</label>
         @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
        <textarea class="form-control" name="meta_desc" placeholder="Enter meta Description" required> @if(isset($page)) {{ $page->meta_desc }} @endif</textarea>
    </div>
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Meta Tags (comma , seperated)</label>
        @error('tags')<b class="text-center text-red">{{$message}}</b>@enderror
        <textarea class="form-control"  name="tags" placeholder="Enter  meta tags"> @if(isset($page)) {{ $page->tags }} @endif</textarea>
    </div>
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Meta Keywords</label>
         @error('keywords')<b class="text-center text-red">{{$message}}</b>@enderror
        <textarea class="form-control" name="keywords" placeholder="Enter meta Keywords" required>@if(isset($page)) {{ $page->keywords }} @endif </textarea>
    </div>
    <div class="form-group col-md-12">
        <div class="table-responsive">
            <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                <thead>
                    <tr>
                        <th>select</th>
                        <th>Influencers Username</th>
                        <th>Email</th>
                        
                    </tr>
                </thead>
                <tbody>
               <?php $sr=1; ?>
                @foreach($influencers as $list)
                    <tr>
                        <td width="5%">
                            <input type="checkbox" name="influencer_list[]" value="{{$list->id}}" @if(isset($page) && in_array($list->id, $influencer_list)) checked @endif >
                        </td>
                        <td>{{$list->username}}</td>
                        <td>{{$list->email}}</td>
                    </tr>
               <?php $sr++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-group col-md-12 text-center">
        <input type="submit" value="Submit" name="btn_submit" class="btn btn-success">
    </div>
</div>