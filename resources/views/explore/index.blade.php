@extends('layouts.main')

@section('main-content')

    <div class="">
        @foreach ($users as $user)

            <div class="row mb-3 {{ $loop->last ? "": "border-bottom" }}">
                <div class="col-md-1 text-center">
                    <img class="img-fluid rounded-circle" src="{{ $user->avatar }}" width="50px" height="50px" alt="">
                </div>
                <div class="col-md-10">
                    <a href="{{route("profile.show", $user->username)}}" class="text-decoration-none text-dark">
                        <h4>@ {{ $user->username }}</h4>
                    </a>

                    <p class="text-muted">
                        {{ $user->description }}
                    </p>
                </div>
            </div>

        @endforeach
    </div>

    <div class="">
        {{ $users->onEachSide(3)->links() }}
    </div>

@endsection
