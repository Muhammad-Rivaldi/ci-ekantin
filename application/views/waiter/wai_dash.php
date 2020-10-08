<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ekantin - waiter</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('asset/vendor/fontawesome-free/css/all.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('asset/css/sb-admin-2.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('template/admin/sidebar_waiter') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('template/admin/header'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Menu</h1>
                    </div>
                    <!-- end page heading -->

                    <!-- Content Row 2 -->
                    <div class="row">

                        <!-- Area card -->
                        <div class="col">
                            <div class="card shadow mb-4">

                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">view data menu</h6>
                                </div>
                                <!-- end Card Header - Dropdown -->

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row" align="center">
                                        <?php
                                        $no = 1;
                                        foreach ($menu as $data_menu) {
                                        ?>
                                            <div class="col-lg-3 mb-3">
                                                <div class="card" style="width: 18rem;">
                                                    <img src="<?php echo base_url('asset/foto-menu/') . $data_menu->foto_menu ?>" class="card-img-top">
                                                    <div class="card-body">
                                                        <h2 class="card-title"><?php echo $data_menu->nama_menu ?></h2>
                                                        <h5 class="card-title"><?php echo $data_menu->jenis_menu ?></h5>
                                                        <h5 class="card-title">Rp<?php echo $data_menu->harga ?></h5>
                                                        <h6 class="card-title"><?php echo $data_menu->status_menu ?></h6>
                                                        <h6 class="card-title" hidden><?php echo $data_menu->id_masakan ?></h6>
                                                        <a class="btn btn-lg btn-primary text-white" href="javascript:;" data-toggle="modal" data-target="#insert_data" 
                                                        data-menu="<?= $data_menu->nama_menu ?>" 
                                                        data-harga="<?= $data_menu->harga ?>" 
                                                        data-jenis="<?=$data_menu->jenis_menu?>">
                                                            <i class="fas fa-shopping-cart"></i>pesan
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- end card body -->

                            </div>
                        </div>
                        <!-- end area card -->

                    </div>
                    <!-- end content row 2 -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('template/admin/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- end Scroll to Top Button -->

    <!-- insert menu Modal-->
    <div class="modal fade" id="insert_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">pesan menu disini</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('ekantin_waiter/waiter_insertorder') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">nomor meja</label>
                                <input type="text" name="nomej" id="nomor_meja" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">atas nama</label>
                                <input type="text" name="nama_pesan" class="form-control" id="inputEmail4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">nama menu</label>
                            <input type="text" name="nam_men" id="nama_menu" class="form-control" id="inputEmail4" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">jenis menu</label>
                            <input type="text" name="jen_men" id="jenis_menu" class="form-control" id="inputEmail4" disabled >
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">harga</label>
                            <input type="text" name="harga" id="harga_menu" class="form-control" id="inputAddress" placeholder="Rp" disabledx>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">jumlah pesan</label>
                                <input type="number" name="jumlah_pesan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">keterangan menu</label>
                                <textarea name="keterangan" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end insert menu Modal -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('ekantin_controller/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('asset/vendor/jquery/jquery.js') ?>"></script>
    <script src="<?php echo base_url('asset/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('asset/vendor/jquery-easing/jquery.easing.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('asset/js/sb-admin-2.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('asset/vendor/chart.js/Chart.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('asset/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/demo/chart-pie-demo.js') ?>"></script>

    <!-- script edit data -->
    <script>
        $(document).ready(function() {
            $('#insert_data').on('show.bs.modal', function(event) {
                var div = $(event.relatedTarget)
                var modal = $(this)

                modal.find('#nama_menu').attr("value", div.data('menu'));
                modal.find('#harga_menu').attr("value", div.data('harga'));
                modal.find('#jenis_menu').attr("value", div.data('jenis'));
            });
        });
    </script>
    <!-- end script edit data -->

</body>

</html>