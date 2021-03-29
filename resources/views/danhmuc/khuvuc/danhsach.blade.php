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
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
            <th colspan="2" >ID Khu Vực</th>
            <th colspan="6" >Tên Khu Vực</th>
            <th colspan="2">Sửa</th>
            <th colspan="2" >Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $list_districtes as $list_district )
                <tr>
                    <th colspan="2" scope="row">{{$list_district->id}}</th>
                    <td colspan="6" scope="row">{{$list_district->dis_name}}</td>
                    <td colspan="2"> <a href="{!! route('updatedistrict', $list_district->id )!!}"> <i class="fas fa-pen"></i> </a> </td>
                    <td colspan="2"> <a href="{!! route('deletedistrict', $list_district->id) !!}" class="text-danger"> <i class="fas fa-trash-alt"></i> </a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <ul class="pagination float-left ml-3">
        <a href="{{ route('insertdistrict') }}" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Khu Vực</a>
    </ul>
    <ul class = "pagination justify-content-end" >
        {{ $list_districtes->links() }}
    </ul>
@endsection