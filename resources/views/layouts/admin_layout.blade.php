@include('layouts.header')

    <div class="d-flex flex-column min-vh-100">
        @include('layouts.admin_sidebar')
        
        <div class="content-wrapper flex-grow-1">
            <div class="content">
                @yield('content')
            </div>
        </div>

        
    </div>
    </div>
    @include('layouts.footer')
     <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
     @stack('scripts')
</body>
</html>
