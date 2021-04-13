@extends('master')
@section('content')

    <nav class="navbar navbar-light bg-light " style="margin-bottom:-30px; ">
        <ul class="float-left mt-2">
            <button data-toggle="modal" data-target="#create" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Chất Lượng </button>
        </ul>
        <h1 class="d-inline text-center">
            Quản Lí Chất Lượng
        </h1>
        <ul class="form-inline float-right mt-2 ul-search">
            {{-- <input class="form-control mr-sm-2" id="input-search" type="search" placeholder="Search" aria-label="Search"> --}}
        </ul>
    </nav>



    <table class="table table-bordered  text-center" id="myTable">
        <thead class="thead-dark">
            <tr>
            <th width="15%" >ID </th>
            <th width="35%" >Chất Lượng</th>
            <th width="15%">Sửa</th>
            <th width="15%" >Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $datas as $data )
                <tr>
                    <th width="15%" scope="row">{{$data->id}}</th>
                    <td width="35%" scope="row">{{$data->qua_name}}</td>
                    <td width = "5%"> <button value="{{$data->id}}" type="button" class="btn btn-outline-warning btn-edit"
                        data-toggle="modal" data-target="#edit" > <i class="fas fa-pen"></i> </button> </td>
    
                   <td width = "5%"><button value="{{$data->id}}" type="button" 
                        class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- {{-- <ul class = "pagination justify-content-end" >
        {{ $list_districtes->links() }}
    </ul> --}} -->
    @include('danhmuc.chatluong.update')
    @include('danhmuc.chatluong.create')

    <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/chatluong.js') }}"></script> 
@endsection