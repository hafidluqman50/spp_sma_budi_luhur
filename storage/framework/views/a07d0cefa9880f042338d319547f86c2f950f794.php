<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplikasi Keuangan SMA Budi Luhur Samarinda">
        <meta name="author" content="SMA Budi Luhur">

        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/sma.png')); ?>">

        <title>Aplikasi Keuangan</title>

        <link href=" <?php echo e(asset('assets/css/bootstrap.min.css')); ?> " rel="stylesheet" type="text/css" />
        <link href=" <?php echo e(asset('assets/css/icons.css')); ?> " rel="stylesheet" type="text/css" />
        <link href=" <?php echo e(asset('assets/css/style.css')); ?> " rel="stylesheet" type="text/css" />

        <script src="<?php echo e(asset('assets/js/modernizr.min.js')); ?>"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="card-box">
                <div class="panel-heading text-center">
                    <img src="<?php echo e(asset('assets/images/sma.png')); ?>" width="45%" alt="">
                    <h4> APLIKASI KEUANGAN <br> SMA BUDI LUHUR SAMARINDA</h4>
                </div>


                <div class="p-20">
                    <?php if(session()->has('log')): ?>
                    <div class="alert alert-dismissible alert-danger">
                        <?php echo e(session('log')); ?> <button class="close"></button>
                    </div>
                    <?php endif; ?>
                    <form class="form-horizontal m-t-20" action="<?php echo e(url('/login')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group ">
                            <div class="col-12">
                                <input class="form-control" type="text" name="username" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" required="" placeholder="Password">
                            </div>
                        </div>

                        

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light">Log In
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            
        </div>


        <!-- jQuery  -->
        <script src=" <?php echo e(asset('assets/js/jquery.min.js')); ?> "></script>
        <script src=" <?php echo e(asset('assets/js/tether.min.js')); ?> "></script><!-- Tether for Bootstrap -->
        <script src=" <?php echo e(asset('assets/js/bootstrap.min.js')); ?> "></script>
        <script src=" <?php echo e(asset('assets/js/waves.js')); ?> "></script>
        <script src=" <?php echo e(asset('assets/js/jquery.slimscroll.js')); ?> "></script>
        <script src=" <?php echo e(asset('assets/js/jquery.scrollTo.min.js')); ?> "></script>

        <!-- App js -->
        <script src=" <?php echo e(asset('assets/js/jquery.core.js')); ?> "></script>
        <script src=" <?php echo e(asset('assets/js/jquery.app.js')); ?> "></script>
        <script>
            $('input[name="username"]').keyup(function(e){
                if (e.key === 'Enter') {
                    $('input[name="password"]').focus()
                }
            })
        </script>

	
	</body>
</html><?php /**PATH /var/www/web_keuangan__/resources/views/login.blade.php ENDPATH**/ ?>