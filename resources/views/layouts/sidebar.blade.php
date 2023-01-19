<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ Request::is('/') ? 'active' : '' }}">
      <a href="{{url('/')}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>




    <li class="treeview {{ Request::is('pending/tasks') ||Request::is('complete/tasks') || Request::is('all/tasks') || Request::is('canceled/tasks')|| Request::is('delivered/tasks') ? 'active open' : '' }}">
      <a href="#">
        <i class="fa fa-cloud-upload"></i> <span> Tasks</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          <small class="label pull-right bg-danger">{{$orderundelivercount}}</small>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ Request::is('pending/tasks') ? 'active' : '' }}"> <a href="{{route('pending.tasks')}}"><i class="fa fa-circle-o"></i> Pending Tasks    <small class="label pull-right bg-danger">{{$orderundelivercount}}</small> </a> </li>
        <li class="{{ Request::is('complete/tasks') ? 'active' : '' }}"> <a href="{{route('complete.tasks')}}"><i class="fa fa-circle-o"></i> Complete Tasks</a> </li>
        <li class="{{ Request::is('all/tasks') ? 'active' : '' }}"> <a href="{{route('all.tasks')}}"><i class="fa fa-circle-o"></i> All tasks</a> </li>
      </ul>
    </li>



    <li >
      <a href="{{route('logout')}}">
        <i class="fa fa-power-off"></i> <span> Logout</span>
      </a>
    </li>


  </ul>
