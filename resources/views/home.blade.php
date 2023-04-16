@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ App\Models\User::where('role_id', 2)->count() }}</h3>

                <p>Doctors</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ App\Models\User::where('role_id', 3)->count() }}</h3>

                <p>Radiographers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ App\Models\Patient::count() }}</h3>

                <p>Total Patients</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>

          @if (auth()->user()->role_id == 4)
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

             
                <h3>{{ App\Models\Patient::where('patient_status', 1)->count() }}</h3>
           
                <p>Today Requests</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          @endif

          @if (auth()->user()->role_id == 3)
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

             
                <h3>{{ App\Models\Patient::where('patient_status', 2)->count() }}</h3>
           
                <p>Today Requests</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          @endif

          @if (auth()->user()->role_id == 1)
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ App\Models\Role::count() }}</h3>

                <p>Roles</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->

          @endif
        </div>
                </div>
            </div>
      

    </div>
</div>



@endsection
