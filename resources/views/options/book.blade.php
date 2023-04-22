@extends('layouts.admin')
@section('title')
Request
@endsection
@include('partials.css')
@section('content')

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<section class="content">

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">

                <!--Card Header-->
                <div class="card-header">
                    <h3 class="card-title">{{_('Make Appointment')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form  action="{{ route('doctor.update', [$patient->id]) }}"  method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="">Patient Name</label>
                                <input type="text" name="patient_name" value="{{ $patient->patient_name}}" class="form-control">
                                @error('patient_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="">Appointment Date</label>
                                <input type="datetime-local"  name="appointment_rad" class="form-control @error('appointment_rad') is-invalid @enderror">
                                @error('appointment_rad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary ">Submit</button>
                            <a type="button" class="btn btn-danger btn-sm" href="{{ route('secretary.request')  }}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
        </div>
</div>

</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    config = {
        enableTime: true,
        dateFormat: 'Y-m-d H:i',
    }
    flatpickr("input[type=datetime-local]", config);
</script>
@endpush
@endsection

