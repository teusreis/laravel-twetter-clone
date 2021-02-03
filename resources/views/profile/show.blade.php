@extends('layouts.main')

@section('main-content')

    <div id="profile-banner position-relative" class="mb-3" style="min-height: 224px; background: url('{{ $user->banner }}'); background-position: cover;">
        {{-- 700px x 224px --}}

        <div id="profile-img">
            <img class="d-block mx-auto rounded-circle position-absolute" src="{{ $user->avatar }}"  style="top: 140px; left: calc(50% - 75px);" alt="">
        </div>

    </div>

    <header class="mb-3">

        <div class="d-flex justify-content-between ">

            <div class="col-4 px-0">
                <h2 class="h4"> {{ $user->name }} </h2>
                <p> {{ $user->created_at->diffForHumans() }} </p>
            </div>

            <div class="col-4">

            </div>

            <div class="col-4 text-right px-0">

                @can('update', $user)
                    <a href="{{ route("profile.edit", $user->username) }}" class="btn font-weight-bold d-inline mr-auto py-1 px-2">Edit Profile</a>
                @endcan

                <x-followbtn class="d-inline" :user="$user"></x-followbtn>

            </div>

        </div>
        <p class="text-muted">
            {{ $user->description }}
        </p>
    </header>

    <x-tweets  :tweets="$tweets" />

@endsection
