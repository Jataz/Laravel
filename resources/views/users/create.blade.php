@extends('layouts.admin')

@section('title')
User
@endsection
@include('partials.css')
@section('content')

<section class="content">
    <div class="col d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <h3 class="card-title">
                    {{_('Create User')}}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}
        
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Example: 0773507202" value="{{ old('phone_number') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                        <select class="custom-select @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}">
                            <option value="">select</option>
                            <option value="Male"  @if (old('gender') == "Male") {{ 'selected' }} @endif>Male</option>
                            <option value="Female"  @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            
                        </span>
                        @enderror
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="confirm-password" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select name="role_id" class="custom-select @error('role_id') is-invalid @enderror">
                            <option value="">Please select a role</option>
                            @foreach (App\Models\Role::where('name', '!=', 'patient')->get() as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach

                        </select>
                        @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Strong Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="confirm-password" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" placeholder="Confirm Ppassword">
                    </div>
                </div>


        
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">{{ __('Save') }}</button>
                    <a type="button" class="btn btn-danger btn-sm" href="{{ route('users.index') }}">{{ __('Cancel') }}</a>
                </div>
                </form> 
            </div> 
        </div>
    </div>
 
</section>
@endsection
