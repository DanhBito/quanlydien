

@extends('master')

@section('thongtincongty')
<main class="login-form position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thông Tin Công Ty</div>
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
                        <!-- <form action="" method=""> -->
                            <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right font-weight-bold"><i class="fas fa-building"></i> Tên Công Ty:</label>
                                <div class="col-md-6">
                                    @if (session('cty_ten'))
                                        <h6 class="pt-2">  {{session('cty_ten')}}</h6>
                                    @endif 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right font-weight-bold"><i class="fas fa-map-marker-alt"></i> Địa Chỉ:</label>
                                <div class="col-md-6">
                                    @if (session('cty_diachi'))
                                        <h6 class="pt-2">  {{session('cty_diachi')}}</h6>
                                    @endif                             
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right font-weight-bold"><i class="fas fa-phone-square-alt"></i> Số điện thoại:</label>
                                <div class="col-md-6">
                                    @if (session('cty_sdt'))
                                        <h6 class="pt-2">  {{session('cty_sdt')}}</h6>
                                    @endif                               
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right font-weight-bold"><i class="fas fa-envelope"></i> Email:</label>
                                <div class="col-md-6">
                                     @if (session('cty_email'))
                                        <h6 class="pt-2">  {{session('cty_email')}}</h6>
                                    @endif                             
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right font-weight-bold"><i class="fab fa-chrome"></i> Website:</label>
                                <div class="col-md-6">
                                    @if (session('cty_website'))
                                        <h6 class="pt-2 ">
                                            <a href="/" class="pt-2 ">  {{session('cty_website')}}</a>
                                        </h6>
                                    @endif                               
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-5">
                                @if(session('cv_id')===1 || session('cv_id')===2)
                                     <a href="suathongtincty" class="btn btn-primary ml-4">Sửa</a>
                                @endif
                            </div>
                        <!-- </form>    -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


