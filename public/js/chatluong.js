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
            var qua_name      = $('#c-qua_name').val();
    
            $.ajax({
                type : "post",
                url : 'store',
                data: {
                    qua_name     : qua_name,
                },
                success: function(data){
                    // window.location.reload();
                    console.log(data);
                    alert('Thêm Chất Lượng ' + data + ' Thành Công!');
                    window.location.reload();
                },
                error:function(data){
                     $('div#alert-err').show();
                     $('#err').text(data.responseJSON.errors.qua_name);
                     window.stop();
                }
            });
        }else{
            window.stop();
        }
        
    });

    // EDIT
    $(document).on('click', '.btn-edit', function(){ 
        var qua_id = $(this).val();
        $.ajax({
            type : 'GET',
            url  : "edit/" + qua_id,
            success: function(data){
                $("h4#title").text("Sửa Thông Tin Chất lượng Có ID: " + data.id)
                $("input#u-id").val(data.id);
                $("input#u-qua_name").val(data.qua_name);
                console.log(data);
            }
        });
    });

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('Bạn Có Chắc Chắn Muốn Sửa Không?')){
            var id            = $('#u-id').val();
            var qua_name      = $('#u-qua_name').val();
            $.ajax({
               type :'put',
               url  : 'update',
               data : {
                    id            : id,
                    qua_name     : qua_name,
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
                   alert("Đã Xóa " + data.qua_name);
               }
            });
        }
    });

});
