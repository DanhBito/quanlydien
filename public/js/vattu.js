$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(document).ready( function () {
    $('#myTable').DataTable();
    });

$(document).ready(function(){
    $('input.search').appendTo('.ul-search');
    $('div#alert-err').hide();

    // Create
    $(document).on('submit', '#form-create', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Thêm Không Không?')){
            var sup_name   = $('#c-sup_name').val();
            var sup_amount = $('#c-sup_amount').val();
            var unit_id    = $('#c-unit_id').val();
            var sup_price  = $('#c-sup_price').val();
            var qua_id     = $('#c-qua_id').val();
            var pro_id     = $('#c-pro_id').val();

            $.ajax({
                type : "POST",
                url : 'store',
                data: {
                    sup_name   : sup_name,
                    sup_amount : sup_amount,
                    sup_price  : sup_price,
                    unit_id    : unit_id,
                    qua_id     : qua_id,
                    pro_id     : pro_id,
                },
                success: function(data){
                    // window.location.reload();
                    console.log(data);
                    alert("Đã Thêm Vật Tư Mới " + data.sup_id + ": " + data.sup_name);
                    window.location.reload();
                }
            });
        }else{
            $(document).ready(function(){
                window.stop();
                $("#create").modal('show');
            });
        }

    });

    // EDIT
    $(document).on('click', '.btn-edit', function(){ 
        var sup_id = $(this).val();
        $.ajax({
            type : 'GET',
            url  : "edit/" + sup_id,
            success: function(data){
                $("h4#title").text("Sửa Thông Tin Chất lượng Có ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-sup_name").val(data.sup_name);
                console.log(data);
            }
        });
    });

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#u-id').val();
            var sup_name      = $('#u-sup_name').val();
            $.ajax({
               type :'put',
               url  : 'update',
               data : {
                    id            : id,
                    sup_name     : sup_name,
               },
               success:function(data){
                   console.log(data);
                //    window.stop();
                   window.location.reload();
                   if(data){ 
                        alert("Đã Sửa Thông Tin Chất Lượng: " + data);
                   }else{
                        alert("Đã Tồn Tại Tên Chất Lượng!");
                        window.stop();
                   }
               }
            });
            
        }else{
            window.stop();
        }
        // alert("abc");
    });

    $(document).on('click', '.btn-delete', function(){ 
        var pro_id = $(this).val();
        if(confirm('Bạn Có Chắc Chắn Muốn Xóa Không?')){
            $.ajax({
               type    :'get',
               url     : 'delete/' + pro_id,
               success :function(data){
                    console.log(data);
                   window.location.reload();
                   alert("Đã Xóa " + data.sup_name);
               }
            });
        }
    });

});
