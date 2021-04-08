@extends('master')
@section('content')

    <nav class="navbar navbar-light bg-light " style="margin-bottom:-30px; ">
        <ul class="float-left mt-2">
            <a href="{{route('dangky')}}" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Nhân Viên</a>
        </ul>
        <h1 class="d-inline text-center">
            Quản Lí Nhân Viên
        </h1>
        <ul class="form-inline float-right mt-2 ul-search">
            {{-- <input class="form-control mr-sm-2" id="input-search" type="search" placeholder="Search" aria-label="Search"> --}}
        </ul>
        {{-- <ul class="float-right mt-2">
            <a href="{{route('dangky')}}" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Nhân Viên</a>
        </ul> --}}
        @if (count($errors) > 0)
        <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                   <li>{{ $err }}</li> 
                @endforeach
        </div>
      @endif
    </nav>


    <div class="table-responsive">
        <table class="table table-bordered text-center" id="myTable">
            <form action="#">
                
                <thead class="thead-dark ">
                    <tr>
                    <th width = "5%" >ID</th>
                    <th width = "13%" >Họ Và Tên</th>
                    <th width = "7%" >GT</th>
                    <th width = "20%" >Địa Chỉ </th>
                    <th width = "10%" >Số Điện Thoại </th>
                    <th width = "10%" >Chức Vụ </th>
                    <th width = "10%" >Username</th>
                    <th width = "5%">Xem </th>
                    <th width = "5%">Sửa</th>
                    <th width = "5%" >Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $list_users as $list_user )
                        <tr>
                            <th width = "5%" scope="row">{{$list_user->id}}</th>
                            <td width = "13%" scope="row">{{$list_user->fullname}}</td>
                            <td width = "7%" scope="row">{{$list_user->gender}}</td>
                            <td width = "20%" scope="row">{{$list_user->address}}</td>
                            <td width = "10%" scope="row">{{$list_user->phone}}</td>
                            <td width = "10%" scope="row">{{$list_user->deparment->dpm_name}}</td>
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
    <div id="pagination">

        {{-- <ul class = "pagination justify-content-end" id="">
            {{ $list_users->links() }}
        </ul> --}}
    </div>


  @include('danhmuc.nhanvien.viewuser')
  @include('danhmuc.nhanvien.updateuser')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/nhanvien.js') }}"></script>

@endsection