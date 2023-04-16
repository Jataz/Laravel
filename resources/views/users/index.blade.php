@extends('layouts.admin')
@section('title')
Users
@endsection
@include('partials.css')
@section('content')

<section class="content">

<div class="card">

    <!--Card Header-->
    <div class="card-header">
        <h3 class="card-title">{{_('Users')}}</h3>
        <div class="card-tools">
              <a  class="btn btn-primary btn-sm" href="{{ route('users.create') }}"><i class="fas fa-plus-circle"></i>{{_('Create User')}} </a>   
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table  class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        <a href="{{ route('users.show',$user->id) }}" ><i class="btn btn-primary fas fa-eye"></i></a> 

                        @if (auth()->user()->role_id == 2)
                        <a><i class="btn btn-danger fas fa-trash"></i></a>
                        @endif
                      
                    </td>
                </tr>

                @endforeach
            </tbody> 
        </table>
    </div>
    <!-- /.card-body -->
</div>
 
</section>
@endsection
