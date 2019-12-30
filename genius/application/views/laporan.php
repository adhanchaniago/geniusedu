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
                                <h4 class="page-title">LAPORAN</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <form action="<?php echo base_url('laporan/cetak') ?>" target="_blank" method="post">
                    <table class="table table-striped table-bordered table-responsive-md">
                        <thead>
                            <tr>
                                <th>Sort</th>
                                <th>Rentang Awal</th>
                                <th>Rentang Akhir</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="sort">
                                        <option value="semua">Semua</option>
                                        <option value="siswa">Siswa</option>
                                        <option value="paket">Paket</option>
                                    </select>
                                </td>
                                <td><input class="form-control tanggal" type="text" name="tanggalawal"></td>
                                <td><input class="form-control tanggal" type="text" name="tanggalakhir"></td>
                                <td><input class="btn btn-primary" type="submit" value="Cetak"></td>
                            </tr>
                        </tbody>
                    </table>
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
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                clearBtn: true,
                language: "id",
                autoclose: true,
                todayHighlight: true
            });
        });
        
    </script>
</body>

</html>