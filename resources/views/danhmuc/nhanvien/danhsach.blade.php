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
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="thead-dark ">
                <tr>
                <th colspan="2" >ID</th>
                <th colspan="2" >Họ Và Tên</th>
                <th colspan="1" >Giới Tính </th>
                <th colspan="2" >Địa Chỉ </th>
                <th colspan="2" >Số Điện Thoại </th>
                <th colspan="2" >Chức Vụ </th>
                <th colspan="2" >Tên Đăng Nhập </th>
                <th colspan="2">Xem </th>
                <th colspan="2">Sửa</th>
                <th colspan="2" >Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $list_users as $list_user )
                    <tr>
                        <th colspan="2" scope="row">{{$list_user->id}}</th>
                        <td colspan="2" scope="row">{{$list_user->fullname}}</td>
                        <td colspan="1" scope="row">{{$list_user->gender}}</td>
                        <td colspan="2" scope="row">{{$list_user->address}}</td>
                        <td colspan="2" scope="row">{{$list_user->phone}}</td>
                        <td colspan="2" scope="row">{{$list_user->dpm_id}}</td>
                        <td colspan="2" scope="row">{{$list_user->username}}</td>
                        <td colspan="2"> <a data-toggle="modal" data-target="#view_sinhvien_info_modal" href="{!! route('viewuser', $list_user->id )!!}"> <i class="fas fa-eye"></i> </a> </td>
                        <td colspan="2"> <a href=""> <i class="fas fa-pen"></i> </a> </td>
                        <td colspan="2"> <a href="" class="text-danger"> <i class="fas fa-trash-alt"></i> </a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <ul class="pagination float-left ml-3">
        <a href="{{ route('dangky') }}" class="btn btn-primary "><i class="fas fa-plus"></i> Thêm Nhân Viên</a>
    </ul>
    <ul class = "pagination justify-content-end" >
        {{ $list_users->links() }}
    </ul>

    <div class="modal fade" id="view_sinhvien_info_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title tex-center">Thông tin Nhân Viên </h4>
          <a class="m-0 " data-dismiss="modal"><i class="fas fa-times"></i></a>
        </div>
        <div class="modal-body" >
         
                 
            <div class="form-group">
                <label >Họ và tên:</label>
                {{$list_user->fullname}}
            </div>
            <div class="form-group">
                <label >Địa chỉ Email:</label>

              
            </div>

            <div class="form-group">
              <label >Giới tính:</label>
         
              
            </div> 

            <div class="form-group">
                <label >Địa chỉ:</label>
             
            </div>
        
    
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
@endsection