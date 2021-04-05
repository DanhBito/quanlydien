$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(document).ready(function(){
    $('div#alert-err').hide();
    // View Detail User
    $(".btn-show").click(function(){
        // $.get('viewuser', function(data){
        //     $('#viewuser').append(data);
        //     console.log(data);
        // });
        var userid = $(this).val();
        $.ajax({
            type    : "GET",
            url     : "viewuser/"+userid,
            success : function(data){
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

                $("h4#title").text("Thông Tin Nhân Viên ID: " + data.id)
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

    // Delete User
    $('.btn-delete').click(function(){
        var userid = $(this).val();
        if(confirm('Bạn Có Chắc Chắn Muốn Xóa Không?')){
            $.ajax({
               type    :'get',
               url     : 'delete/'+userid,
               success :function(data){
                   window.location.reload();
                   alert("Đã Xóa " + data.fullname);
               }
            });
        }
    });

// Edit User
    $('.btn-edit').click(function(){
        var userid = $(this).val();
        $.ajax({
            type   : "GET",
            url    : 'updateuser/' + userid,
            success: function(data){

                $("h4#title").text("Sửa Thông Tin Nhân Viên ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-fullname").val(data.fullname);
                $("div.select-gender select").val(data.gender);
                $("input#u-address").val(data.address);
                $("input#u-username").val(data.username);
                $("input#u-birth").val(data.birth);
                $("input#u-joining").val(data.joining);
                $("input#u-phone").val(data.phone);
                $("input#u-email").val(data.email);
                $("input#u-identification").val(data.identification);
                $("div.select-position select").val(data.dpm_id);
                console.log(data);
            } 
        });
    });

    $('#form-update').submit(function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id             = $('#u-id').val();
            var fullname       = $('#u-ullname').val();
            var gender         = $('#u-gender').val();
            var birth          = $('#u-birth').val();
            var address        = $('#u-address').val();
            var email          = $('#u-email').val();
            var phone          = $('#u-phone').val();
            var identification = $('#u-identification').val();
            var joining        = $('#u-joining').val();
            var postion        = $('#u-postion').val();
            
            $.ajax({
               type :'post',
               url  : 'postupdateuser',
               data : {
                    id             : id,
                    fullname       : fullname,
                    gender         : gender,
                    birth          : birth,
                    address        : address,
                    email          : email,
                    phone          : phone,
                    identification : identification,
                    joining        : joining,
                    dpm_id         : postion,
               },
               success:function(data){
                    window.location.reload();
                    alert("Đã Sửa Thông Tin Người Dùng ID: " + data.id);
               },
               error:function(data){
                    $('div#alert-err').show();
                    $('#err').text(data.responseJSON.errors.birth);
                    $('#err').text(data.responseJSON.errors.email);
                    $('#err').text(data.responseJSON.errors.phone);
                    $('#err').text(data.responseJSON.errors.joining);
               }
               
            });
        }
        // alert("abc");
    });

    // Search
    
    $('#search').on("keyup", function(){
        var search = $(this).val();
        $('#pagination').hide();
        if(search !== ''){
            $.ajax({
                method: "POST",
                url : 'search',
                data: {search:search},
                success:function(data){
                    console.log(data);
                    var resultSearch = '';
                    for(var i = 0; i<data.length; i++){
                        resultSearch += 
                            '<tr>' +
                            '<th width = "5%" scope="row">' + data[i].id + '</th>' +
                            '<td width = "18%" scope="row">' + data[i].fullname + '</td>' +
                            '<td width = "7%" scope="row">' + data[i].gender + '</td>' +
                            '<td width = "10%" scope="row">' + data[i].address + '</td>' +
                            '<td width = "10%" scope="row">' + data[i].phone + '</td>' +
                            '<td width = "10%" scope="row">' + data[i].dpm_id + '</td>' +
                            '<td width = "10%" scope="row">' + data[i].username + '</td>' +
                            '<td width = "5%"> <button  value="" type="button" class="btn btn-outline-primary btn-show" data-toggle="modal" data-target="#viewuser" > <i class="fas fa-eye" ></i> </button> </td>' +
                            '<td width = "5%"><button value="" type="button" class="btn btn-outline-warning btn-edit" data-toggle="modal" data-target="#updateuser" > <i class="fas fa-pen"></i> </button> </td>' +
                            '<td width = "5%"><button value="" type="button" class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td></tr>';
                    }
                    $('tbody').html(resultSearch);
                }
            });
        }
    });
});
