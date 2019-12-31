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
                                <h4 class="page-title">DAFTAR PENGELUARAN</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <a class="btn btn-primary mb-2" href="<?php echo base_url('pengeluaran/tambah') ?>">Tambah</a>
                    <a class="btn btn-success mb-2" href="<?php echo base_url('pengeluaran/setting') ?>"><i class="fas fa-cogs"></i> Pengaturan</a>

                    <table class="table table-striped table-bordered table-responsive-md">
                        <thead>
                            <tr>
                                <th>Tanggal Pengeluaran</th>
                                <th>Kategori Pengeluaran</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($pengeluaran as $p) { ?>
                            <tr>
                                <td><?php echo $controller->tgl_indo($p->pembayaran_tanggalbayar) ?></td>
                                <td><?php echo $p->kategoripengeluaran_nama ?></td>
                                <td>Rp. <span class="nominal"><?php echo $p->pengeluaran_nominal ?></span></td>
                                <td><?php echo $p->pengeluaran_keterangan ?></td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo base_url('pengeluaran/edit/').$p->pembayaran_id ?>">Edit</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('pengeluaran/hapus/').$p->pembayaran_id ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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