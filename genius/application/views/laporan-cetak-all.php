<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/css') ?>

    <style type="text/css">
        .table th {
           text-align: center;   
        }
    </style>
</head>

<body>
    
    <div class="container mt-5">
        <div class="font-weight-bold mb-4 h5"><center>LAPORAN KEUANGAN</center></div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Transaksi</th>
                    <th>Dana Masuk</th>
                    <th>Dana Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($transaksi as $t) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <?php
                        if ($t->status == 1) {
                            echo "Pembayaran";
                        }elseif ($t->status == 2) {
                            echo "Pengeluaran";
                        }
                        ?>
                    </td>
                    <td><?php echo $controller->tgl_indo($t->pembayaran_tanggalbayar) ?></td>
                    <td>
                        <?php
                        if ($t->status == 1) {
                            echo $t->pesertadidik_nama;
                        }elseif ($t->status == 2) {
                            echo $t->kategoripengeluaran_nama;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($t->status == 1) {
                            echo 'Rp. <span class="nominal">'.$t->pembayaran_nominalbayar.'</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($t->status == 2) {
                            echo 'Rp. <span class="nominal">'.$t->pengeluaran_nominal.'</span>';
                        }
                        ?>
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