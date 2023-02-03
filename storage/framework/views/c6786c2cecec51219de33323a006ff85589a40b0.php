<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Aplikasi Keuangan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Aplikasi Keuangan SMA Budi Luhur Samarinda" name="description" />
        <meta content="SMA Budi Luhur" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/sma.png')); ?>">

        <?php echo $__env->yieldContent('css'); ?>

        

        <!-- DataTables -->
        <link href="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/plugins/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo e(asset('assets/plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/jquery.steps/css/jquery.steps.css')); ?>" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/morris/morris.css')); ?>">
        <link href="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweet-alert.css')); ?>" rel="stylesheet" type="text/css">

        <!-- Select2 CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/select2-4.1.0-rc.0/dist/css/select2.min.css')); ?>">

        <!-- App css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo e(asset('assets/js/modernizr.min.js')); ?>"></script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="index.html" class="logo">
                            <img src="<?php echo e(asset('assets/images/navbar-app-keuangan.png')); ?>" alt="" class="logo-lg">
                            <img src="<?php echo e(asset('assets/images/sma.png')); ?>" alt="" height="24" class="logo-sm">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-inline float-right mb-0">

                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo e(asset('assets/sma.png')); ?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">

                                    <!-- item-->
                                    <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->
        </header>
        <!-- End Navigation Bar-->





<?php /**PATH /var/www/web_keuangan__/resources/views/Ortu/layout-app/header.blade.php ENDPATH**/ ?>