<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>

<!-- Card  -->
<div class="card mb-3">
	<div class="card-header">

		<a href="<?php echo site_url('User/list_lab'); ?>"><i class="fas fa-arrow-left"></i>
			Back</a>
	</div>
	<div class="card-body">


		<?= form_open_multipart('User/edit_action_UPT'); ?>

		<input type="hidden" name="id_puskeswan" value="<?php echo $list_lab['id_puskeswan']; ?>" />

		<div class="form-group">
			<label for="name">Nama*</label>
			<input class="form-control" type="text" id="nama_kepala" name="nama_kepala" value="<?php echo $list_lab['nama_kepala']; ?>" />
			<div class="invalid-feedback">

			</div>
		</div>

		<div class="form-group">
			<label for="name">Photo</label>
			<input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
			<input type="hidden" name="old_image" value="<?php echo $list_lab['image']; ?>" />
			<div class="invalid-feedback">

			</div>
		</div>
		<div class="form-group">
			<label for="name">TTL*</label>
			<textarea class="form-control" id="TTL" name="TTL"><?php echo $list_lab['TTL']; ?></textarea>
			<div class="invalid-feedback">

			</div>
		</div>

		<div class="form-group">
			<label for="name">Deskripsi*</label>
			<textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $list_lab['deskripsi']; ?></textarea>
			<div class="invalid-feedback">

			</div>
		</div>

		<button class="btn btn-success" type="submit" name="btn">SAVE</button>
		</form>

	</div>

	<div class="card-footer small text-muted">
		* required fields
	</div>



	<!-- /.container-fluid -->

	<!-- Sticky Footer -->



	<!-- /.content-wrapper -->


	<!-- /#wrapper -->



	</body>

	</html>