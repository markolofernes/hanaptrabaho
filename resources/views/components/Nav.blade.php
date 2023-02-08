 <nav class="navbar navbar-expand-md bg-body-tertiary bg-dark text-light sticky-top py-4">  
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <div style="position:abosolute;left: 10px;top:5px;margin:0;z-index:3">
                <img src="\img\logo.png" alt="hanaptrabahologo" width="200px" height="auto">
                {{-- {{ config('app.name') }} --}}
            </div>
        </a>
        <button class="navbar-toggler type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
                    @if (Route::has('login'))
                    @auth
                    <div class="text-light">
                        <a href="{{ url('/') }}"
                        class="{{ Request::path() === '/' ? 'active' : 'text-black' }}">Home</a>
                        <a href="{{ url('/home') }}"
                        class="{{ Request::path() === 'home' ? 'active' : 'text-black' }}"> Dashboard</a>
                    </div>
                    @endauth
                    @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><button
                            class="btn btn-warning rounded-pill btn-sm">{{ __('Login') }}</button></a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><button
                            class="btn btn-warning rounded-pill btn-sm">{{ __('Register') }}</button></a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-warning" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                {{-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                </div> --}}
            </ul>
        </div>
    </div>
</nav>

{{-- <script>
    const switchBtns = document.querySelector('#darkSwitch');

    switchBtns.addEventListener('change', (e) => {
    document.body.classList.toggle('dark', e.target.checked);

    const div = document.querySelector('div');
    const theme = div.getAttribute('data-bs-theme');

if (theme === 'dark') {
    div.setAttribute('data-bs-theme', 'light');
} else {
    div.setAttribute('data-bs-theme', 'dark');
}
});

</script> --}}