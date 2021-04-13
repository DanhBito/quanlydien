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
            var unit_name      = $('#c-unit_name').val();
            var unit_simplify   = $('#c-unit_simplify').val();
    
            $.ajax({
                type : "post",
                url : 'store',
                data: {
                    unit_name     : unit_name,
                    unit_simplify : unit_simplify,
                },
                success: function(data){
                    // window.location.reload();
                    console.log(data);
                    alert('Thêm Đơn Vị Tính' + data + 'Thành Công!');
                    window.location.reload();
                },
                error:function(data){
                     $('div#alert-err').show();
                     $('#err').text(data.responseJSON.errors.unit_name);
                     window.stop();
                }
            });
        }else{
            window.stop();
        }
        
    });

    // EDIT
    $(document).on('click', '.btn-edit', function(){ 
        var unit_id = $(this).val();
        $.ajax({
            type : 'GET',
            url  : "edit/" + unit_id,
            success: function(data){
                $("h4#title").text("Sửa Thông Tin Đơn Vị Tính Có ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-unit_name").val(data.unit_name);
                $("input#u-unit_simplify").val(data.unit_simplify);
                console.log(data);
            }
        });
    });

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#u-id').val();
            var unit_name      = $('#u-unit_name').val();
            var unit_simplify   = $('#u-unit_simplify').val();
            $.ajax({
               type :'put',
               url  : 'update',
               data : {
                    id            : id,
                    unit_name     : unit_name,
                    unit_simplify : unit_simplify,
               },
               success:function(data){
                   console.log(data);
                //    window.stop();
                   window.location.reload();
                   if(data){ 
                        alert("Đã Sửa Thông Tin Đơn Vị Tính: " + data);
                   }else{
                        alert("Đã Tồn Tại Đơn Vị Tính!");
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
                   window.location.reload();
                   alert("Đã Xóa " + data.pro_name);
               }
            });
        }
    });
});
