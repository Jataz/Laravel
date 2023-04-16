@extends('layouts.admin')
@section('title')
Doctors
@endsection
@include('partials.css')
@section('content')

<section class="content">

<div class="card">

    <!--Card Header-->
    <div class="card-header">
        <h3 class="card-title">{{_('Doctors')}}</h3>
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
                @foreach ($doctors as $doc)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $doc->name }}</td>
                    <td>{{ $doc->email }}</td>
                    <td>{{ $doc->phone_number }}</td>
                    <td>
                        <a href="{{ route('users.show',$doc->id) }}" ><i class="btn btn-primary fas fa-eye"></i></a> 
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
