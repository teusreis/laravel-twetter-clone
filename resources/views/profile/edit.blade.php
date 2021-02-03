@extends('layouts.main')

@section('main-content')

    <form action="{{ route("profile.update", $user->username) }}" method="post" enctype="multipart/form-data">
        @method("PATCH")
        @csrf

        <div class="form-group">
            <label for="avatar">Avatar img</label>
            <input type="file" name="avatar" id="avatar" class="form-control" value="{{ old("avatar") ?? $user->avatar }}">

            @error('avatar')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="banner">banner img</label>
            <input type="file" name="banner" id="banner" class="form-control" value="{{ old("banner") ?? $user->banner }}">

            @error('banner')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old("name") ?? $user->name }}">

            @error('name')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old("description") ?? $user->description }}</textarea>
            @error('description')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old("username") ?? $user->username }}">

            @error('username')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old("email") ?? $user->email }}">

            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>

        <a href="{{ route("profile.show", $user->username) }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>
@endsection
