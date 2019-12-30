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

                    <?php foreach ($pesertadidik as $pd) {} ?>
                    <a class="btn btn-warning mb-3" href="<?php echo base_url('pembayaran') ?>">Kembali</a>
                    <a class="btn btn-primary mb-3" target="_blank" href="<?php echo base_url('pembayaran/bayar/cetak/').$pd->pesertadidik_id ?>"><i class="fas fa-print"></i> Cetak</a>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <?php foreach ($pesertadidik as $pd) { ?>
                            <form action="<?php echo base_url('pembayaran/bayar/simpan/').$pd->pesertadidik_id ?>" method="post">
                                <table class="table table-borderless table-striped">
                                    <tr>
                                        <td width="150px">No. Induk</td>
                                        <td width="30px">:</td>
                                        <td><?php echo $pd->pesertadidik_noinduk ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td><?php echo $pd->pesertadidik_nama ?></td>
                                    </tr>

                                    <tr>
                                        <td>Paket</td>
                                        <td>:</td>
                                        <td><?php echo $pd->paketbimbel_nama ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nominal</td>
                                        <td>:</td>
                                        <td>Rp. <span class="nominal"><?php echo $pd->paketbimbel_nominal ?></span></td>
                                    </tr>

                                    <tr>
                                        <td>Diskon (%)</td>
                                        <td>:</td>
                                        <td><input class="form-control nomor" type="text" name="diskonpersen" value="<?php echo $pd->pesertadidik_diskonpersen ?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Diskon (Rp)</td>
                                        <td>:</td>
                                        <td><input class="form-control nominal" type="text" name="diskonnominal" value="<?php echo $pd->pesertadidik_diskonnominal ?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Keterangan Diskon</td>
                                        <td>:</td>
                                        <td><input class="form-control" type="text" name="keterangandiskon" value="<?php echo $pd->pesertadidik_keterangandiskon ?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Potongan</td>
                                        <td>:</td>
                                        <td class="text-danger">- Rp. <span class="nominal"><?php echo $potongan ?></span></td>
                                    </tr>

                                    <tr>
                                        <td>Total yang Harus Dibayar</td>
                                        <td>:</td>
                                        <td>Rp. <span class="nominal"><?php echo $totalbayar ?></span></td>
                                    </tr>

                                    <tr>
                                        <td>Total Terbayar</td>
                                        <td>:</td>
                                        <td>Rp. <span class="nominal"><?php foreach ($terbayar as $t) { echo $t->pembayaran_nominalbayar; } ?></span></td>
                                    </tr>

                                    <tr>
                                        <td>Kurang Pembayaran</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if ($kurangbayar > 0) {
                                                echo 'Rp. <span class="nominal">'.$kurangbayar.'</span>';
                                            }elseif ($kurangbayar == 0) {
                                                echo '<span class="bg-success text-white font-weight-bold p-1 rounded">LUNAS</span>';
                                            }elseif ($kurangbayar < 0) {
                                                echo 'Lebih Rp. <span class="nominal">'.$kurangbayar.'</span>';
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Batas Waktu Pembayaran</td>
                                        <td>:</td>
                                        <td><input class="form-control tanggal" type="text" name="batasbayar" value="<?php echo $pd->pesertadidik_batasbayar ?>" required></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><input class="btn btn-success" type="submit" value="Simpan"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php } ?>
                        </div>

                        <div class="col-lg-6 col-sm-12">
                            <?php foreach ($pesertadidik as $pd) { ?>
                            <form action="<?php echo base_url('pembayaran/bayar/aksi/').$pd->pesertadidik_id ?>" method="post">
                                <table class="table table-borderless table-striped">
                                    <tr>
                                        <td width="150px">Nominal Bayar</td>
                                        <td width="30px">:</td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Rp</div>
                                                </div>
                                                <input class="form-control bayar" type="text" name="nominalbayar" placeholder="<?php echo $kurangbayar ?>" required>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Bayar</td>
                                        <td>:</td>
                                        <td><input class="form-control tanggal" type="text" name="tanggalbayar" required></td>
                                    </tr>

                                    <tr>
                                        <td>No. Kwitansi</td>
                                        <td>:</td>
                                        <td><input class="form-control" type="text" name="kwitansi" required></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><input class="btn btn-primary" type="submit" value="Bayar"></td>
                                    </tr>
                                </table>

                                <div class="mb-2"><b>Daftar Pembayaran</b></div>

                                <table id="table" class="table table-striped table-bordered table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>No. Kwitansi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($pembayaran as $bayar) { ?>
                                        <tr>
                                            <td><?php echo $bayar->pembayaran_tanggalbayar ?></td>
                                            <td>Rp. <span class="nominal"><?php echo $bayar->pembayaran_nominalbayar ?></span></td>
                                            <td><?php echo $bayar->pembayaran_kwitansi ?></td>
                                            <td>
                                                <a class="btn btn-danger" href="<?php echo base_url('pembayaran/bayar/hapus/').$bayar->pembayaran_id ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                    
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
            $('#table').DataTable();
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                clearBtn: true,
                language: "id",
                autoclose: true,
                todayHighlight: true
            });

            $('.nominal').mask('000.000.000.000.000', {reverse: true});

            $('.bayar').inputmask("numeric", {
                min: 0,
                max: <?php echo $kurangbayar ?>
            });

            $('.nomor').mask('0#');

            $("form").submit(function() {
                $('.nominal,.bayar').unmask();
            });
        });
        
    </script>
</body>

</html>