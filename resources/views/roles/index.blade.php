@extends('layouts.admin')
@section('title')
Roles
@endsection
@include('partials.css')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Roles</h3>
        <div class="card-tools">
            @can('role-create')
               <a  class="btn btn-primary btn-sm" href="{{ route('roles.create') }}"><i class="fas fa-plus-circle"></i>{{_('Add New Role')}} </a>   
            @endcan
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th width="280px">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission )
                                <button class="btn btn-warning btn-sm" role="button"><i class="fas fa-shield-alt"></i> {{ $permission->name }}</button>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" style="padding:0px 2px; color:#fff;" href="{{ route('roles.show',$role->id) }}">View</a>
                                @can('role-edit')
                                <a class="btn btn-danger btn-sm" style="padding:0px 2px; color:#fff;" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                @can('role-delete')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding:0px 2px; color:#fff;">Delete</button>
                                @endcan
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
