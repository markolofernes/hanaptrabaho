<x-header />
    <div id="app">
       <x-Nav />
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="text-white d-flex justify-content-center align-items-center">
            <p class="mt-3">Copyright © 2023 | </p><span class="ms-2"><a href="{{ url('/') }}"><img src="\img\logo.png"
                        alt="hanaptrabahologo" width="150px" height="auto"></a></span>
        </footer>
    </div>
</body>

</html>