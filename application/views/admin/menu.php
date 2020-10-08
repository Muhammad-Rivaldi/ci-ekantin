<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ekantin - admin menu</title>

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
            <h1 class="h3 mb-0 text-gray-800">Menu</h1>
            <a href="#" data-toggle="modal" data-target="#insert_data" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white"></i> menu</a>
          </div>
          <!-- end Page Heading -->

          <!-- alert -->
          <?= $this->session->flashdata('modal') ?>
          <!-- end alert -->

          <!-- Content Row -->
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
                      <div class="col-lg-3 mb-4">
                        <div class="card" style="width: 18rem;">
                          <img src="<?php echo base_url('asset/foto-menu/') . $data_menu->foto_menu ?>" class="card-img-top">
                          <div class="card-body">
                            <h2 class="card-title"><?php echo $data_menu->nama_menu ?></h2>
                            <h5 class="card-title"><?php echo $data_menu->jenis_menu ?></h5>
                            <h5 class="card-title">Rp<?php echo $data_menu->harga ?></h5>
                            <h6 class="card-title"><?php echo $data_menu->status_menu ?></h6>
                            <h6 class="card-title" hidden><?php echo $data_menu->id_masakan ?></h6>
                            <a class="btn btn-sm btn-primary" href="javascript:;" data-toggle="modal" data-target="#edit-data" 
                            data-id="<?= $data_menu->id_masakan ?>" 
                            data-status="<?= $data_menu->status_menu ?>" 
                            data-harga="<?= $data_menu->harga ?>" 
                            data-jenis="<?= $data_menu->jenis_menu ?>" 
                            data-nama="<?= $data_menu->nama_menu ?>" 
                            data-foto="<?= $data_menu->foto_menu ?>">
                              <i class="fa fa-search-plus"></i><span>edit</span>
                            </a>
                            <?php echo anchor('ekantin_controller/admin_deletemenu/' . $data_menu->id_masakan, '<button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>delete</button>') ?>
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

    <!-- insert menu Modal-->
    <div class="modal fade" id="insert_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">insert menu</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo site_url('ekantin_controller/admin_insertmenu') ?>" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">nama menu</label>
                  <input type="text" name="nama" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">jenis menu</label>
                  <select name="jen_men" id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option value="makanan">makanan</option>
                    <option value="minuman">minuman</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">harga</label>
                <input type="text" name="harga" class="form-control" id="inputAddress" placeholder="Rp">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputAddress2">foto menu</label>
                  <input type="file" name="foto" class="form-control-file">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">status menu</label>
                  <select name="sta_men" id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option value="tersedia">tersedia</option>
                    <option value="habis">habis</option>
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">insert</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end insert menu Modal -->

    <!-- edit menu Modal-->
    <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">edit menu</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo site_url('ekantin_controller/admin_updatemenu') ?>" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">nama menu</label>
                  <input type="text" id="id_menu" name="id" class="form-control" hidden>
                  <input type="text" id="nama_menu" name="nama" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">jenis menu</label>
                  <select name="jen_men" id="jenis_menu" class="form-control">
                    <option selected>Choose...</option>
                    <option value="makanan">makanan</option>
                    <option value="minuman">minuman</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">harga</label>
                <input type="text" id="harga_menu" name="harga" class="form-control" placeholder="Rp">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputAddress2">foto menu</label>
                  <input type="file" name="foto" class="form-control-file">
                  <input type="text" id="foto_menu" name="fot_men" class="form-control" hidden>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">status menu</label>
                  <select name="sta_men" id="status_menu" class="form-control">
                    <option selected>Choose...</option>
                    <option value="tersedia">tersedia</option>
                    <option value="habis">habis</option>
                  </select>
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
    <!-- end edit menu Modal -->

    <!-- delete menu modal -->
    <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <?php echo anchor('ekantin_controller/admin_deletemenu/' . $data_menu->id_masakan, '<button type="button" class="btn btn-danger">ya</button>') ?>
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

    <!-- Page level plugins -->
    <script src="<?php echo base_url('asset/vendor/chart.js/Chart.js') ?>"></script>

    <!-- script edit data -->
    <script>
      $(document).ready(function() {
        $('#edit-data').on('show.bs.modal', function(event) {
          var div = $(event.relatedTarget)
          var modal = $(this)
          
          modal.find('#id_menu').attr("value", div.data('id'));
          modal.find('#nama_menu').attr("value", div.data('nama'));
          modal.find('#jenis_menu').attr("value", div.data('jenis'));
          modal.find('#harga_menu').attr("value", div.data('harga'));
          modal.find('#foto_menu').attr("value", div.data('foto'));
          modal.find('#status_menu').attr("value", div.data('status'));
        });
      });
    </script>
    <!-- end script edit data -->

</body>

</html>