<div id="accordion">
<!--   <div class="card"> -->
    <div id="collapseOne" class="collapse bg-info" aria-labelledby="headingOne" data-parent="#accordion">
<!--       <div class="card-body"> -->
		<ul class="list-group list-group-horizontal">
		    <a href="{{route('doimatkhau')}}" role="button" class="list-group-item bg-info"><i class="fas fa-key" ></i> Thay Đổi Mật Khẩu</a>
			@if(session('dpm_id')===1 || session('dpm_id')===2)
				<a href="{{route('dangky')}}" role="button" class="list-group-item bg-info"><i class="fas fa-user-plus"></i> Tạo Tài Khoản</a>
			@endif
		    <a href="{{route('thongtincongty')}}" role="button" class="list-group-item bg-info"><i class="fas fa-info"></i> Thông Tin Công Ty</a>
	 	</ul>
<!--       </div> -->
    </div>
<!--   </div>
 -->
<!--   <div class="card"> -->
    <div id="collapseThree" class="collapse bg-info" aria-labelledby="headingThree" data-parent="#accordion">
<!--       <div class="card-body"> -->
        <ul class="list-group list-group-horizontal">
		    <a href="{{route('chatluong')}}" role="button" class="list-group-item bg-info"><i class="fas fa-award"></i> Chất Lượng</a>
		    <a href="{{route('donvitinh')}}" role="button" class="list-group-item bg-info"><i class="fas fa-weight-hanging"></i> Đơn Vị Tính</a>
		    <a href="{{route('khuvuc')}}" role="button" class="list-group-item bg-info"><i class="fab fa-fort-awesome-alt"></i> Khu Vực</a>
		    <a href="{{route('nhanvien')}}" role="button" class="list-group-item bg-info"><i class="fas fa-user-tie"></i> Nhân Viên</a>
			<a href="{{route('nhasanxuat')}}" role="button" class="list-group-item bg-info"><i class="fas fa-box-open"></i> Nhà Sản Xuất</a>
			<a href="{{route('vattu')}}" role="button" class="list-group-item bg-info"><i class="fas fa-toolbox"></i> Vật Tư</a>
	 	</ul>
<!--       </div> -->
    </div>
<!--   </div> -->

<!--   <div class="card"> -->
    <div id="collapseTwo" class="collapse bg-info" aria-labelledby="headingTwo" data-parent="#accordion">
      
        <ul class="list-group list-group-horizontal">
		    <a href="" role="button" class="list-group-item bg-info"><i class="far fa-flag"></i> Báo Cáo</a>
		    <a href="" role="button" class="list-group-item bg-info"><i class="fas fa-file-import"></i> Nhập Kho</a>
		    <a href="" role="button" class="list-group-item bg-info"><i class="fas fa-file-export"></i> Xuất Kho</a>
		    <a href="" role="button" class="list-group-item bg-info"><i class="fas fa-chart-bar"></i> Thống Kê</a>
	 	</ul>
      
    </div>
<!--   </div> -->

<!--   <div class="card"> -->
    <div id="collapseFour" class="collapse bg-info" aria-labelledby="headingFour" data-parent="#accordion">
<!--       <div class="card-body"> -->
        <ul class="list-group list-group-horizontal">
		    <a href="" role="button" class="list-group-item bg-info"><i class="far fa-question-circle"></i> Hướng Dẫn Sử Dụng</a>
		    <a href="" role="button" class="list-group-item bg-info"><i class="fas fa-phone-alt"></i> Liên Hệ</a>
		    <a href="" role="button" class="list-group-item bg-info"><i class="far fa-comments"></i> Phản Hồi</a>
		    <a href="" role="button" class="list-group-item bg-info"><i class="far fa-file-alt"></i> Thông Tin Phần Mềm</a>
	 	</ul>
<!--       </div> -->
    </div>
<!--   </div> -->
</div>