@extends('admin/layout/layout')
@section('page_title','Permissions')
@section('sub_admin_right_in','in')
@section('container')
    <div class="bg-light p-4 rounded">
        <!-- <h2>Add new permission</h2> -->
        <div class="lead">
            Add new permission.
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ old('name') }}" 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save permission</button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>






@endsection