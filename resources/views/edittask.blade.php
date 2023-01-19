@extends('layouts.app')
@section('title')
Edit {{$product->title}}
@endsection
@section('content')
<section class="content-header">
    <h1>
        Edit {{$product->title}}
    </h1>
    <ol class="breadcrumb">
       <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active"> Edit {{$product->title}}</li>
    </ol>
 </section>
        <!-- Input -->
        <section class="content">
            <!-- Input -->
            <div class="row">
                <div class="col-md-12">

                   <div class="box box-warning">
                      <!-- /.box-header -->
                      <div class="box-body">
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
                        <form  action="{{route('update.tasks',$product->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">

                                        <input type="text" class="form-control" placeholder="Task Title"  name="title" value="{{$product->title}}"/>
                                        @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif

                                </div>
                            </div>
                                <div class="col-md-12">
                                    <label for="">Status</label>
                                    <select class="form-control show-tick" name="status" >
                                        <option value="{{$product->status}}">{{$product->status}}</option>
                                        <option value="">-- select Status--</option>
                                            <option value="complete">Complete</option>
                                            <option value="pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                            <textarea type="text" class="form-control"  name="body" placeholder="{{$product->body}}"></textarea>


                                    </div>
                                </div>
                            </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">SAVE CHANGES</button>
                        </div>
                        </form>
                   </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
