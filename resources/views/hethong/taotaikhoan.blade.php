
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
                    <div class="card-header">Tạo Tài Khoản</div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                       <li>{{ $err }}</li> 
                                    @endforeach
                            </div>
                        @endif

                        @if (session('thongbao'))
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                        @endif 
                        <form action="" method="">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group row">
                                <label for="fullname" class="col-md-4 col-form-label text-md-right">Họ và Tên</label>
                                <div class="col-md-6">
                                    <input type="text" id="fullname" class="form-control" name="fullname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Giới tính</label>
                                <div class="col-md-6">
                                    <!-- <input type="text" id="gender" class="form-control" name="gender" required> -->
                                    <select name="gender" id="gender" class="form-control" name="gender">
                                        <option selected>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birth" class="col-md-4 col-form-label text-md-right">Ngày Sinh</label>
                                <div class="col-md-6">
                                    <input type="date" id="birth" class="form-control" name="birth" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Địa Chỉ</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" class="form-control" name="address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cmnd" class="col-md-4 col-form-label text-md-right">Số CMND</label>
                                <div class="col-md-6">
                                    <input type="text" id="cmnd" class="form-control" name="cmnd" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Số Điện Thoại</label>
                                <div class="col-md-6">
                                    <input type="text" id="phone_number" class="form-control" name="phone_number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_joining" class="col-md-4 col-form-label text-md-right">Ngày Vào Làm</label>
                                <div class="col-md-6">
                                    <input type="date" id="date_joining" class="form-control" name="date_joining" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Chức Vụ</label>
                                <div class="col-md-6">
                                    <input type="text" id="position" class="form-control" name="position" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_new" class="col-md-4 col-form-label text-md-right">Mật Khẩu</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_new" class="form-control" name="password_new" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Nhập Lại Mật Khẩu</label>
                                <div class="col-md-6">
                                    <input type="password" id="password_confirm" class="form-control" name="password_confirm" required>
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Đăng Ký
                                </button>
                                <a href="home" class="btn btn-primary ml-4">
                                    Trở Về
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