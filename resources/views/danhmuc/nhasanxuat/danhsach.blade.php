@extends('master')
@section('content')

    <nav class="navbar navbar-light bg-light " style="margin-bottom:-30px; ">
        <ul class="float-left mt-2">
            <a href="{{route('insertdistrict')}}" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Nhà Sản Xuất</a>
        </ul>
        <h1 class="d-inline text-center">
            Quản Lí Nhà Sản Xuất
        </h1>
        <ul class="form-inline float-right mt-2 ul-search">
            {{-- <input class="form-control mr-sm-2" id="input-search" type="search" placeholder="Search" aria-label="Search"> --}}
        </ul>
    </nav>
    @if (session('alert_error'))
        <div class="alert alert-danger">
            {{session('alert_error')}}
        </div>
    @elseif(session('alert_success'))
            <div class="alert alert-success">
            {{session('alert_success')}}
        </div>
    @endif
    <table class="table table-bordered text-center" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th width = "5%" >ID</th>
                <th width = "15%" >Tên Nhà Sản Xuất</th>
                <th width = "15%" >Địa Chỉ</th>
                <th width = "10%" >SĐT</th>
                <th width = "15%" >Email</th>
                <th width = "15%" >Nhân Viên Đại Diện</th>
                <th width = "15%" >Khu Vực</th>
                <th width = "5%">Sửa</th>
                <th width = "5%" >Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $datas as $data )
                <tr>
                   
                    <th width = "5%" scope="row">{{$data->id}}</th>
                    <td width = "15%" scope="row">{{$data->pro_name}}</td>
                    <td width = "15%" scope="row">{{$data->pro_address}}</td>
                    <td width = "10%" scope="row">{{$data->pro_phone}}</td>
                    <td width = "15%" scope="row">{{$data->pro_email}}</td>
                    <td width = "15%" scope="row">{{$data->pro_employee}}</td>
                    <td width = "15%" scope="row">{{$data->district->dis_name}}</td>
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
 
                    <td width = "5%"> <button value="{{$data->id}}" type="button" class="btn btn-outline-warning btn-edit"
                         data-toggle="modal" data-target="#edit" > <i class="fas fa-pen"></i> </button> </td>
                    
                    <td width = "5%"><button value="{{$data->id}}" type="button" class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <ul class="pagination float-left ml-3">
        <a type="button" data-toggle="modal" data-target="#create" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Nhà Sản Xuất</a>
    </ul> --}}
    {{-- <ul class = "pagination justify-content-end" >
        {{ $datas->links() }}
    </ul> --}}

    @include('danhmuc.nhasanxuat.update')
    @include('danhmuc.nhasanxuat.create')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/nhasanxuat.js') }}"></script>
@endsection