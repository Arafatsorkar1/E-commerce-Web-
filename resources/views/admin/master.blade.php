<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}admin/assets/images/favicon.png">
    <title>JuicyCode.com-Admin</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    @include('admin.includes.style')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">JuicyCode.com</p>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        @include('admin.includes.header')
        <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        @include('admin.includes.sidebar')
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">

                @yield('body')

                <!-- Right sidebar -->
                @include('admin.includes.rightbar')
                <!-- End Right sidebar -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->

        <!-- footer -->
        @include('admin.includes.footer')
        <!-- End footer -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    @include('admin.includes.script')
</body>


</html>
