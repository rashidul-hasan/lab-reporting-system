  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        @if ($user = Sentinel::getUser())

            @if ($user->inRole('admin'))
              
                <li class="treeview {{ Request::segment(1) == 'tests' || Request::segment(1) == 'slots' || Request::segment(1) == 'fields' ? 'active' : '' }}">
            <a href="{{ route('patients.index') }}">
              <i class="fa fa-pie-chart"></i>
              <span>Tests</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('tests.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
              <li><a href="{{ route('tests.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
              <li><a href="{{ route('slots.index') }}"><i class="fa fa-circle-o"></i> Slots</a></li>
              <li><a href="{{ route('fields.index') }}"><i class="fa fa-circle-o"></i> Fields</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'patients' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Patients</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <li><a href="{{ route('patients.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li> -->
              <li><a href="{{ route('patients.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'appointments' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Appointments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <li><a href="{{ route('appointments.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li> -->
              <li><a href="{{ route('appointments.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'samples' ? 'active' : '' }}">
            <a href="{{ route('samples.index') }}">
              <i class="fa fa-pie-chart"></i>
              <span>Samples</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <li><a href="{{ route('samples.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li> -->
              <li><a href="{{ route('samples.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'reports' ? 'active' : '' }}">
            <a href="{{ route('samples.index') }}">
              <i class="fa fa-pie-chart"></i>
              <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <li><a href="{{ route('samples.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li> -->
              <li><a href="{{ route('reports.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'invoices' || Request::segment(1) == 'payments' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Accounts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('invoices.index') }}"><i class="fa fa-circle-o"></i>Invoices</a></li>
              <!-- <li><a href="{{ route('payments.index') }}"><i class="fa fa-circle-o"></i>Payments</a></li> -->
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'users' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Staffs</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i>Add New</a></li>
              <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>View All</a></li>
            </ul>
          </li>

            @endif

            @if ($user->inRole('laboratorist'))

              <li>
                <a href="{{ route('appointments.index') }}"><i class="fa fa-book"></i> 
                  <span>Appointments</span>
                </a>
              </li>

              <li>
                <a href="{{ route('samples.index') }}"><i class="fa fa-book"></i> 
                  <span>Samples</span>
                </a>
              </li>

              <li>
                <a href="{{ route('reports.index') }}"><i class="fa fa-book"></i> 
                  <span>Reports</span>
                </a>
              </li>

            @endif

            @if ($user->inRole('accountant'))

              <li class="treeview {{ Request::segment(1) == 'patients' ? 'active' : '' }}">
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Patients</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('patients.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
                  <li><a href="{{ route('patients.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
                </ul>
              </li>

              <li class="treeview {{ Request::segment(1) == 'appointments' ? 'active' : '' }}">
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Appointments</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('appointments.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
                  <li><a href="{{ route('appointments.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
                </ul>
              </li>

            @endif

            @if ($user->inRole('patient'))

              <li>
                <a href="{{ route('home.appointments.index') }}"><i class="fa fa-book"></i> 
                  <span>Appointments</span>
                </a>
              </li>

              <li>
                <a href="{{ route('home.invoices.index') }}"><i class="fa fa-book"></i> 
                  <span>Invoices</span>
                </a>
              </li>

              <!-- <li>
                <a href="{{ route('home.payments.index') }}"><i class="fa fa-book"></i> 
                  <span>Payments</span>
                </a>
              </li> -->

              <li>
                <a href="{{ route('home.reports.index') }}"><i class="fa fa-book"></i> 
                  <span>Report</span>
                </a>
              </li>

            @endif

        @endif
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
