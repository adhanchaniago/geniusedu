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
                                <h4 class="page-title">TAMBAH GURU</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <form action="<?php echo base_url('guru/tambah/aksi') ?>" method="post">
                        Nama Lengkap:
                        <input class="form-control mb-3" type="text" name="nama" required>

                        Jenis Kelamin:
                        <select class="form-control mb-3" name="jk" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>

                        Alamat Lengkap:
                        <input class="form-control mb-3" type="text" name="alamat">

                        No. Telepon:
                        <input class="form-control mb-3 nomor" type="text" name="telepon">

                        <a class="btn btn-warning" href="<?php echo base_url('guru') ?>">Kembali</a>
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
            $('.nomor').mask('0#');
        });
        
    </script>
</body>

</html>