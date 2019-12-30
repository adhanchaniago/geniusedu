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
                                <h4 class="page-title">TAMBAH PENGELUARAN</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <form action="<?php echo base_url('pengeluaran/tambah/aksi') ?>" method="post">
                        Tanggal Pengeluaran:
                        <input class="form-control mb-3 tanggal" type="text" name="tanggal" required>

                        Kategori Pengeluaran:
                        <select class="form-control mb-3" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $k) { ?>
                            <option value="<?php echo $k->kategoripengeluaran_id ?>"><?php echo $k->kategoripengeluaran_nama ?></option>
                            <?php } ?>
                        </select>

                        Nominal:
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input class="form-control nominal" type="text" name="nominal" required>
                        </div>

                        Keterangan:
                        <input class="form-control mb-3" type="text" name="keterangan">

                        <a class="btn btn-warning" href="<?php echo base_url('pengeluaran') ?>">Kembali</a>
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
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                clearBtn: true,
                language: "id",
                autoclose: true,
                todayHighlight: true
            });

            $('.nominal').mask('000.000.000.000.000', {reverse: true});

            $("form").submit(function() {
                $(".nominal").unmask();
            });
        });
        
    </script>
</body>

</html>