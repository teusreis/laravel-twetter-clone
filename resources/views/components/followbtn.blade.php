<div {{ $attributes }} >
    @if (auth()->user()->isNot($user))

        @if (auth()->user()->isFollowing($user))

            <form action=" {{ route("profile.unfollow", $user->username) }} " method="POST" id="unfollow-me" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn font-weight-bold btn-primary mr-auto py-1 px-2 rounded">
                    Unfollow me
                </button>
            </form>

        @else

            <form action=" {{ route("profile.follow", $user->username) }} " method="POST" id="follow-me" class="d-inline">
                @csrf
                <button type="submit" class="btn font-weight-bold btn-primary mr-auto py-1 px-2 rounded">
                    Follow Me
                </button>
            </form>

        @endif

    @endif
</div>
