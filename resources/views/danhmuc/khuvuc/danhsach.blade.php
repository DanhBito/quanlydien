@extends('master')
@section('content')

    <nav class="navbar navbar-light bg-light " style="margin-bottom:-30px; ">
        <ul class="float-left mt-2">
            <a href="{{route('insertdistrict')}}" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Nhân Viên</a>
        </ul>
        <h1 class="d-inline text-center">
            Quản Lí Khu Vực
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
    <table class="table table-bordered  text-center" id="myTable">
        <thead class="thead-dark">
            <tr>
            <th width="15%" >ID Khu Vực</th>
            <th width="55%" >Tên Khu Vực</th>
            <th width="15%">Sửa</th>
            <th width="15%" >Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $list_districtes as $list_district )
                <tr>
                    <th width="15%" scope="row">{{$list_district->id}}</th>
                    <td width="55%" scope="row">{{$list_district->dis_name}}</td>
                    <td width="15%"> <a href="{!! route('updatedistrict', $list_district->id )!!}"> <i class="fas fa-pen"></i> </a> </td>
                    <td width="15%"> <a href="{!! route('deletedistrict', $list_district->id) !!}" class="text-danger"> <i class="fas fa-trash-alt"></i> </a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <ul class = "pagination justify-content-end" >
        {{ $list_districtes->links() }}
    </ul> --}}

    <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/khuvuc.js') }}"></script>
@endsection