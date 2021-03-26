@extends('master')
@section('danhsachkhuvuc')
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
            <th colspan="2" >STT</th>
            <th colspan="6" >Tên Khu Vực</th>
            <th colspan="2">Sửa</th>
            <th colspan="2" >Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_district as $list_district)
                <tr>
                    <th colspan="2" scope="row">{{$list_district->id}}</th>
                    <td colspan="6" scope="row">{{$list_district->kv_ten}}</td>
                    <td colspan="2"> <a href=""> <i class="fas fa-pen"></i> </a> </td>
                    <td colspan="2"> <a href="" class="text-danger"> <i class="fas fa-trash-alt"></i> </a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection