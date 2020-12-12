<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand"></a>
    @auth
        <form class="form-inline" id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            @if(Route::current()->getName() !== 'dashboard.list.get')
                <a class="btn btn-outline-primary my-2 my-sm-0 mr-3" href="{{ route("dashboard.list.get") }}">{{ __("dashboard.header.dashboard") }}<a/>
            @else
                <a class="btn btn-outline-primary my-2 my-sm-0 mr-3" href="{{ route("dashboard.main.get") }}">{{ __("dashboard.header.entry") }}<a/>
            @endif()
            <button type="submit" class="btn btn-outline-danger my-2 my-sm-0">{{ __('Logout') }}
            </button>
        </form>
    @else
        <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route("login") }}">Login</a>
    @endauth
</nav>
