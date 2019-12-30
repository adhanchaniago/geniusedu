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
                                <h4 class="page-title">DAFTAR PAKET BIMBINGAN BELAJAR</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <a class="btn btn-primary mb-2" href="<?php echo base_url('paketbimbel/tambah') ?>">Tambah</a>

                    <table class="table table-striped table-bordered table-responsive-md">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Nominal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($paketbimbel as $p) {
                            ?>
                            <tr>
                                <td><?php echo $p->paketbimbel_nama ?></td>
                                <td>Rp. <span class="nominal"><?php echo $p->paketbimbel_nominal ?></span></td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo base_url('paketbimbel/edit/').$p->paketbimbel_id ?>">Edit</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('paketbimbel/hapus/').$p->paketbimbel_id ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

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
            $('.table').DataTable( {
                "order": []
            } );
            $('.nominal').mask('000.000.000.000.000', {reverse: true});
        });
        
    </script>
</body>

</html>