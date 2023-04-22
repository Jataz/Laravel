@extends('layouts.admin')
@section('title')
Examined
@endsection
@include('partials.css')
@section('content')

<section class="content">

    <div class="card">

        <!--Card Header-->
        <div class="card-header">
            <h3 class="card-title">{{_('Examined')}}</h3>
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
                        <th>Radiographer</th>
                        <th>Date Examined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $patient->patient_name }}</td>
                        <td>{{ $patient->age}}</td>
                        <td>{{ $patient->examination }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->updated_at }}</td>
                        <td>
                            <a href="{{ route('patients.show',$patient->id) }}" class="btn btn-sm btn-success" style="padding:0px 2px; color:#fff;" >View</a>
                                                    
                            @if (auth()->user()->role_id == 2)
                            <a href="{{ route('radiographer.show',$patient->id) }}" class="btn btn-sm btn-primary" style="padding:0px 2px; color:#fff;" >Image</a>
                            @endif
                            @if (auth()->user()->role_id == 3)
                            <a href="{{ route('radiographer.show',$patient->id) }}" class="btn btn-sm btn-primary" style="padding:0px 2px; color:#fff;" >Image</a>
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
