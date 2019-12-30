<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/css') ?>
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        
        <?php $this->load->view('components/topbar') ?>

        <?php $this->load->view('components/sidebar') ?>

        
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">

            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="page-title">PENGATURAN MASTER</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <?php 
                    foreach($master as $m){ 
                    ?>

                    <div class="row">
                        <div class="col-lg-7 col-sm-12">
                            <form action="<?php echo base_url('master/aksi') ?>" method="post">
                                <div class="row mb-3">
                                    <div class="col">
                                        Nama Lembaga :
                                        <input class="form-control" type="text" name="nama" value="<?php echo $m->master_nama ?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        Alamat Lembaga :
                                        <input class="form-control" type="text" name="alamat" value="<?php echo $m->master_alamat ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <input class="btn btn-primary" type="submit" value="Simpan">
                                    </div>
                                </div>
                            </form>

                            <div class="mt-5" align="center">
                               <form action="<?php echo base_url('master/upload/icon') ?>" method="post" enctype="multipart/form-data">
                                    <div>
                                        <img src="<?php echo base_url('assets/img/logo/'.$m->master_icon) ?>" width="100px">
                                    </div>

                                    <br>

                                    <div>
                                        <p>Upload Icon :</p>
                                        <div class="custom-file mb-3">
                                          <input type="file" class="custom-file-input" id="customFile" name="logo">
                                          <label class="custom-file-label" for="customFile">Pilih Berkas</label>
                                        </div>
                                        <input class="btn btn-danger" type="submit" value="Upload Icon">
                                    </div>
                                </form> 
                            </div>
                            
                        </div>

                        <div class="col-lg-5 col-sm-12" align="center">
                            <form action="<?php echo base_url('master/upload/logo') ?>" method="post" enctype="multipart/form-data">
                                <div class="bg-secondary p-5">
                                    <img src="<?php echo base_url('assets/img/logo/'.$m->master_logo) ?>" width="200px">
                                </div>

                                <br>

                                <div>
                                    <p>Upload Logo :</p>
                                    <div class="custom-file mb-3">
                                      <input type="file" class="custom-file-input" id="customFile" name="logo">
                                      <label class="custom-file-label" for="customFile">Pilih Berkas</label>
                                    </div>
                                    <input class="btn btn-danger" type="submit" value="Upload Logo">
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php } ?>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- content -->
            
            <?php $this->load->view('components/footer') ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    
    <?php $this->load->view('components/js') ?>

    <script type="text/javascript">

        $( document ).ready(function() {
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });
        
    </script>
</body>

</html>