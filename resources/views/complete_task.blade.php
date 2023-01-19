@extends('layouts.app')
@section('title')
All Complete Tasks
@endsection
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-warning">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="header">
                        <h2>  All Complete Tasks </h2>


                        <h4 class="box-title">  <span class="badge badge-primary position-right">Total Complete Tasks : {{ $pasengercnt }}</span></h4>
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

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th> Status</th>
                                        <th> Body</th>
                                        <th>Date</th>
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

</section>




<script>


    function deleteContact(id) {

        event.preventDefault();

        if (confirm("Are you sure?")) {

            $.ajax({
                url: 'delete/task/' + id,
                method: 'get',
                success: function(result){
                    window.location.assign(window.location.href);
                }
            });

        } else {

            console.log('Delete process cancelled');

        }

    }

    </script>
@endsection
