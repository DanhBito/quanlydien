@extends('master')
@section('content')

    <nav class="navbar navbar-light bg-light " style="margin-bottom:-30px; ">
        <ul class="float-left mt-2">
            {{-- <a href="{{route('createvt')}}">abc</a> --}}
            <button id="btn-create" data-toggle="modal" data-target="#create" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Vật Tư </button>
        </ul>
        <h1 class="d-inline text-center">
            Quản Lí Vật Tư
        </h1>
        <ul class="form-inline float-right mt-2 ul-search">
            {{-- <input class="form-control mr-sm-2" id="input-search" type="search" placeholder="Search" aria-label="Search"> --}}
        </ul>
    </nav>



    <table class="table table-bordered  text-center" id="myTable">
        <thead class="thead-dark">
            <tr>
            <th width="5%" >ID </th>
            <th width="15%" >Tên Vật Tư</th>
            <th width="7%" >SL</th>
            <th width="10%" >Đơn Vị Tính</th>
            <th width="14%" >Giá Vật Tư</th>      
            <th width="14%" >Tổng Tiền</th>       
            <th width="10%" >Chất Lượng</th>
            <th width="15%" >Nhà Sản Xuất</th>
            <th width="5%">Sửa</th>
            <th width="5%" >Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $datas as $data )
                <tr>
                    <th width="5%" scope="row">{{$data->id}}</th>
                    <td width="15%" scope="row">{{$data->sup_name}}</td>
                    <td width="7%" scope="row">{{$data->sup_amount}}</td>
                    @if($data->unit->unit_simplify)
                    <td width="10%" scope="row">{{$data->unit->unit_simplify}}</td>
                    @else
                        <td width="10%" scope="row">{{$data->unit->unit_name}}</td>
                    @endif
                    <td width="14%" scope="row">{{$data->sup_price}}</td>
                    <td width="14%" scope="row">{{$data->sup_price * $data->sup_amount}}</td>
                    <td width="10%" scope="row">{{$data->quality->qua_name}}</td>
                    <td width="15%" scope="row">{{$data->producer->pro_name}}</td>
                    <td width = "5%"> <button value="{{$data->id}}" type="button" class="btn btn-outline-warning btn-edit"
                        data-toggle="modal" data-target="#edit" > <i class="fas fa-pen"></i> </button> </td>
    
                   <td width = "5%"><button value="{{$data->id}}" type="button" 
                        class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('danhmuc.vattu.create')
    @include('danhmuc.vattu.update')


    <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/vattu.js') }}"></script> 
@endsection