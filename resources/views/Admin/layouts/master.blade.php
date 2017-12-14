<html lang="en">
@include('Admin.layouts.include.head')

<body>

<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href=""><img src="{{asset('assets/images/logo_light.png')}}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('assets/images/placeholder.jpg')}}" alt="">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- User menu -->

              @include('Admin.layouts.include.sidebarmenu')


            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header">

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
                        <li class="active">Dashboard / </li>
                        @yield('bread_crumbs')
                    </ul>

                </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            @yield('content')

            @include('Admin.layouts.include.footer')
        </div>
    </div>
</div>

</body>
</html>
