@include('head')

<body class="bg-secondary">
    <div class="container pr-0 pl-0 bg-light">

        @include('layouts.logo')

        @include('layouts.header')

        @include('layouts.category')
        <div class="main">
            <!-- @yield('main') -->
            @yield('content')
        </div>

       
    </div>
    @include('layouts.footer')

    

</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/viewuser.js') }}" defer></script> -->
</html>