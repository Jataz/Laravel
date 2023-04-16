@extends('layouts.admin')
@section('title')
Radiographers
@endsection
@include('partials.css')
@section('content')

<section class="content">

<div class="card">

    <!--Card Header-->
    <div class="card-header">
        <h3 class="card-title">{{_('Radiographers')}}</h3>
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
                @foreach ($radiographers as $rad)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $rad->name }}</td>
                    <td>{{ $rad->email }}</td>
                    <td>{{ $rad->phone_number }}</td>
                    <td>
                        <a href="{{ route('users.show',$rad->id) }}" ><i class="btn btn-primary fas fa-eye"></i></a> 
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
