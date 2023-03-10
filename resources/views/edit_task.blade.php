    <!-- BASIC MODAL -->
    <div id="editfaqsModal" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Task</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-25">
                <form id="tasks" action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                      <div class="row">
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" name="title" class="form-control" id="titleEdit">
                              </div>
                          </div>
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <select class="form-control show-tick" name="status" id="statusEdit">
                                    <option value="">-- select Status--</option>
                                        <option value="complete">Complete</option>
                                        <option value="pending">Pending</option>
                                </select>
                            </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Body</label>
                                  <textarea type="text" name="body" cols="30" rows="5"class="form-control" id="bodyEdit" ></textarea>
                              </div>
                          </div>
                      </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pd-x-20">Save</button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- modal-dialog -->

      </div><!-- modal -->
