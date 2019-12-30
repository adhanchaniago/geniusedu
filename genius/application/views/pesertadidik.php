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
                                <h4 class="page-title">DAFTAR PESERTA DIDIK</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <a class="btn btn-primary mb-2" href="<?php echo base_url('pesertadidik/tambah') ?>">Tambah</a>

                    <table class="table table-striped table-bordered table-responsive-md">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>No. Induk</th>
                                <th>L/P</th>
                                <th>Paket Bimbel</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($pesertadidik as $pd) { ?>
                            <tr>
                                <td><?php echo $pd->pesertadidik_nama ?></td>
                                <td><?php echo $pd->pesertadidik_noinduk ?></td>
                                <td>
                                    <?php
                                    if ($pd->pesertadidik_jk == "l") {
                                        echo "Laki-laki";
                                    }elseif ($pd->pesertadidik_jk == "p") {
                                        echo "Perempuan";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $pd->paketbimbel_nama ?></td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo base_url('pesertadidik/edit/').$pd->pesertadidik_id?>">Edit</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('pesertadidik/hapus/').$pd->pesertadidik_id ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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
            $('.table').DataTable();
        });
        
    </script>
</body>

</html>