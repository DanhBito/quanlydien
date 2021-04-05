@extends('master')
@section('content')
    @if (session('alert_error'))
        <div class="alert alert-danger">
            {{session('alert_error')}}
        </div>
    @elseif(session('alert_success'))
            <div class="alert alert-success">
            {{session('alert_success')}}
        </div>
    @endif

    <nav class="navbar navbar-light bg-light ">
        <h3 class="d-inline">
            Quản Lí Nhân Viên
        </h3>
        <form class="form-inline float-right">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success  my-sm-0" type="submit">Search</button>
        </form>
    </nav>


    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <form action="#">
                
                <thead class="thead-dark ">
                    <tr>
                    <th width = "5%" >ID</th>
                    <th width = "18%" >Họ Và Tên</th>
                    <th width = "7%" >Giới Tính </th>
                    <th width = "10%" >Địa Chỉ </th>
                    <th width = "10%" >Số Điện Thoại </th>
                    <th width = "10%" >Chức Vụ </th>
                    <th width = "10%" >Tên Đăng Nhập </th>
                    <th width = "5%">Xem </th>
                    <th width = "5%">Sửa</th>
                    <th width = "5%" >Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $list_users as $list_user )
                        <tr>
                            <th width = "5%" scope="row">{{$list_user->id}}</th>
                            <td width = "18%" scope="row">{{$list_user->fullname}}</td>
                            <td width = "7%" scope="row">{{$list_user->gender}}</td>
                            <td width = "10%" scope="row">{{$list_user->address}}</td>
                            <td width = "10%" scope="row">{{$list_user->phone}}</td>
                            <td width = "10%" scope="row">{{$list_user->dpm_id}}</td>
                            <td width = "10%" scope="row">{{$list_user->username}}</td>
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                            <td width = "5%"> <button  value="{{$list_user->id}}" type="button" class="btn btn-outline-primary btn-show" 
                                data-toggle="modal" data-target="#viewuser" > <i class="fas fa-eye" ></i> </button> </td>
                            
                            <td width = "5%"><button value="{{$list_user->id}}" type="button" class="btn btn-outline-warning btn-edit"
                                 data-toggle="modal" data-target="#updateuser" > <i class="fas fa-pen"></i> </button> </td>
                            
                            <td width = "5%"><button value="{{$list_user->id}}" type="button" class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </form>
            
        </table>
    </div>
    
    <ul class="pagination float-left ml-3">
        <a href="{{route('dangky')}}" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Nhân Viên</a>
    </ul>
    <ul class = "pagination justify-content-end" >
        {{ $list_users->links() }}
    </ul>

  @include('danhmuc.nhanvien.viewuser')
  @include('danhmuc.nhanvien.updateuser')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('js/nhanvien.js') }}"></script>

@endsection