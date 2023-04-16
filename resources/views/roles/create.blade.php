@extends('layouts.admin')

@section('title')
Role
@endsection
@include('partials.css')
@section('content')
<section class="content">
    <div class="col d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <h3 class="card-title">
                    {{_('Create Role')}}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                {{ csrf_field() }}
        
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Role Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Permissions</label>
                    <div class="col-sm-9">
                        <div class="col">
                          <div  class="form-control" style="height: 500px; overflow: auto;">
                              @foreach($permission as $value)
                              <ul type = "square">
                              <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} 
                                <strong>{{ $value->name }}</strong></label>
                              </ul>
                              @endforeach
                          </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">{{ __('Save') }}</button>
                    <a type="button" class="btn btn-danger btn-sm" href="{{ route('roles.index') }}">{{ __('Cancel') }}</a>
                </div>
                </form> 
            </div> 
        </div>
    </div>
 
</section>
@endsection
@section('scripts')
<script>
$(document).ready(function () {
    $('#example').DataTable({
        paging: false,
        ordering: false,
        info: false,
    });
});
</script>
@endsection
