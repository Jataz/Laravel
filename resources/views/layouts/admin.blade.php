<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-user" style="color: rgb(35, 157, 233);"></i> &nbsp;
                        <span class="align-middle d-none d-sm-inline-block" style="font-weight: 700; color: rgb(35, 157, 233);"> {{ Auth::user()->name }}</span>
                    </a>
              </li>
            </ul>
        </nav>


        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <a  class="brand-link text-center" style="text-decoration:none; color: orange">
            
                <h3><span class="brand-text font-weight-light" style=" color: orange">Hospital</span></h3>
            </a>
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"  class="nav-link">
                                <i class="nav-icon fas fa-chalkboard"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        @if (auth()->user()->role_id == 1)
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ route('users.index') }}">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>Users</p>
                            </a>
                        </li>   
                        
                        @endif
<!--                         <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-text"></i>
                                <p>
                                    Doctor
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                
                            </ul> -->
                        @if (auth()->user()->role_id == 2)
                        <!-- DOctor Section-->

                        <li class="nav-item">
                                <a  class="nav-link" href="{{ route('patients.create') }}">
                                    <i class="nav-icon fas fa-plus-square"></i>
                                    <p>Request</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a  class="nav-link" href="{{ route('doctor.examined') }}">
                                    <i class="nav-icon 	fas fa-check-circle"></i>
                                    <p>Examined</p>
                                </a>
                            </li>

                            <li  class="nav-item">
                                <a href="{{ route('patients.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-desktop"></i>
                                    <p>Patients</p>
                                </a>
                            </li>
                        </li> 

                        @endif
                        
                        <!-- DOctor Section-->
                        
                        @if (auth()->user()->role_id == 3)
                        <!-- Grapher Section-->
                            <li class="nav-item">
                                <a  class="nav-link" href="{{ route('radiographer.requests') }}">
                                    <i class="nav-icon fas fa-plus-square"></i>
                                    <p>Requests</p>
                                </a>
                              </li>

                              <li class="nav-item">
                                <a  class="nav-link" href="{{ route('examined') }}">
                                    <i class="nav-icon 	fas fa-check-circle"></i>
                                    <p>Examined</p>
                                </a>
                              </li>                        
                        @endif

                         <!-- Secretary Section-->
                         @if (auth()->user()->role_id == 4)
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ route('secretary.request') }}">
                                <i class="nav-icon fas fa-plus-square"></i>
                                <p>Requests</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a  class="nav-link" href="{{ route('examined') }}">
                                <i class="nav-icon 	fas fa-check-circle"></i>
                                <p>Examined</p>
                            </a>
                       </li>

                       <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-medkit"></i>
                                <p>
                                    Appointments
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a  class="nav-link" href="{{ route('radiography.appointment') }}">
                                        <i class="nav-icon fas fa-heartbeat"></i>
                                        <p>Radiograph</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a  class="nav-link" href="{{ route('doctor.appointment') }}">
                                        <i class="nav-icon 	fas fa-user-md"></i>
                                        <p>Doctor</p>
                                    </a>
                                </li>   
                            </ul>
                        </li>
                            <!-- Secretary Section-->
                        
                        @endif

                        <li  class="nav-item">
                            <a href="{{ route('user.profile') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    Logout
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 399px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('pageName')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

              <!-- /Main Content-->
              <div class="content">

                @include('partials.alerts')
                @yield('content')
              </div>
        </div>
        <!-- /.content-wrapper -->

    <!-- Main Footer -->
      <footer class="main-footer">
        <!-- Default to the left -->
        <div class="text-center">
        <strong>Copyright &copy; <?php echo date('Y') ?> <a>Hospital</a>.</strong> All rights reserved.
        </div>

      </footer>
    </div>
    <!-- ./wrapper -->

        <!-- Scripts -->



        <script src="{{ asset('js/app.js') }}"></script>

        <script>

        $(function () {
            $('table').DataTable({
                processing: true,
                serverSide: false
            });
        });

        </script>
        <script>
            window.addEventListener('load', function()
{
    var xhr = null;

    getXmlHttpRequestObject = function()
    {
        if(!xhr)
        {               
            // Create a new XMLHttpRequest object 
            xhr = new XMLHttpRequest();
        }
        return xhr;
    };

    updateLiveData = function()
    {
        var now = new Date();
        // Date string is appended as a query with live data 
        // for not to use the cached version 
        var url = 'livefeed.txt?' + now.getTime();
        xhr = getXmlHttpRequestObject();
        xhr.onreadystatechange = evenHandler;
        // asynchronous requests
        xhr.open("GET", url, true);
        // Send the request over the network
        xhr.send(null);
    };

    updateLiveData();

    function evenHandler()
    {
        // Check response is ready or not
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            dataDiv = document.getElementById('liveData');
            // Set current data text
            dataDiv.innerHTML = xhr.responseText;
            // Update the live data every 1 sec
            setTimeout(updateLiveData(), 1000);
        }
    }
});
        </script>
                @yield('scripts')
    </body>

</html>
