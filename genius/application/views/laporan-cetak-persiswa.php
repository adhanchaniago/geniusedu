<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/css') ?>

    <style type="text/css">
        .table th {
           text-align: center;   
        }

        /*@media print{@page {size: landscape}}*/
    </style>
</head>

<body>
    
    <div class="container mt-5">
        <div class="font-weight-bold mb-4 h5"><center>LAPORAN SISWA</center></div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Induk</th>
                    <th>Nama Lengkap</th>
                    <th>Paket Bimbel</th>
                    <th>Total yang Harus Dibayar</th>
                    <th>Total Terbayar</th>
                    <th>Kekurangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pesertadidik as $pd) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $pd->pesertadidik_noinduk ?></td>
                    <td><?php echo $pd->pesertadidik_nama ?></td>
                    <td><?php echo $pd->paketbimbel_nama ?></td>
                    <td>
                        <?php
                        if (empty($pd->pesertadidik_diskonpersen)) {
                            $diskonpersen = 0;
                        }else {
                            $diskonpersen = $pd->paketbimbel_nominal * $pd->pesertadidik_diskonpersen / 100;
                        }

                        if (empty($pd->pesertadidik_diskonnominal)) {
                            $diskonnominal = 0;
                        }else {
                            $diskonnominal = $pd->pesertadidik_diskonnominal;
                        }

                        $potongan = $diskonpersen + $diskonnominal;

                        $totalbayar = $pd->paketbimbel_nominal - $potongan;
                        ?>

                        Rp. <span class="nominal"><?php echo $totalbayar ?></span>
                    </td>
                    <td>
                        <?php
                        $wherebayar = array('pembayaran_pesertadidik_id' => $pd->pesertadidik_id);
                        $terbayar = $this->db->select_sum('pembayaran_nominalbayar')->get_where('pembayaran',$wherebayar)->result();
                        ?>

                        Rp. <span class="nominal"><?php foreach ($terbayar as $tb) {echo $tb->pembayaran_nominalbayar;} ?></span>
                    </td>
                    <td>
                        <?php
                        $kurangbayar = $totalbayar - $tb->pembayaran_nominalbayar;
                        ?>

                        Rp. <span class="nominal"><?php echo $kurangbayar ?></span>
                    </td>
                </tr>
                <?php } ?>
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