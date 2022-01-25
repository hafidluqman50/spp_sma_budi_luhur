<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Aplikasi Keuangan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Aplikasi Keuangan SMA Budi Luhur Samarinda" name="description" />
        <meta content="SMA Budi Luhur" name="author" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
        
        <link rel="stylesheet" href="<?php echo e(asset('assets/selectize/dist/css/selectize.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/selectize/dist/css/selectize.bootstrap4.css')); ?>">
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo e(asset('assets/Bootstrap-Datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">

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
                                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-document noti-icon"></i>
                                    <span class="badge badge-pink noti-icon-badge"><?php echo e(count_history_unread_navbar()); ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>History SPP</h5>
                                    </div>

                                    <?php $__currentLoopData = get_history_navbar(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(url('/admin/spp/history-spp/'.$element->id_history_proses_spp)); ?>" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="icon-docs"></i></div>
                                        <p class="notify-details"><?php echo e(Str::limit($element->text,20)); ?><small class="text-muted"><?php echo e(time_elapsed_string($element->created_at)); ?></small></p>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- item-->

                                    <!-- All-->
                                    <a href="<?php echo e(url('/admin/spp/history-spp')); ?>" class="dropdown-item notify-item notify-all">
                                        View All
                                    </a>

                                </div>
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo e(asset('assets/images/users/avatar-1.jpg')); ?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span>
                                    </a>

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

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="md md-dashboard"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="md md-account-circle"></i>Data Siswa</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo e(url('/admin/siswa')); ?>">Data Siswa</a></li>
                                    <li><a href="<?php echo e(url('/admin/kelas')); ?>">Data Kelas</a></li>
                                    <li><a href="<?php echo e(url('/admin/tahun-ajaran')); ?>">Data Tahun Ajaran</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo e(url('/admin/kantin')); ?>"><i class="fa fa-pencil-square-o"></i>Data Kantin</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-money"></i>Data SPP</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo e(url('/admin/spp')); ?>">Data SPP</a></li>
                                    <li><a href="<?php echo e(url('/admin/kolom-spp')); ?>">Data Kolom SPP</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-file-excel-o"></i>Laporan</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo e(url('/admin/laporan-data-siswa')); ?>">Laporan Data Siswa</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/admin/laporan-kantin')); ?>">Laporan Kantin</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/admin/laporan-tunggakan')); ?>">Laporan Tunggakan</a>
                                        
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/admin/laporan-rab')); ?>">Laporan RAB</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="<?php echo e(url('/admin/data-petugas')); ?>"><i class="fa fa-users"></i>Data Petugas</a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?php echo e(url('/admin/data-kepsek')); ?>"><i class="fa fa-users"></i>Data Kepsek</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->





<?php /**PATH /var/www/web_keuangan/resources/views/Admin/layout-app/header.blade.php ENDPATH**/ ?>