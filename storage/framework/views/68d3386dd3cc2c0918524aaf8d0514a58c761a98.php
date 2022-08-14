<?php $__env->startSection('css'); ?>
    <!-- Custombox -->
    <link href="assets/plugins/custombox/css/custombox.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
                                <li class="breadcrumb-item active"><a href="#">Data Tunggakan</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Data Tunggakan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>DATA TUNGGAKAN</b></h4>
                        <p class="text-muted font-13">
                            Data sesuai yang diinputkan oleh bendahara.
                        </p>
                        
                        <div class="col-lg-12">
                            <div class="card-box">
                                <a href="<?php echo e(url('tambahtunggakan')); ?>" class="btn btn-primary"><i class="fa fa-plus m-r-5"></i>Tambah</a>
                                <p> </p>
                                <table id="datatable" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tunggakan</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Jumlah Tunggakan</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Januari 2021</td>
                                        <td>2021/2022</td>
                                        <td>Rp. 150.550.000</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="<?php echo e(url('edittunggakan')); ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo e(url('detailtunggakan')); ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- Modal-Effect -->
    <script src="assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="assets/plugins/custombox/js/legacy.min.js"></script>

    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        } );

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout-app.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/web_keuangan/resources/views/Admin/tunggakan/tunggakan.blade.php ENDPATH**/ ?>