

@extends('master')

@section('suathongtincongty')
<main class="login-form position-relative">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thông Tin Công Ty</div>
                    <div class="card-body">
<!-- 
                        @if (session('infor_company'))
                            <div class="alert alert-danger">
                                {{session('infor_company')}}
                            </div>
                        @endif  -->
                        <form action="{{route('updatethongtincty')}}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Tên Công Ty</label>
                                <div class="col-md-6">
                                    <input type="text" id="cty_ten" class="form-control" name="cty_ten" placeholder="Tên Công Ty" 
                                    value="{{Session::get('cty_ten')}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Địa Chỉ</label>
                                <div class="col-md-6">
                                    <input type="text" id="cty_diachi" class="form-control" name="cty_diachi" placeholder="Địa Chỉ" 
                                    value="{{Session::get('cty_diachi')}}" required>                            
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Số điện thoại</label>
                                <div class="col-md-6">
                                    <input type="text" id="cty_sdt" class="form-control" name="cty_sdt" placeholder="Số điện thoại" 
                                    value="{{Session::get('cty_sdt')}}" required>                             
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="cty_email" class="form-control" name="cty_email" placeholder="Email" 
                                    value="{{Session::get('cty_email')}}" required>                            
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text_old" class="col-md-4 col-form-label text-md-right">Website</label>
                                <div class="col-md-6">
                                    <input type="text" id="cty_website" class="form-control" name="cty_website" placeholder="Website" 
                                    value="{{Session::get('cty_website')}}" required>                              
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Xác Nhận
                                </button>
                                <a href="thongtincongty" class="btn btn-primary ml-4">
                                    Hủy
                                </a>
                            </div>
                        </form>   
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


