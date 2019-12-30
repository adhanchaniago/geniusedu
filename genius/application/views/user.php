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
                                <h4 class="page-title">DAFTAR USER</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <a class="btn btn-primary mb-2" href="<?php echo base_url('user/tambah') ?>">Tambah</a>

                    <table class="table table-striped table-bordered table-responsive-md">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            foreach($user as $u){
                            ?>
                            <tr>
                                <td><?php echo $u->user_nama ?></td>
                                <td><?php echo $u->user_username ?></td>
                                <td>
                                    <?php
                                    $level = $u->user_level;
                                    if ($level == 1) {
                                        echo "Administrator";
                                    }elseif ($level == 2) {
                                        echo "Staff";
                                    }elseif ($level == 3) {
                                        echo "Siswa";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo base_url('user/edit/').$u->user_id ?>">Edit</a>
                                    <a class="btn btn-success" href="<?php echo base_url('user/ubahpassword/').$u->user_id ?>">Ubah Password</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('user/hapus/').$u->user_id ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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