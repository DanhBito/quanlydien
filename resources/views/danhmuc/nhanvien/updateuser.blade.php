
<div class="modal fade" id="updateuser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thông tin nhân viên ID: {{$list_user->id}} </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
            <div class="form-group row ">
                <label class="col-md-4 text-md-right font-weight-bold" >ID: </label>
                <input type="text" class="col-md-6 form-control" id="id">  
            </div>
                 
            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Họ và tên: </label>
                <input type="text" class="col-md-6 form-control" id="fullname">
            </div>

            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Giới tính :</label>
                <input type="text" class="col-md-6 form-control" id="gender">
            </div>
            
            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Ngày Sinh: </label>
                <input type="text" class="col-md-6 form-control"  id="birth">
                
            </div>
            
            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Địa Chỉ: </label>
                <input type="text" class="col-md-6 form-control" id="address">
            </div>
            
            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Email:</label>
                <input type="text" class="col-md-6 form-control" id="email">
            </div>

            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Số ĐT: </label>
                <input type="text" class="col-md-6 form-control" id="phone">
            </div>
            
            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >CMND: </label>
                <input type="text" class="col-md-6 form-control" id="identification">
            </div>

            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Ngày Vào Làm: </label>
                <input type="text" class="col-md-6 form-control" id="joining">
            </div>

            <div class="form-group row">
                 <label class="col-md-4 text-md-right font-weight-bold" >Chức vụ: </label>
                <input type="text" class="col-md-6 form-control" id="dpm_id">
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Username: </label>
                <input type="text" class="col-md-6 form-control" id="username">
            </div>
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 

