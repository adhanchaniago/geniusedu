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
                    <?php
                    foreach ($user as $u) {
                    ?>

                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="page-title">UBAH PASSWORD USER : <?php echo $u->user_nama ?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <form action="<?php echo base_url('user/ubahpassword/aksi/').$u->user_id ?>" method="post">
                        Password Baru:
                        <input class="form-control mb-3" type="password" name="password" required>

                        <a class="btn btn-warning" href="<?php echo base_url('user') ?>">Kembali</a>
                        <input class="btn btn-primary" type="submit" value="Simpan"> 
                    </form>

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
            
        });
        
    </script>
</body>

</html>