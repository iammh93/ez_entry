<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand"></a>
    @auth
        <form class="form-inline" id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger my-2 my-sm-0">{{ __('Logout') }}
            </button>
        </form>
    @else
        <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route("login") }}">Login</a>
    @endauth
</nav>
