@extends('danhmuc.nhanvien.danhsach')

@section('view')
    <div class="modal " role="dialog">
        <div class=" ">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title tex-center">Thông tin Nhân Viên </h4>
                        <a class="m-0 " data-dismiss="modal"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="modal-body" >
                        
                                
                            <div class="form-group">
                                <label >Họ và tên:</label>
                                {{$data->fullname}}
                            </div>
                            <div class="form-group">
                                <label >Địa chỉ Email:</label>

                            
                            </div>

                            <div class="form-group">
                            <label >Giới tính:</label>
                        
                            
                            </div> 

                            <div class="form-group">
                                <label >Địa chỉ:</label>
                            
                            </div>
                            
                            <div class="form-group">
                                <label >Quốc gia:</label>
                            
                            </div>
                        
                        
                    
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
      <!-- Modal content-->
      
      
        </div>
    </div> 
@endsection