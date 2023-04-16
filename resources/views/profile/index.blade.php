@extends('layouts.admin')

@section('title')
Profile
@endsection
@include('partials.css')
@section('content')

<section class="content">
    <div class="col d-flex justify-content-center">
       
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div>

                            <div>
                                <form class="form-horizontal" method="POST" action="{{ route('user.postProfile') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name"  id="name" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->name }}" required placeholder="Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group button">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
       
    </div>
</section>
@endsection