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
                  {{_('View Details')}}
                </h3>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col">
                        <strong>Name</strong>
                        {{ $role->name }}</p>
                    </div>
                </div>
                
                <div class="row g-2">
                    <div class="col">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $p)
                                <label class="label label-success">{{ $p->name }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
                <hr>
                <div class="card-footer">
                    <a type="button" class="btn btn-danger btn-sm" href="{{ route('roles.index') }}">{{ __('Close') }}</a>
                </div>
            </div> 
        </div>
    </div>
 
</section>
@endsection

@section('scripts')

@endsection