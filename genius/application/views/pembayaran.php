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
                                <h4 class="page-title">MENU PEMBAYARAN</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    
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
                                    <a class="btn btn-primary" href="<?php echo base_url('pembayaran/bayar/').$pd->pesertadidik_id ?>">Bayar</a>
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