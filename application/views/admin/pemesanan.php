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
                        <h1 class="h3 mb-0 text-gray-800">pemesanan</h1>
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
                                                    <th>ID order</th>
                                                    <th>nomor meja</th>
                                                    <th>nama pemesan</th>
                                                    <th>jumlah pesan</th>
                                                    <th>ID waiter</th>
                                                    <th>menu</th>
                                                    <th>harga</th>
                                                    <th>keterangan</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>no</th>
                                                    <th>ID order</th>
                                                    <th>nomor meja</th>
                                                    <th>nama pemesan</th>
                                                    <th>jumlah pesan</th>
                                                    <th>ID waiter</th>
                                                    <th>menu</th>
                                                    <th>harga</th>
                                                    <th>keterangan</th>
                                                </tr>
                                            </tfoot>
                                            <?php
                                            $no = 1;
                                            foreach ($order as $orders) {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $orders->id_order ?></td>
                                                        <td><?php echo $orders->no_meja ?></td>
                                                        <td><?php echo $orders->nama_pemesan ?></td>
                                                        <td><?php echo $orders->jumlah_pesan ?></td>
                                                        <td><?php echo $orders->id_user ?></td>
                                                        <td><?php echo $orders->nama_masakan ?></td>
                                                        <td><?php echo $orders->harga ?></td>
                                                        <td><?php echo $orders->keterangan ?></td>
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

    <!-- edit user Modal-->
    <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">edit user</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('ekantin_controller/admin_updateuser') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">username</label>
                                <input type="text" id="id_user" name="id" class="form-control" hidden>
                                <input type="text" id="user_name" name="usernama" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">password</label>
                                <input type="password" id="password_user" name="pw" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">nama lengkap</label>
                            <input type="text" id="nama_user" name="namel" class="form-control" placeholder="Rp">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">level user</label>
                                <select name="level" id="level_user" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="1">owner</option>
                                    <option value="2">admin</option>
                                    <option value="3">kasir</option>
                                    <option value="4">waiter</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">foto user</label>
                                <input type="file" name="foto" class="form-control-file">
                                <h6>(masukan foto jika ingin merubah)</h6>
                                <input type="text" id="foto_user" name="fot_men" class="form-control" hidden>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit user Modal -->

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
                    <?php echo anchor('ekantin_controller/admin_deleteuser/' . $orders->id_user, '<button type="button" class="btn btn-danger">ya</button>') ?>
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

                modal.find('#id_user').attr("value", div.data('id'));
                modal.find('#user_name').attr("value", div.data('usernama'));
                modal.find('#password_user').attr("value", div.data('pw'));
                modal.find('#nama_user').attr("value", div.data('nama'));
                modal.find('#level_user').attr("value", div.data('level'));
                modal.find('#foto_user').attr("value", div.data('gambar'));
                modal.find('#gambar_user').attr("value", div.data('pict'));
            });
        });
    </script>
    <!-- end script edit data -->

</body>

</html>