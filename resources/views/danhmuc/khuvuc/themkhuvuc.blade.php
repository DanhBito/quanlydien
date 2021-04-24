@extends('master')

@section('content')
<div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3">Quản Lý Khu Vực</div>
                    <div class="card-body">
                        @if (session('alert_error'))
                            <div class="alert alert-danger">
                                {{session('alert_error')}}
                            </div>
                        @elseif(session('alert_success'))
                             <div class="alert alert-success">
                                {{session('alert_success')}}
                            </div>
                        @endif
                        <form action="{{route('postinsertdistrict')}}" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <div class="form-group row">
                                <label for="district_name" class="col-md-4 col-form-label text-md-right">Tên Khu Vực</label>
                                <div class="col-md-6">
                                    <input type="text" id="district_name" class="form-control" name="district_name"
                                    placeholder="Tên Khu Vực"  required>
                                </div>
                            </div>


                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Xác Nhận
                                </button>
                                <a href="{{route('khuvuc')}}" class="btn btn-primary ml-4">
                                    Trở Về
                                </a>
                            </div>
                        </form>   
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection