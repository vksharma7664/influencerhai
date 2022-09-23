@extends('admin/layout/layout')
@section('page_title','Permissions')
@section('sub_admin_right_in','in')
@section('container')
<div class="container">
    <!-- <h1 class="mb-3"> Permissions </h1> -->

    <div class="bg-light p-4 rounded">
        <h2>Permissions</h2>
        <div class="lead">
            Manage your permissions here.
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add permissions</a>
        </div>
        
        <div class="mt-2 col-md-10">
            @include('layouts.partials.messages')
        </div>
        <div class="row">
            <div class="col-md-10">
                <table class="table table-striped" id="table">
                    <thead>
                    <tr>
                        <th scope="col" width="35%">Name</th>
                        <th scope="col">Guard</th> 
                        <th scope="col" colspan="3" width="1%">Action</th> 
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



@endsection