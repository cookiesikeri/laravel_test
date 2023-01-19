<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Laravel_Test">
    <link rel="icon" href="">

    <title>Laravel Test | @yield('title')</title>

    @include('layouts.css')
    @yield('css')


  </head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.top-nav')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image">
          <img src="{{ Auth::user()->image}}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <p> {{ucfirst(Auth::User()->name)}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu-->
      @include('layouts.sidebar')
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
		<!-- item-->
		<a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
		<!-- item-->
		<a href="" class="link" data-toggle="tooltip" title="" data-original-title="Messages"><i class="fa fa-envelope"></i></a>
		<!-- item-->
		<a href="{{route('logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
	</div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')

</div>
<!-- ./wrapper -->


@include('layouts.js')
<script>
    @if(Session::has('success'))
    new Noty({
        type: 'success',
        layout: 'topRight',
        text: '{{Session::get('success')}}'
    }).show();
    @endif

    @if(Session::has('fail'))
    new Noty({
        type: 'error',
        layout: 'topRight',
        text: '{{Session::get('fail')}}'
    }).show();
    @endif

    @if(Session::has('error'))
    new Noty({
        type: 'error',
        layout: 'topRight',
        text: '{{Session::get('error')}}'
    }).show();
    @endif

</script>
@yield('javascripts')


</body>
</html>
