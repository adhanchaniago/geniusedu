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
                                <h4 class="page-title">PENGATURAN PENGELUARAN</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <a class="btn btn-warning mb-2" href="<?php echo base_url('pengeluaran') ?>">Kembali</a>
                    <a class="btn btn-primary mb-2" href="<?php echo base_url('pengeluaran/setting/tambah') ?>">Tambah</a>

                    <table class="table table-striped table-bordered table-responsive-md">
                        <thead>
                            <tr>
                                <th>Kategori Pengeluaran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($kategori as $k) { ?>
                            <tr>
                                <td><?php echo $k->kategoripengeluaran_nama ?></td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo base_url('pengeluaran/setting/edit/').$k->kategoripengeluaran_id ?>">Edit</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('pengeluaran/setting/hapus/').$k->kategoripengeluaran_id ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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
        });
        
    </script>
</body>

</html>