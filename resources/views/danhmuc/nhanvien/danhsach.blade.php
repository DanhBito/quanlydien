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
                            <td width = "5%"> <button id="btn-viewuser" value="{{$list_user->id}}" type="button" class="btn btn-outline-primary" 
                                data-toggle="modal" data-target="#viewuser" > <i class="fas fa-eye" ></i> </button> </td>
                            
                            <td width = "5%"><button value="{{$list_user->id}}" type="button" class="btn btn-outline-primary"
                                 data-toggle="modal" data-target="#updateuser" > <i class="fas fa-pen"></i> </button> </td>
                            <td width = "5%"> <a href="" class="text-danger"> <i class="fas fa-trash-alt"></i> </a> </td>
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
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(document).ready(function(){
    $("button").click(function(){
        // $.get('viewuser', function(data){
        //     $('#viewuser').append(data);
        //     console.log(data);
        // });
        var userid = $(this).val();
        $.ajax({
            type: "GET",
            url: "viewuser/"+userid,
            success: function(data){
                console.log(data);
                // $('#viewuser').modal('show');
                var b = new Date(data.birth);
                var d = b.getDate();
                var m = b.getMonth() + 1;
                var y = b.getFullYear();

                var joining = new Date(data.joining);
                var j_d = joining.getDate();
                var j_m = joining.getMonth() + 1;
                var j_y = joining.getFullYear();

                $("span#id").text(data.id);
                $("span#fullname").text(data.fullname);
                $("span#gender").text(data.gender);
                $("span#address").text(data.address);
                $("span#username").text(data.username);
                $("span#birth").text(d + "-" + m + "-" + y);
                $("span#joining").text(j_d + "-" + j_m + "-" + j_y);
                $("span#phone").text(data.phone);
                $("span#email").text(data.email);
                $("span#identification").text(data.identification);
                // 
                // switch (data.dpm_id) {
                //     case '1':
                //         $("span#dpm_id").html("Admin");
                //         break;
                //     case '2':
                //         $("span#dpm_id").html("Lãnh Đạo");
                //         break;
                //     case '3':
                //         $("span#dpm_id").html("Quản Lí");
                //         break;
                //     default:
                //         $("span#dpm_id").html("Nhân Viên");
                //         break;
                // }
                if(data.dpm_id===1){
                    $("span#dpm_id").text("Admin");
                };
                if(data.dpm_id===2){
                    $("span#dpm_id").text("Lãnh Đạo");
                };
                if(data.dpm_id===3){
                    $("span#dpm_id").text("Quản Lí");
                };
                if(data.dpm_id===4){
                    $("span#dpm_id").text("Nhân Viên");
                };

            }
        });
    });        
});

</script>



@endsection