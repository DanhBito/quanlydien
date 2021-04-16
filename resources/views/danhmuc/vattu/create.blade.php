
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Thêm Đơn Vị Tính</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
          <div class="alert alert-danger" id="alert-err" >
            <li id="err" ></li> 
          </div>
          <form action="#" id="form-create" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Tên Vật Tư</label>
                <input type="text" class="col-md-6 form-control" id="c-sup_name" required>
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Số Lượng</label>
                <input type="number" class="col-md-6 form-control" id="c-sup_amount" min="1" required/>
            </div>

            <div class="form-group row">
              <label class="col-md-4 text-md-right font-weight-bold" >Đơn Vị Tính</label>
              <select class="col-md-6 form-control"  name="unit_id" id="c-unit_id" class="form-control" name="postion" required>
                  <option value="">-- Chọn --</option>
                  @foreach ($units as $unit)
                  <option name="unit_id" value="{{$unit->id}}">{{$unit->unit_name}}</option>
                  @endforeach  
              </select>
            </div>

            <div class="form-group row">
                <label class="col-md-4 text-md-right font-weight-bold" >Giá Vật Tư</label>
                <input type="number" class="col-md-6 form-control" id="c-sup_price" min="1" maxlength="12" required/>
            </div>

            <div class="form-group row">
              <label class="col-md-4 text-md-right font-weight-bold" >Chất Lượng</label>
              <select class="col-md-6 form-control" name="qua_id" id="c-qua_id" class="form-control" name="postion" required>
                  <option value="">-- Chọn --</option>
                  @foreach ($quas as $qua)
                  <option name="qua_id" value="{{$qua->id}}">{{$qua->qua_name}}</option>
                  @endforeach  
              </select>
            </div>

            <div class="form-group row">
              <label class="col-md-4 text-md-right font-weight-bold" >Nhà Sản Xuất</label>
              <select class="col-md-6 form-control"  name="pro_id" id="c-pro_id" class="form-control" name="postion" required>
                  <option value="">-- Chọn --</option>
                  @foreach ($pros as $pro)
                  <option name="pro_id" value="{{$pro->id}}">{{$pro->pro_name}}</option>
                  @endforeach 
              </select>
            </div>

            <div class="form-group row">
              <div class="col-md-10 text-md-right">
                <input type="submit" value="Cập Nhật" class="btn btn-primary col-4 btn-submit"></input>
              </div>
            </div>
          </form>
            
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 