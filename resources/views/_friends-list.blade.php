<h3 class="font-weight-bold mb-4">Friends</h3>

@forelse (auth()->user()->follows as $user)
    <div class="text-center text-md-left">
        <a href="{{ route("profile.show", $user->username) }}" class="text-reset text-decoration-none ">
            <div class="flex mb-3">
                <img class="img-fluid rounded-circle mr-2" src="{{$user->avatar}}" width="40px" height="40px" alt="">
                {{ $user->name }}
            </div>
        </a>
    </div>
@empty
    <p>You do not have any friends yet!</p>
@endforelse

