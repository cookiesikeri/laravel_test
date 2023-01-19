@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<section class="content-header">
   <h1>
      Dashboard
      <small>Welcome Back! {{ucfirst(Auth::User()->name)}} </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">


      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="">
            <div class="info-box">
               <span class="info-box-icon push-bottom bg-purple"><i class="ion ion-ios-cloud-download-outline"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text" title="">All Tasks</span>
                  <span class="info-box-number">{{ \App\Models\Task::all()->count() }}</span>
                  <div class="progress">
                     <div class="progress-bar progress-bar-primary" style="width: {{ \App\Models\Task::all()->count() }}%"></div>
                  </div>
               </div>
               <!-- /.info-box-content -->
            </div>
         </a>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="">
            <div class="info-box">
               <span class="info-box-icon push-bottom bg-purple"><i class="fa fa-bank"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text" title="">Pending Tasks</span>
                  <span class="info-box-number">{{ \App\Models\Task::where('status', "pending")->count() }}</span>
                  <div class="progress">
                     <div class="progress-bar progress-bar-primary" style="width: {{ \App\Models\Task::where('status', "pending")->count() }}%"></div>
                  </div>
               </div>
               <!-- /.info-box-content -->
            </div>
         </a>
         <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="">
            <div class="info-box">
               <span class="info-box-icon push-bottom bg-purple"> <i class="fa fa-check"></i> </span>
               <div class="info-box-content">
                  <span class="info-box-text" title=""> Completed Tasks </span>
                  <span class="info-box-number">{{ \App\Models\Task::where('status', "complete")->count() }}</span>
                  <div class="progress">
                     <div class="progress-bar progress-bar-primary" style="width: {{ \App\Models\Task::where('status', "complete")->count() }}%"></div>
                  </div>
               </div>
               <!-- /.info-box-content -->
            </div>
         </a>
         <!-- /.info-box -->
      </div>



   </div>


   <div class="row">
      <div class="col-xs-12">
         <!-- /.box -->
         <div class="box">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldemo">Add Task <i class="fa fa-plus"></i></button>
            <div class="box-header">
               <h3 class="box-title">10 Latest Tasks (10)</h3>
               <h6 class="box-subtitle">The table below shows 10 latest tasks currently in the system</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
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
                        <a onclick="fetchPost({{ $order_detail->id }})">
                            <button type="button" class="btn btn-primary pd-x-20" data-toggle="modal" data-target="#editnewsModal">Edit <i class="fa fa-edit"></i></button>
                          </a>
                        <a  onclick="deleteContact({{ $order_detail->id }})">
                            <a href="#" class="btn btn-danger btn-icon mg-r-5 mg-b-10" onclick="deleteContact({{ $order_detail->id }})"> Trash <i class="fa fa-trash"></i></a></a>
                          </a>
                       </td>


                   </tr>
                    @endforeach

                   @endif
                   </tbody>
           </table>
            </div>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
   </div>


</section>

@include('add_task')
@include('edit_task')
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
        $('#editfaqsModal').modal('show');
    }
    });

    }

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
