$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});


          
    // $('#myTable').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('abcd') }}",
    //     columns: [
    //         {data: 'action', name: 'action', orderable: false, searchable: false},
    //     ]
    // });


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
                    window.location.reload();
                    console.log(data);
                    alert("Đã Thêm Vật Tư Mới: " + data.sup_name);
                    // window.location.reload();
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
                $("h4#title").text("Sửa Thông Vật Tư Có ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-sup_name").val(data.sup_name);
                $("input#u-sup_amount").val(data.sup_amount);
                $("input#u-sup_price").val(data.sup_price);
                $("div.select-unit select").val(data.unit_id);
                $("div.select-producer select").val(data.pro_id);
                $("div.select-quality select").val(data.qua_id);
                console.log(data);
            }
        });
    });

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#u-id').val();
            var sup_name   = $('#u-sup_name').val();
            var sup_amount = $('#u-sup_amount').val();
            var unit_id    = $('#u-unit_id').val();
            var sup_price  = $('#u-sup_price').val();
            var qua_id     = $('#u-qua_id').val();
            var pro_id     = $('#u-pro_id').val();

            $.ajax({
               type :'put',
               url  : 'update',
               data : {
                    id         : id,
                    sup_name   : sup_name,
                    sup_amount : sup_amount,
                    sup_price  : sup_price,
                    unit_id    : unit_id,
                    qua_id     : qua_id,
                    pro_id     : pro_id,
               },
               success:function(data){
                   console.log(data);
                   window.location.reload();
                   if(data){ 
                        alert("Đã Sửa Thông Tin Chất Lượng: " + data);
                   }else{
                        alert("Lỗi!");
                        window.stop();
                   }
               }
            });
            
        }else{
            $(document).ready(function(){
                window.stop();
                $("#update").modal('show');
            });
        }
        // alert("abc");
    });

    $(document).on('click', '.btn-delete', function(){ 
        var sup_id = $(this).val();
        if(confirm('Bạn Có Chắc Chắn Muốn Xóa Không?')){
            $.ajax({
               type    :'get',
               url     : 'delete/' + sup_id,
               success :function(data){
                    console.log(data);
                   window.location.reload();
                   alert("Đã Xóa " + data.sup_name);
               }
            });
        }
    });

});
