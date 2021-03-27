<div class="logo narbar">
    <div class="row">
        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
            <a href="home"><img src="{{asset('img/logo.png')}}" alt="" class="logo__img"></a>
        </div>
        <div class="col-md-5 col-lg-5 ">
            <ul>
                @if (session('fullname'))
                    <p class="logo__username font-weight-bold text-danger">Chào Mừng {{session('fullname')}}</p>
                @endif
            </ul>
        </div>
    </div>
</div>