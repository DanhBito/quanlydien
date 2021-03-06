$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

$(document).ready( function () {
    $('#myTable').DataTable();
    });

$(document).ready(function(){
    $('div#alert-err').hide();
    $('input.search').appendTo('.ul-search');
    // $('div.col-sm-12 col-md-6').removeClass('col-sm-12 col-md-6');

    // Search 
    // $('#input-search').on("keyup", function(){
    //     var search = $(this).val();
    //     $('#pagination').hide();
    //     if(search !== ''){
    //         $.ajax({
    //             method: "POST",
    //             url : 'search',
    //             data: {search:search},
    //             success:function(data){
    //                 console.log(data);
    //                 var resultSearch = '';
    //                 for(var i = 0; i<data.length; i++){
    //                     resultSearch += 
    //                         '<tr>' +
    //                         '<th width = "5%" scope="row">'      + data[i].id       + '</th>' +
    //                         '<td width = "18%" scope="row">'     + data[i].fullname + '</td>' +
    //                         '<td width = "7%" scope="row">'      + data[i].gender   + '</td>' +
    //                         '<td width = "10%" scope="row">'     + data[i].address  + '</td>' +
    //                         '<td width = "10%" scope="row">'     + data[i].phone    + '</td>' +
    //                         '<td width = "10%" scope="row">'     + data[i].deparment.dpm_name + '</td>' +
    //                         '<td width = "10%" scope="row">'     + data[i].username + '</td>' +
    //                         '<td width = "5%"> <button  value="' + data[i].id       + '" type="button" class="btn btn-outline-primary btn-show" data-toggle="modal" data-target="#viewuser" > <i class="fas fa-eye" ></i> </button> </td>' +
    //                         '<td width = "5%"><button value="'   + data[i].id       + '" type="button" class="btn btn-outline-warning btn-edit" data-toggle="modal" data-target="#updateuser" > <i class="fas fa-pen"></i> </button> </td>' +
    //                         '<td width = "5%"><button value="'   + data[i].id       + '" type="button" class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button> </td></tr>';
    //                 }
    //                 $('tbody').html(resultSearch);
    //             }
    //         });
    //     }else{
    //         window.location.reload();
    //     }
    // });

    // View Detail User
    // $(".btn-show").click(function(){
    $(document).on('click', '.btn-show', function() {
        // $.get('viewuser', function(data){
        //     $('#viewuser').append(data);
        //     console.log(data);
        // });
        var userid = $(this).val();
        console.log(userid);
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

                $("h4#title").text("Th??ng Tin Nh??n Vi??n ID: " + data.id)
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
                $("span#dpm_id").text(data.deparment.dpm_name)
                // switch (data.dpm_id) {
                //     case '1':
                //         $("span#dpm_id").html("Admin");
                //         break;
                //     case '2':
                //         $("span#dpm_id").html("L??nh ?????o");
                //         break;
                //     case '3':
                //         $("span#dpm_id").html("Qu???n L??");
                //         break;
                //     default:
                //         $("span#dpm_id").html("Nh??n Vi??n");
                //         break;
                // }
                // if(data.dpm_id===1){
                //     $("span#dpm_id").text("Admin");
                // };
                // if(data.dpm_id===2){
                //     $("span#dpm_id").text("L??nh ?????o");
                // };
                // if(data.dpm_id===3){
                //     $("span#dpm_id").text("Qu???n L??");
                // };
                // if(data.dpm_id===4){
                //     $("span#dpm_id").text("Nh??n Vi??n");
                // };
                // $("span#dpm_id").text(d)
            }
        });
    }); 

    // Delete User
    $(document).on('click', '.btn-delete', function(){ 
        var userid = $(this).val();
        if(confirm('B???n C?? Ch???c Ch???n Mu???n X??a Kh??ng?')){
            $.ajax({
               type    :'get',
               url     : 'delete/'+userid,
               success :function(data){
                   window.location.reload();
                   alert("???? X??a " + data.fullname);
               }
            });
        }
    });

// Edit User
    $(document).on('click', '.btn-edit', function(){ 
        var userid = $(this).val();
        $.ajax({
            type   : "GET",
            url    : 'updateuser/' + userid,
            success: function(data){

                $("h4#title").text("S???a Th??ng Tin Nh??n Vi??n ID: " + data.id)
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

    $(document).on('submit', '#form-update', function(){
        window.location.reload();
        if(confirm('B???n C?? Ch???c Ch???n Mu???n S???a Kh??ng?')){
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
                    alert("???? S???a Th??ng Tin Ng?????i D??ng ID: " + data.id);
               },
               error:function(data){
                //     window.location.reload();
                //    alert(data.responseJSON.errors.birth);
                //    alert(data.responseJSON.errors.email);
                //    alert(data.responseJSON.errors.phone);
                //    alert(data.responseJSON.errors.joining);
                    $('div#alert-err').show();
                    $('#err').text(data.responseJSON.errors.birth);
                    $('#err').text(data.responseJSON.errors.email);
                    $('#err').text(data.responseJSON.errors.phone_number);
                    $('#err').text(data.responseJSON.errors.date_joining);
                    window.stop();
               }
               
            });
        }
        // alert("abc");
    });

});
