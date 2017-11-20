<nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
              @if(Sentinel::check())
                {{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}
              @endif
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  @if(Sentinel::check())
                  {{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}               
                  - 
                  {{ Sentinel::getUser()->roles()->first()->name }}
                  @endif

                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              
<!--               <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>

              </li> -->

              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  {!! Form::open([
                      'method'=>'POST',
                      'url' => ['/logout'],
                      'style' => 'display:inline'
                  ]) !!}
                      {!! Form::button('Sign Out', array(
                              'type' => 'submit',
                              'class' => 'btn btn-default btn-flat'
                      )) !!}
                  {!! Form::close() !!}
                  <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>