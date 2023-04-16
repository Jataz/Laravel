<div class="">
    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-bs-dismiss="alert">×</button>

        <i class="icon fas fa-check"></i> {{ $message }}

    </div>

    @endif


    @if ($message = Session::get('error'))

    <div class="alert alert-danger alert-block">

        <button type="button" class="close" data-bs-dismiss="alert">×</button>

        <i class="icon fas fa-ban"></i> {{ $message }}

    </div>

    @endif


    @if ($message = Session::get('warning'))

    <div class="alert alert-warning alert-block">

        <button type="button" class="close" data-bs-dismiss="alert">×</button>

        <i class="icon fas fa-exclamation-triangle"></i> {{ $message }}

    </div>

    @endif


    @if ($message = Session::get('info'))

    <div class="alert alert-info alert-block">

        <button type="button" class="close" data-bs-dismiss="alert">×</button>

        <i class="icon fas fa-info"></i> {{ $message }}

    </div>

    @endif




</div>
