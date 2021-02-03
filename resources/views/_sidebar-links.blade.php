<ul class="p-0 text-sm-center text-md-left ">
    <li class="font-weight-bold text-lb mb-4 d-block">
        <a href="{{ route("home") }}" class="text-dark" >
            <i class="fas fa-home"></i>
            <span class="d-none d-md-inline">Home</span>
        </a>
    </li>
    <li class="font-weight-bold text-lb mb-4 d-block">
        <a href="{{ route("explore.index") }}" class="text-dark" >
            <i class="fas fa-users"></i>
            <span class="d-none d-md-inline">
                Explore
            </span>
        </a>
    </li>
    <li class="font-weight-bold text-lb mb-4 d-block">
        <a href="{{ route("profile.show", auth()->user()->username) }}" class="text-dark" >
            <i class="fas fa-user"></i>
            <span class="d-none d-md-inline">Profile</span>
        </a>
    </li>
    <li class="font-weight-bold text-lb mb-4 d-block">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
            @csrf
            <button type="submit" class="btn btn-outline-dark">
                <i class="fas fa-times-circle"></i>
                <span class="d-none d-md-inline">Logout</span>
            </button>
        </form>
    </li>
</ul>
