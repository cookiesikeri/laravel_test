<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo-->
      <img src="{{asset('img/user.png')}}" height="50" width="50">
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ Auth::user()->image}}" class="user-image" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ Auth::user()->image}}" class="img-responsive" alt="User Image">

                <p>
                  {{ucfirst(Auth::User()->name)}}
                  <small>{{ucfirst(Auth::User()->email)}}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

          <!-- Notifications -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-danger">{{ \App\Models\Task::where('status', 'pending')->count() }} </span>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have {{ \App\Models\Task::where('status', 'pending')->count() }} Tasks</li>
              @if(count($ordercnt) < 1)

              <li>
                  <p>No record currently available</p>
              </li>

              @else
              @foreach($ordercnt as $key=>$state)
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- start message -->
                      <div class="mail-contnet">
                         <h4>
                            {{$state->title}}
                          <small><i class="fa fa-clock-o"></i> {{ date('M j, Y h:ia', strtotime($state['created_at'])) }}</small>
                         </h4>
                      </div>

                  </li>
                </a>
                  <!-- end message -->
                </ul>
              </li>
              @endforeach
              @endif
              <li class="footer"><a href="{{route('pending.tasks')}}">See all pending tasks</a></li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
