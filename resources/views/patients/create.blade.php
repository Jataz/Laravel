@extends('layouts.admin')
@section('title')
Patient
@endsection
@include('partials.css')
@section('content')

<section class="content">

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{_('Create Patient')}}
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Full Name</label>
                                <input type="text" name="patient_name" class="form-control @error('patient_name') is-invalid @enderror"
                                    value="{{ old('patient_name') }}" placeholder="Enter Name & Surname">
                                @error('patient_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number') }}" placeholder="Example: 0773507202">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Age</label>
                                <input type="text" name="age" class="form-control @error('age') is-invalid @enderror"
                                    value="{{ old('age') }}" placeholder="Age">
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="">Gender</label>
                                <select class="custom-select @error('gender') is-invalid @enderror" name="gender">
                                    <option value="">select</option>
                                    <option value="Male"  @if (old('gender') == "Male") {{ 'selected' }} @endif>Male</option>
                                    <option value="Female"  @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Medical Aid</label>
                                <input type="text" name="medical_aid" class="form-control @error('medical_aid') is-invalid @enderror"
                                    value="{{ old('medical_aid') }}" placeholder="Medical aid">
                                @error('medical_aid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="">Medical Aid No</label>
                                <input type="text" name="medical_aid_no"
                                    class="form-control @error('medical_aid_no') is-invalid @enderror" placeholder="Medical Aid Number"
                                    value="{{ old('medical_aid_no') }}">
                                @error('medical_aid_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <label for="">L.M.P</label>
                                <input type="text" name="l_m_p"
                                    class="form-control @error('l_m_p') is-invalid @enderror" placeholder="Last Menstrual period"
                                    value="{{ old('l_m_p') }}">
                                @error('l_m_p')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-3">
                                <label for="">Examination</label>
                                <select class="custom-select @error('examination') is-invalid @enderror" name="examination">
                                    <option value="">select</option>                                    
                                    <option value="General Radiology"  @if (old('examination') == "General Radiology") {{ 'selected' }} @endif>General Radiology</option>
                                    <option value="Screening"  @if (old('examination') == "Screening") {{ 'selected' }} @endif>Screening</option>
                                    <option value="Ultrasound"  @if (old('examination') == "Ultrasound") {{ 'selected' }} @endif>Ultrasound</option>
                                    <option value="Panorex"  @if (old('examination') == "Panorex") {{ 'selected' }} @endif>Panorex</option>
                                    <option value="C.T. Scanning"  @if (old('examination') == "C.T. Scanning") {{ 'selected' }} @endif>C.T. Scanning</option>
                                    <option value="Doppler"  @if (old('examination') == "Doppler") {{ 'selected' }} @endif>Doppler</option>
                                    <option value="C.T. Angiography"  @if (old('examination') == "C.T. Angiography") {{ 'selected' }} @endif>C.T. Angiography</option>
                           
                                </select>
                                @error('examination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <label for="">Priority</label>
                                <select class="custom-select @error('priority') is-invalid @enderror" name="priority">
                                    <option value="">select</option>                                    
                                    <option value="High"  @if (old('priority') == "High") {{ 'selected' }} @endif>High</option>
                                    <option value="Low"  @if (old('priority') == "Low") {{ 'selected' }} @endif>Low</option>
                           
                                </select>
                                @error('priority')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Examination Requested</label>
                                <textarea name="examination_requested" class="form-control @error('examination_requested') is-invalid @enderror" placeholder="Examination Requested" rows="2"  >{{ old('examination_requested') }}</textarea>
                                @error('examination_requested')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">History</label>
                                <textarea name="history" class="form-control @error('history') is-invalid @enderror" placeholder="Patient History" rows="2"  >{{ old('history') }}</textarea>
                                @error('history')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">{{ __('Save') }}</button>
                            <button class="btn btn-sm btn-danger" href="{{ route('patients.index')  }}">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

</section>


@endsection
