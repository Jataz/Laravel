@extends('layouts.admin')

@section('title')
Details
@endsection
@include('partials.css')
@section('content')

<section class="content">
    <div class="row justify-content-center">
        <div class="col-lg-10 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    {{_('View Details')}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col">
                            <strong>Name:</strong>
                            {{ $patient->patient_name }}
                        </div>
                        <div class="col">
                            <strong>Phone Number:</strong>
                            {{ $patient->phone_number }}
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col">
                            <strong>Date of Birth:</strong>
                            {{ $patient->age }}
                        </div>

                        <div class="col">
                            <strong>Gender:</strong>
                            {{ $patient->gender }}
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col">
                            <strong>Medical Aid:</strong>
                            {{ $patient->medical_aid }}
                        </div>

                        <div class="col">
                            <strong>Medical Aid Number:</strong>
                            {{ $patient->medical_aid_no }}
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col-lg-6">
                            <strong>L.M.P:</strong>
                            {{ $patient->l_m_p }}
                        </div>
                        <div class="col">
                            <strong>Examination:</strong>
                             {{ $patient->examination }}
                        </div>
                        <div class="col">
                            <strong>Priority:</strong>
                           {{ $patient->priority }}
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col">
                            <strong>Examination Requested</strong>
                            {{ $patient->examination_requested }}
                        </div>
                    </div>
                    <hr>
                    <div class="row g-2">
                        <div class="col">
                            <strong>History:</strong>
                            {{ $patient->history }}
                        </div>
                    </div>
                    <hr>
                    <div class="card-footer">
                    <a type="button" class="btn btn-danger btn-sm" href="{{ url()->previous() }}">{{ __('Back') }}</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
 
</section>
@endsection

@section('scripts')

@endsection