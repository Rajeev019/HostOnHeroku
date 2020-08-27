     <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">Kavre Times</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
              <a href="{{url('/adminlog')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                Dashboard

                </p>
              </a>
            </li>
            

            <li class="nav-item">
              <a href="{{url('adminlog/introduction')}}" class="nav-link">
              <i class="fab fa-swift"></i>
                <p>
                Introduction

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('adminlog/service')}}" class="nav-link">
              <i class="fab fa-swift"></i>
                <p>
                Service

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('adminlog/about')}}" class="nav-link">
              <i class="fab fa-swift"></i>
                <p>
               About Me

                </p>
              </a>
              </li>
            <li class="nav-item">
              <a href="{{url('adminlog/photo')}}" class="nav-link">
              <i class="fab fa-swift"></i>
                <p>
               Photos

                </p>
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a href="{{url('adminlog/testimonial')}}" class="nav-link">
              <i class="fab fa-swift"></i>
                <p>
               Testimonial

                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
