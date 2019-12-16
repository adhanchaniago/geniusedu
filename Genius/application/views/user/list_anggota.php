<!-- DataTables -->
<div class="card mb-3">
    <div class="card-header">
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>nama_kepala</th>
                        <th>TTL</th>
                        <th>image</th>
                        <th>deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_lab as $list_lab) : ?>
                        <tr>
                            <?php $list_lab->id_puskeswan ?>
                            <td width="150">
                                <?php echo $list_lab->nama_kepala ?>
                            </td>
                            <td width="150">
                                <?php echo $list_lab->TTL ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url('assets/img/profile/' . $list_lab->image) ?>" width="64" />
                            </td>
                            <td class="small">
                                <?php echo substr($list_lab->deskripsi, 0, 120) ?>...</td>
                            <td width="250">
                                <a href="<?php echo site_url('user/edit_Lab_Upt/' . $list_lab->id_puskeswan); ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo site_url('user/delete/' . $list_lab->id_puskeswan); ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->



<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>
</body>

</html>