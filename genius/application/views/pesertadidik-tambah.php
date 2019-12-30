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
                                <h4 class="page-title">TAMBAH PESERTA DIDIK</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <form action="<?php echo base_url('pesertadidik/tambah/aksi') ?>" method="post">
                        Nama Lengkap:
                        <input class="form-control mb-3" type="text" name="nama" required>

                        No. Induk:
                        <input class="form-control mb-3" type="text" name="noinduk" required>

                        Jenis Kelamin:
                        <select class="form-control mb-3" name="jk" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>

                        Tempat Lahir:
                        <input class="form-control mb-3" type="text" name="tempatlahir" required>

                        Tanggal Lahir:
                        <input class="form-control mb-3 tanggal" type="text" name="tanggallahir" required>

                        Agama:
                        <select class="form-control mb-3" name="agama" required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kriten">Kriten</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>

                        Alamat Lengkap:
                        <input class="form-control mb-3" type="text" name="alamat" required>

                        No. Telepon:
                        <input class="form-control mb-3 nomor" type="text" name="telepon">

                        Nama Ayah:
                        <input class="form-control mb-3" type="text" name="ayah" required>

                        Nama Ibu:
                        <input class="form-control mb-3" type="text" name="ibu" required>

                        Pekerjaan Ayah:
                        <input class="form-control mb-3" type="text" name="pekerjaanayah">

                        Pekerjaan Ibu:
                        <input class="form-control mb-3" type="text" name="pekerjaanibu">

                        No. Telepon Orang Tua:
                        <input class="form-control mb-3 nomor" type="text" name="teleponortu">

                        Paket Bimbingan Belajar:
                        <select class="form-control mb-3" name="paketbimbel" required>
                            <option value="">Pilih Paket</option>
                            <?php foreach ($paketbimbel as $p) { ?>
                            <option value="<?php echo $p->paketbimbel_id ?>"><?php echo $p->paketbimbel_nama ?></option>
                            <?php } ?>
                        </select>

                        <a class="btn btn-warning" href="<?php echo base_url('pesertadidik') ?>">Kembali</a>
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

            $('.nomor').mask('0#');
        });
        
    </script>
</body>

</html>