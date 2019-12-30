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
                                <h4 class="page-title">EDIT PESERTA DIDIK</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <?php foreach ($pesertadidik as $pd) { ?>
                    <form action="<?php echo base_url('pesertadidik/edit/aksi/').$pd->pesertadidik_id ?>" method="post">
                        Nama Lengkap:
                        <input class="form-control mb-3" type="text" name="nama" value="<?php echo $pd->pesertadidik_nama ?>" required>

                        No. Induk:
                        <input class="form-control mb-3" type="text" name="noinduk" value="<?php echo $pd->pesertadidik_noinduk ?>" required>

                        Jenis Kelamin:
                        <select class="form-control mb-3" name="jk" required>
                            <option value="l" <?php if($pd->pesertadidik_jk=='l'){echo "selected";} ?>>Laki-laki</option>
                            <option value="p" <?php if($pd->pesertadidik_jk=='p'){echo "selected";} ?>>Perempuan</option>
                        </select>

                        Tempat Lahir:
                        <input class="form-control mb-3" type="text" name="tempatlahir" value="<?php echo $pd->pesertadidik_tempatlahir ?>" required>

                        Tanggal Lahir:
                        <input class="form-control mb-3 tanggal" type="text" name="tanggallahir" value="<?php echo $pd->pesertadidik_tanggallahir ?>" required>

                        Agama:
                        <select class="form-control mb-3" name="agama" required>
                            <option value="Islam" <?php if($pd->pesertadidik_agama=='Islam'){echo "selected";} ?>>Islam</option>
                            <option value="Kriten" <?php if($pd->pesertadidik_agama=='Kriten'){echo "selected";} ?>>Kriten</option>
                            <option value="Katolik" <?php if($pd->pesertadidik_agama=='Katolik'){echo "selected";} ?>>Katolik</option>
                            <option value="Hindu" <?php if($pd->pesertadidik_agama=='Hindu'){echo "selected";} ?>>Hindu</option>
                            <option value="Budha" <?php if($pd->pesertadidik_agama=='Budha'){echo "selected";} ?>>Budha</option>
                            <option value="Konghucu" <?php if($pd->pesertadidik_agama=='Konghucu'){echo "selected";} ?>>Konghucu</option>
                        </select>

                        Alamat Lengkap:
                        <input class="form-control mb-3" type="text" name="alamat" value="<?php echo $pd->pesertadidik_alamat ?>" required>

                        No. Telepon:
                        <input class="form-control mb-3 nomor" type="text" name="telepon" value="<?php echo $pd->pesertadidik_telepon ?>">

                        Nama Ayah:
                        <input class="form-control mb-3" type="text" name="ayah" value="<?php echo $pd->pesertadidik_ayah ?>" required>

                        Nama Ibu:
                        <input class="form-control mb-3" type="text" name="ibu" value="<?php echo $pd->pesertadidik_ibu ?>" required>

                        Pekerjaan Ayah:
                        <input class="form-control mb-3" type="text" name="pekerjaanayah" value="<?php echo $pd->pesertadidik_pekerjaanayah ?>">

                        Pekerjaan Ibu:
                        <input class="form-control mb-3" type="text" name="pekerjaanibu" value="<?php echo $pd->pesertadidik_pekerjaanibu ?>">

                        No. Telepon Orang Tua:
                        <input class="form-control mb-3 nomor" type="text" name="teleponortu" value="<?php echo $pd->pesertadidik_teleponortu ?>">

                        Paket Bimbingan Belajar:
                        <select class="form-control mb-3" name="paketbimbel" required>
                            <?php foreach ($paketbimbel as $p) { ?>
                            <option value="<?php echo $p->paketbimbel_id ?>" <?php if($pd->pesertadidik_paketbimbel_id == $p->paketbimbel_id){echo "selected";} ?>><?php echo $p->paketbimbel_nama ?></option>
                            <?php } ?>
                        </select>

                        <a class="btn btn-warning" href="<?php echo base_url('pesertadidik') ?>">Kembali</a>
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

            $('.nomor').mask('0#');
        });
        
    </script>
</body>

</html>