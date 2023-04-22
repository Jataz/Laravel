@extends('layouts.admin')
@section('title')
Patients
@endsection
@include('partials.css')
@section('content')

<section class="content">

<div class="card">

    <!--Card Header-->
    <div class="card-header">
    @if (auth()->user()->role_id == 1)
        <h3 class="card-title">{{_('Patients')}}</h3>
    @endif

    @if (auth()->user()->role_id == 4)
        <h3 class="card-title">{{_('Appointments')}}</h3>
    @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body" >
        <table  class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Medical Aid</th>
                    <th>Examination</th>
                    <th>Priority</th>
                    @if (auth()->user()->role_id == 1)
                    <th>Date</th>
                    @endif
                    @if (auth()->user()->role_id == 4)
                    <th>Appointment</th>
                    @endif
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $patient->patient_name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->medical_aid }}</td>
                    <td>{{ $patient->examination }}</td>
                    <td>{{ $patient->priority }}</td>
                    @if (auth()->user()->role_id == 1)
                    <td>{{ $patient->created_at }}</td>
                    @endif
                    @if (auth()->user()->role_id == 4)
                    <th>{{ $patient->appointment_rad }}</th>
                    @endif
                    <td>
<!--                         <a href="{{ route('patients.show',$patient->id) }}" ><i class="btn btn-primary fas fa-eye"></i></a> 
                        <a href="{{ route('patients.show',$patient->id) }}" ><i class="btn btn-primary fas fa-eye"></i></a>  -->

                        <a href="{{ route('patients.show',$patient->id) }}" class="btn btn-sm btn-success" style="padding:0px 2px; color:#fff;" >View</a>
                        
                        @if (auth()->user()->role_id == 1)
                        <a href="{{ route('patients.show',$patient->id) }}" class="btn btn-sm btn-danger" style="padding:0px 2px; color:#fff;" >Edit</a>
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
