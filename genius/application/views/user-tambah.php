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
                                <h4 class="page-title">TAMBAH USER</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <form action="<?php echo base_url('user/tambah/aksi') ?>" method="post">
                        Nama User:
                        <input class="form-control mb-3" type="text" name="nama" required>

                        Username:
                        <input class="form-control mb-3" type="text" name="username" required>

                        Password:
                        <input class="form-control mb-3" type="password" name="password" required>

                        Level:
                        <select class="form-control mb-3" name="level" required>
                            <option value="">Pilih Level</option>
                            <option value="1">Administrator</option>
                            <option value="2">Staff</option>
                        </select>

                        <a class="btn btn-warning" href="<?php echo base_url('user') ?>">Kembali</a>
                        <input class="btn btn-primary" type="submit" value="Simpan"> 
                    </form>
                    
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