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
                                <h4 class="page-title">TAMBAH PAKET BIMBINGAN BELAJAR</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <form action="<?php echo base_url('paketbimbel/tambah/aksi') ?>" method="post">
                        Nama Paket:
                        <input class="form-control mb-3" type="text" name="namapaket" required>

                        Nominal:
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input class="form-control nominal" type="text" name="nominal" required>
                        </div>

                        <a class="btn btn-warning" href="<?php echo base_url('paketbimbel') ?>">Kembali</a>
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
            $('.nominal').mask('000.000.000.000.000', {reverse: true});

            $("form").submit(function() {
                $(".nominal").unmask();
            });
        });
        
    </script>
</body>

</html>