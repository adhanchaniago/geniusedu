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
                                <h4 class="page-title">EDIT PENGELUARAN</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <?php foreach ($pengeluaran as $p) { ?>
                    <form action="<?php echo base_url('pengeluaran/edit/aksi/').$p->pengeluaran_id ?>" method="post">
                        Tanggal Pengeluaran:
                        <input class="form-control mb-3 tanggal" type="text" name="tanggal" value="<?php echo $p->pengeluaran_tanggal ?>" required>

                        Kategori Pengeluaran:
                        <select class="form-control mb-3" name="kategori" required>
                            <?php foreach ($kategori as $k) { ?>
                            <option value="<?php echo $k->kategoripengeluaran_id ?>" <?php if($p->pengeluaran_kategoripengeluaran_id == $k->kategoripengeluaran_id){echo "selected";} ?>><?php echo $k->kategoripengeluaran_nama ?></option>
                            <?php } ?>
                        </select>

                        Nominal:
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input class="form-control nominal" type="text" name="nominal" value="<?php echo $p->pengeluaran_nominal ?>" required>
                        </div>

                        Keterangan:
                        <input class="form-control mb-3" type="text" name="keterangan" value="<?php echo $p->pengeluaran_keterangan ?>">

                        <a class="btn btn-warning" href="<?php echo base_url('pengeluaran') ?>">Kembali</a>
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