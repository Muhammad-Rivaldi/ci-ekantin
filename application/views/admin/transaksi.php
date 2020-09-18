<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ekantin - admin</title>

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
        <?php $this->load->view('template/admin/sidebar') ?>
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
                        <h1 class="h3 mb-0 text-gray-800">transaksi</h1>
                    </div>
                    <!-- end Page Heading -->

                    <!-- alert -->
                    <?= $this->session->flashdata('modal') ?>
                    <!-- end alert -->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">

                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">view data</h6>
                                </div>
                                <!-- end Card Header - Dropdown -->

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>no</th>
                                                    <th>ID transaksi</th>
                                                    <th>ID user</th>
                                                    <th>ID order</th>
                                                    <th>nama pemesan</th>
                                                    <th>menu</th>
                                                    <th>harga</th>
                                                    <th>jumlah pesan</th>
                                                    <th>total bayar</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>no</th>
                                                    <th>ID transaksi</th>
                                                    <th>ID user</th>
                                                    <th>ID order</th>
                                                    <th>nama pemesan</th>
                                                    <th>menu</th>
                                                    <th>harga</th>
                                                    <th>jumlah pesan</th>
                                                    <th>total bayar</th>
                                                </tr>
                                            </tfoot>
                                            <?php
                                            $no = 1;
                                            foreach ($transaksi as $orders) {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $orders->id_transaksi ?></td>
                                                        <td><?php echo $orders->id_user ?></td>
                                                        <td><?php echo $orders->id_order ?></td>
                                                        <td><?php echo $orders->nama_pemesan ?></td>
                                                        <td><?php echo $orders->menu ?></td>
                                                        <td><?php echo $orders->harga ?></td>
                                                        <td><?php echo $orders->jumlah_pesan ?></td>
                                                        <td><?php echo $orders->total_bayar ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- end card body -->

                            </div>
                        </div>
                        <!-- end area chart -->

                    </div>
                    <!-- end content row -->

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
    <!-- end Logout Modal -->

    <!-- insert user Modal-->
    <div class="modal fade" id="konfirm_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">insert user</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> konfirmasi pembayaran ini?
                    <form action="<?php echo site_url('ekantin_controller/kasir_bayar') ?>" method="post" enctype="multipart/form-data">
                        <input type="text" id="id_order" name="order" class="form-control" hidden>
                        <input type="text" id="user_name" name="usname" class="form-control" hidden>
                        <input type="text" id="nampes" name="pemesan" class="form-control" hidden>
                        <input type="text" id="jml_pesan" name="jum" class="form-control" hidden>
                        <input type="text" id="level_user" name="level_id" class="form-control" hidden>
                        <input type="text" id="menu" name="nama_menu" class="form-control" hidden>
                        <input type="text" id="har_men" name="harga_menu" class="form-control" hidden>
                        <input type="text" id="ket" name="ket_menu" class="form-control" hidden>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">tidak</button>
                    <button type="submit" class="btn btn-primary">iya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end insert user Modal -->

    <!-- delete menu modal -->
    <div class="modal fade" id="hapus-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">confirm data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">anda yakin menghapus data ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">tidak</button>
                    <?php echo anchor('ekantin_controller/admin_deleteuser/' . $users->id_user, '<button type="button" class="btn btn-danger">ya</button>') ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end delete menu modal -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('asset/vendor/jquery/jquery.js') ?>"></script>
    <script src="<?php echo base_url('asset/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('asset/vendor/jquery-easing/jquery.easing.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('asset/js/sb-admin-2.js') ?>"></script>

    <!-- script edit data -->
    <script>
        $(document).ready(function() {
            $('#edit-data').on('show.bs.modal', function(event) {
                var div = $(event.relatedTarget)
                var modal = $(this)

                modal.find('#id_order').attr("value", div.data('id'));
                modal.find('#user_name').attr("value", div.data('usernama'));
                modal.find('#nama_pemesan').attr("value", div.data('pemesan'));
                modal.find('#jml_pesan').attr("value", div.data('jumlah'));
                modal.find('#level_user').attr("value", div.data('level'));
                modal.find('#menu').attr("value", div.data('masakan'));
                modal.find('#har_men').attr("value", div.data('harga'));
                modal.find('#ket').attr("value", div.data('keterangan'));
            });
        });
    </script>
    <!-- end script edit data -->

</body>

</html>