

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    });

    

    // EDIT
    $(".btn-edit").click(function(){   
        var pro_id = $(this).val();
        $.ajax({
            type : 'GET',
            url  : 'edit/' + pro_id ,
            success: function(data){
                $("h4#title").text("Sửa Thông Tin Nhà Sản Xuất Có ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-pro_name").val(data.pro_name);
                $("input#u-pro_address").val(data.pro_address);
                $("input#u-pro_phone").val(data.pro_phone);
                $("input#u-pro_email").val(data.pro_email);
                $("input#u-pro_employee").val(data.pro_employee);
                $("div.select-district select").val(data.dis_id);
                console.log(data);
            }
        });
    });

    $('#form-update').submit(function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#u-id').val();
            var pro_name      = $('#u-pro_name').val();
            var pro_address   = $('#u-pro_address').val();
            var pro_phone     = $('#u-pro_phone').val();
            var pro_employee  = $('#u-pro_employee').val();
            var pro_email     = $('#u-pro_email').val();
            var dis_id        = $('#u-district').val();

            $.ajax({
               type :'post',
               url  : 'postupdatproducer',
               data : {
                    id           : id,
                    pro_name     : pro_name,
                    pro_address  : pro_address,
                    pro_phone    : pro_phone,
                    pro_employee : pro_employee,
                    pro_email    : pro_email,
                    dis_id       : dis_id,
               },
               success:function(data){
                    window.location.reload();
                    alert("Đã Sửa Thông Tin Nhà Sản Xuất ID: " + data.id);
               }
            });
            
        }
        // alert("abc");
    });

    $('.btn-delete').click(function(){
        var pro_id = $(this).val();
        if(confirm('Bạn Có Chắc Chắn Muốn Xóa Không?')){
            $.ajax({
               type    :'get',
               url     : 'delete/' + pro_id,
               success :function(data){
                   window.location.reload();
                   alert("Đã Xóa " + data.pro_name);
               }
            });
        }
    });
});