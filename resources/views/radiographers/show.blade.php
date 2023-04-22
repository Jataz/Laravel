@extends('layouts.admin')

@section('title')
Details
@endsection
@include('partials.css')
@section('content')

<section class="content">
    <div class="col d-flex justify-content-center">
        <div class="card w-80">
            <div class="card-header">
                <h3 class="card-title">
                  {{_('Image')}}
                </h3>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col">
                        <strong>Name:</strong>
                        {{ $patient->patient_name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <img src="{{ url('public/Image/'.$patient->image) }}" style="height: 400px; width: 400px;">
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