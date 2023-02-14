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
    @livewireScripts
</body>
</html>
    </div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#toggle-btn').click(function() {
            $('#component-1').toggle();
            $('#component-2').toggle();
        });
    });
</script>

{{-- <script>
    $(document).ready(function() {
        $('#toggle-btn').click(function() {
            $('#component').toggle();
        });
    });
</script>  --}}
</body>
</html>