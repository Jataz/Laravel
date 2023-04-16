@extends('layouts.admin')
@section('title')
Request
@endsection
@include('partials.css')
@section('content')

<section class="content">

<div class="card">

    <!--Card Header-->
    <div class="card-header">
        <h3 class="card-title">{{_('Requests')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table  class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Examination</th>
                    <th>Doctor</th>
                    <th>Appointment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->examination }}</td>
                    <td>{{ $patient->name }}</td>
                    <th>{{ $patient->appointment_rad }}</th>
                    <td>
                        <a href="{{ route('patients.show',$patient->id) }}" class="btn btn-sm btn-success" style="padding:0px 2px; color:#fff;" >View</a>
                        
                        <form style="display:inline" action="{{ route('patients.update', [$patient->id]) }}"  method="POST">  
                            @csrf
                            @method('PUT')
                            @if (auth()->user()->role_id == 4)
<!--                             <button type="submit" class="btn btn-sm btn-primary" style="padding:0px 2px; color:#fff;" >Request</button>   --> 
                                <a href="{{ route('doctor.edit',$patient->id) }}" class="btn btn-sm btn-primary" style="padding:0px 2px; color:#fff;" >Book Appointment</a>
                            @endif
                        </form>

                        @if (auth()->user()->role_id == 3)
                            <a href="{{ route('radiographer.edit', $patient->id) }}" class="btn btn-sm btn-primary"  style="padding:0px 2px; color:#fff;" >Examine</a>
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
