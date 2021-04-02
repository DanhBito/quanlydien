<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2> TEST AJAX</h2>

        <div class="row col-lg-5">
            <h2>Get</h2>
            <button type="button" class="btn btn-danger" id="getRequest">Get Request</button>
        </div>
    </div>

    <div id="getData">

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $(document).ready(function(){
            $("#getRequest").click(function(){
                $.get('viewuser', function(data){
                    $('#getData').append(data); 
                    console.log(data);
                });
            });        
        });

    </script>

</body>
</html>