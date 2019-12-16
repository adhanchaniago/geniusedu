<!-- DataTables -->
<div class="card mb-3">
	<div class="card-header">
	</div>
	<div class="card-body">

		<div class="table-responsive">
			<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Name</th>
						<th>Photo</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list as $tr) : ?>
						<tr>
							<?php $tr->product_id ?>
							<td width="150">
								<?php echo $tr->name ?>
							</td>
							<td>
								<img src="<?php echo base_url('assets/img/profile/' . $tr->image) ?>" width="64" />
							</td>
							<td class="small">
								<?php echo substr($tr->description, 0, 120) ?>...</td>

							<td width="250">
								<a href="<?php echo site_url('user/edit_artikel/' . $tr->product_id); ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
								<a href="<?php echo site_url('user/delete/' . $tr->product_id); ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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