@include('head')

<body class="bg-secondary">
    <div class="container pr-0 pl-0 bg-light">

        @include('layouts.logo')

        @include('layouts.header')

        @include('layouts.category')
        <div class="main position-relative">
            <!-- @yield('main') -->
            @yield('content')
        </div>

       
    </div>
    @include('layouts.footer')
</body>
</html>