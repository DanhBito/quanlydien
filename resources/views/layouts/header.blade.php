
    <nav class="navbar navbar-expand-lg pt-0 pb-0 navbar-dark bg-primary position-relative">
        <a class="navbar-brand" href="home"> <i class="fas fa-home"></i> Trang Chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse accordion bg-primary" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto card bg-primary">
            @if (session('dpm_id')===1 || session('dpm_id')===2)
              <li class="nav-item active card-header bg-primary" id="headingOne">
                <a class="nav-link btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
                aria-controls="collapseOne" role="button"><i class="fas fa-users-cog"></i> Hệ Thống</a>
              </li>
              <li class="nav-item active card-header bg-primary" id="headingTwo">
                <a class="nav-link btn-primary"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" 
                aria-controls="collapseTwo" role="button"><i class="fas fa-coins"></i> Chức Năng</a>
              </li>
              <li class="nav-item active card-header bg-primary" id="headingThree">
                <a class="nav-link btn-primary" data-toggle="collapse" data-target="#collapseThree" 
                aria-expanded="false" aria-controls="collapseThree" role="button"><i class="fas fa-bars"></i> Danh Mục</a>
              </li>
              <li class="nav-item active card-header bg-primary">
                <a class="nav-link btn-primary" data-toggle="collapse" data-target="#collapseFour" 
                aria-expanded="false" aria-controls="collapseFour" role="button"><i class="fas fa-hands-helping"></i> Trợ Giúp</a>
              </li>
            @elseif (session('dpm__id')===3 || 4)
              <li class="nav-item active card-header bg-primary" id="headingOne">
                <a class="nav-link btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
                aria-controls="collapseOne" role="button"><i class="fas fa-users-cog"></i> Hệ Thống</a>
              </li>
              <li class="nav-item active card-header bg-primary" id="headingTwo">
                <a class="nav-link btn-primary"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" 
                aria-controls="collapseTwo" role="button"><i class="fas fa-coins"></i> Chức Năng</a>
              </li>
              <!-- <li class="nav-item active card-header bg-primary" id="headingThree">
                <a class="nav-link btn-primary" data-toggle="collapse" data-target="#collapseThree" 
                aria-expanded="false" aria-controls="collapseThree" role="button"><i class="fas fa-bars"></i> Danh Mục</a>
              </li> -->
              <li class="nav-item active card-header bg-primary">
                <a class="nav-link btn-primary" data-toggle="collapse" data-target="#collapseFour" 
                aria-expanded="false" aria-controls="collapseFour" role="button"><i class="fas fa-hands-helping"></i> Trợ Giúp</a>
              </li>
            @endif
            <!-- {{-- <li class="nav-item active">
              <a class="nav-link" href="#">Hệ Thống</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Chức Năng</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Danh Mục</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Trợ Giúp</a>
            </li> --}} -->
          </ul>
          <ul class="my-2 my-lg-0">
                  
                  <a href="dangxuat" class="my-2 my-sm-0 btn btn-dark "><i class="fas fa-sign-out-alt"></i>  Đăng Xuất</a>

          </ul>


          <!-- {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          </form> --}} -->
        </div>

      </nav>
