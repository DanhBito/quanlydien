
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/style_home.css') }}">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Laravel</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }

        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }

        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>
<body>
@include('layouts.logo')
<!-- <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav> -->

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">?????i M???t Kh???u</div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                       <li>{{ $err }}</li> 
                                    @endforeach
                            </div>
                        @endif

                        @if (session('alert_error'))
                            <div class="alert alert-danger">
                                {{session('alert_error')}}
                            </div>
                        @elseif(session('alert_success'))
                             <div class="alert alert-success">
                                {{session('alert_success')}}
                            </div>
                        @endif
                        <form action="{{route('checkDoiMatKhau')}}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group row">
                                <label for="password_old" class="col-md-4 col-form-label text-md-right">M???t Kh???u C??</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_old" class="form-control" name="password_old" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_new" class="col-md-4 col-form-label text-md-right">M???t Kh???u M???i</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_new" class="form-control" name="password_new" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Nh???p L???i M???t Kh???u</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_confirm" class="form-control" name="password_confirm" required>
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    X??c Nh???n
                                </button>
                                <a href="{{route('home')}}" class="btn btn-primary ml-4">
                                    Tr??? V???
                                </a>
                            </div>
                        </form>   
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

</body>

</html>