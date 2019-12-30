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
                                <h4 class="page-title">EDIT PAKET BIMBINGAN BELAJAR</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <?php
                    foreach ($paketbimbel as $p) {
                    ?>
                    <form action="<?php echo base_url('paketbimbel/edit/aksi/').$p->paketbimbel_id ?>" method="post">
                        Nama Paket:
                        <input class="form-control mb-3" type="text" name="namapaket" value="<?php echo $p->paketbimbel_nama ?>" required>

                        Nominal:
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input class="form-control nominal" type="text" name="nominal" value="<?php echo $p->paketbimbel_nominal ?>" required>
                        </div>

                        <a class="btn btn-warning" href="<?php echo base_url('paketbimbel') ?>">Kembali</a>
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
            $('.nominal').mask('000.000.000.000.000', {reverse: true});

            $("form").submit(function() {
                $(".nominal").unmask();
            });
        });
        
    </script>
</body>

</html>