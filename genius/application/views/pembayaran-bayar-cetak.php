<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/css') ?>
    <style type="text/css">
        table tr td {
            padding: 5px 0px;
        }
    </style>
</head>

<body>
    
    <div class="container m-5">
        <div class="font-weight-bold mb-3 h5"><center>REKAP PEMBAYARAN SISWA</center></div>

        <table class="mb-3">
            <?php foreach ($pesertadidik as $pd) { ?>
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
                <td>Paket Bimbel</td>
                <td>:</td>
                <td><?php echo $pd->paketbimbel_nama ?></td>
            </tr>
            <?php } ?>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No. Kwitansi</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Nominal Pembayaran</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($pembayaran as $p) { ?>
                <tr>
                    <td><?php echo $p->pembayaran_kwitansi ?></td>
                    <td><?php echo $controller->tgl_indo($p->pembayaran_tanggalbayar) ?></td>
                    <td>Rp. <span class="nominal"><?php echo $p->pembayaran_nominalbayar ?></span></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">Total Terbayar :</td>
                    <td>Rp. <span class="nominal"><?php foreach ($terbayar as $t) { echo $t->pembayaran_nominalbayar; } ?></span></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Total yang Harus Dibayar :</td>
                    <td>Rp. <span class="nominal"><?php echo $totalbayar ?></span></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">Keterangan :</td>
                    <td>
                        <?php
                        if ($kurangbayar > 0) {
                            echo 'Kurang Rp. <span class="nominal">'.$kurangbayar.'</span>';
                        }elseif ($kurangbayar == 0) {
                            echo '<span class="font-weight-bold">LUNAS</span>';
                        }elseif ($kurangbayar < 0) {
                            echo 'Lebih Rp. <span class="nominal">'.$kurangbayar.'</span>';
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <?php $this->load->view('components/js') ?>

    <script type="text/javascript">

        $( document ).ready(function() {
            $('.nominal').mask('000.000.000.000.000', {reverse: true});
        });
        
    </script>
</body>

</html>