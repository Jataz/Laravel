@extends('layouts.admin')

@section('title')
Details
@endsection
@include('partials.css')
@section('content')

<section class="content">
    <div class="col d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <h3 class="card-title">
                  {{_('View Details')}}
                </h3>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col">
                        <strong>Name:</strong>
                        {{ $patient->name }}
                    </div>
                </div>
                <hr>
                <div class="row g-2">
                    <div class="col">
                        <strong>Date of Birth:</strong>
                        {{ $patient->d_o_b }}
                    </div>
                </div>
                <hr>
                <div class="row g-2">
                    <div class="col">
                        <strong>Phone Number:</strong>
                        {{ $patient->phone_number }}
                    </div>
                </div>
                <hr>
                <div class="row g-2">
                    <div class="col">
                        <strong>Examination:</strong>
                        <label class="badge badge-success"> {{ $patient->examination }}</label>
                       
                    </div>
                </div>
                <hr>
                <div class="card-footer">
                <a type="button" class="btn btn-danger btn-sm" href="{{ url()->previous() }}">{{ __('Back') }}</a>
                </div>
            </div> 
        </div>
    </div>
 
</section>
@endsection

@section('scripts')

@endsection