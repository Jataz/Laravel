@extends('layouts.admin')
@section('title')
Request
@endsection
@include('partials.css')
@section('content')

<section class="content">

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">

                <!--Card Header-->
                <div class="card-header">
                    <h3 class="card-title">{{_('Examine')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form  action="{{ route('radiographer.update', [$patient->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-mb-6">
                                <label for="">Patient Name</label>
                                <input type="text" name="patient_name" class="form-control @error('patient_name') is-invalid @enderror"
                                    value="{{ $patient->patient_name }}">
                                @error('patient_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-mb-6">
                                <label for="">Upload Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" required name="image">
                                
                                @error('name')
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
                            <a type="button" class="btn btn-danger btn-sm" href="{{ url()->previous() }}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
        </div>
</div>

</section>


@endsection

