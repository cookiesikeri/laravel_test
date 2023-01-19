@extends('layouts.app')
@section('title')
All Pending Tasks
@endsection
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-warning">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="header">
                        <h2>  All Pending Tasks </h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultModal2">Add Task </button>

                        <h4 class="box-title">  <span class="badge badge-primary position-right">Total Pending Tasks : {{ $pasengercnt }}</span></h4>
                    </div>
                    <div class="body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
                   @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="example">
                                <thead>
                                    <tr>
                                     <th>S/N</th>
                                     <th>Title</th>
                                     <th> Status</th>
                                     <th> Body</th>
                                     <th>Date</th>
                                     <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th> Status</th>
                                        <th> Body</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if($orders->count() == 0)
                                    <tr><td colspan="12">
                                        <font color="red">No Record Found...</font></td>
                                    </tr>
                                    @else
                                    @foreach($orders as $key =>$order_detail)
                                    <tr>
                                      <td>{{++$key}}</td>

                                      <td>{{ucfirst($order_detail->title)}}</td>
                                      <td>
                                        @if(strtolower($order_detail->status) == "pending")
                                        <small class="label label-warning">Pending</small>
                                        @else
                                        <small class="label label-success">Complete</small>
                                        @endif
                                    </td>
                                    <td>{!! $order_detail->body !!}</td>
                                    <td>{{ date('M j, Y h:ia', strtotime($order_detail->created_at)) }}</td>
                                        <td>
                                            <a href="{{route('task.edit', ['id' => $order_detail->id])}}">
                                                <button type="button"  class="btn btn-primary">Edit <i class="fa fa-edit"></i></button>
                                            </a>

                                           <a href="{{route('deletetask', ['id' => $order_detail->id])}}">
                                            <button type="button"  class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
                                        </a>

                                        </td>


                                    </tr>
                                     @endforeach

                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BASIC MODAL -->
    <div id="defaultModal2" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Task</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-25">
            <form id="faq" action="{{ route('add.task') }}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="POST">
                      <div class="row">
                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" name="title" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="">Body</label>
                                  <textarea type="text" name="body" cols="30" rows="5" class="form-control" required></textarea>
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

</section>
    <!-- BASIC MODAL -->
    <div id="editfaqsModal2" class="modal fade">
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




<script>

    function fetchPost(id) {

    event.preventDefault();

    $.ajax({
    url: 'tasks/' + id,
    method: 'get',
    success: function(result){
        console.log(result);
        $('#titleEdit').val(result.title);
        $('#bodyEdit').val(result.body);
        $('#statusEdit').val(result.status);
        var url = 'tasks/' + id;
        $('form#tasks').attr('action', url);
        $('#editfaqsModal2').modal('show');
    }
    });

    }


    </script>
@endsection
