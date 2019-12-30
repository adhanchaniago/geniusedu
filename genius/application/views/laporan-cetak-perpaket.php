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
        <div class="font-weight-bold mb-4 h5"><center>LAPORAN PAKET BIMBINGAN BELAJAR</center></div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Paket Bimbel</th>
                    <th>Dana Seharusnya</th>
                    <th>Dana Masuk</th>
                    <th>Kekurangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($paketbimbel as $paket) {
                ?>
                <tr>
                    <td><?php echo $no ++ ?></td>
                    <td><?php echo $paket->paketbimbel_nama ?></td>
                    <td>
                        <?php
                        $wherecount = array('pesertadidik_paketbimbel_id' => $paket->paketbimbel_id);
                        $countpaket = $this->db->where($wherecount)->count_all_results('pesertadidik');
                        $danaseharusnya = $paket->paketbimbel_nominal * $countpaket;
                        ?>

                        Rp. <span class="nominal"><?php echo $danaseharusnya ?></span>
                    </td>
                    <td>
                        <?php
                        $wherebayar = array('paketbimbel_id' => $paket->paketbimbel_id);
                        $pembayaran = $this->db->select_sum('pembayaran_nominalbayar')
                                               ->from('pembayaran')
                                               ->join('pesertadidik', 'pesertadidik.pesertadidik_id = pembayaran.pembayaran_pesertadidik_id','left')
                                               ->join('paketbimbel', 'pesertadidik.pesertadidik_paketbimbel_id = paketbimbel.paketbimbel_id','left')
                                               ->where($wherebayar)
                                               ->get()
                                               ->result();
                        ?>

                        Rp. <span class="nominal"><?php foreach ($pembayaran as $bayar) {echo $bayar->pembayaran_nominalbayar;} ?></span>
                    </td>
                    <td>
                        <?php
                        $kekurangan = $danaseharusnya - $bayar->pembayaran_nominalbayar;
                        ?>

                        Rp. <span class="nominal"><?php echo $kekurangan ?></span>
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