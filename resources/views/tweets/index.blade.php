@extends('layouts.main')

@section('main-content')

    @include('_main-tweets')

    <div class="border rounded p-3 my-3">

        <x-tweets  :tweets="$tweets" />

    </div>


@endsection
