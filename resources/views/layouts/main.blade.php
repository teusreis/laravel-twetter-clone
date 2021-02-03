@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-1 col-md-2 px-0 text-center text-md-left">
            @include('_sidebar-links')
        </div>

        <div class="col-11 col-md-8">

            @yield('main-content')

        </div>

        <div class="col-12 col-md-2 d-none d-md-block">
            @include('_friends-list')
        </div>
    </div>
@endsection
