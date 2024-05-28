<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('assets/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        @include('admin.inc.navbar')
        <!-- partial:partials/_navbar.html -->

        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('Admin.home.index')}}">
                    <img src="{{url('assets/images/logo.svg')}}" alt="logo" /> </a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="{{url('assets/images/logo-mini.svg')}}" alt="logo" /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <form class="ml-4 search-form d-none d-md-block" action="#">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="Search Here">
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">


                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.inc.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

</body>

</html>