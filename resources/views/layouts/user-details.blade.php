<div class="modal fade" id="defaultModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"> Rider Details</h4>
            </div>
            <form  >

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                          <label>Rider Name</label>
                          <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->fullname)}}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                          <label>Rider Code</label>
                          <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->driver_code)}}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Rider Email</label>
                          <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->email)}}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Drivers license </label>
                          <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->driver_license)}}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                          <label>Rider Address</label>
                          <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->address)}}" readonly>
                        </div>
                    </div>
                   
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label>Rider Gender</label>
                              <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->gender)}}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label>Rider Phone</label>
                              <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->phone)}}" readonly>
                         </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                              <label>Rider Plate Number</label>
                              <input class="form-control" placeholder="{{ucWords(App\Models\Rider::find($order_detail->rider_id)->plate_numb)}}" readonly>
                         </div>
                         </div>
                 
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Rider Porfile Image</label>
                          <img src="{{ App\Models\Rider::find($order_detail->rider_id)->image}}" class="img-responsive" height="100" width="100" alt="">
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
       
                <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>