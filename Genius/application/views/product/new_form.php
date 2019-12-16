<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>

<div class="card mb-3">
	<div class="card-header">
		<a href="<?php echo site_url('user/list'); ?>"><i class="fas fa-arrow-left"></i> List</a>
	</div>

	<div class="card-body">

		<?php echo form_open_multipart('user/tambah_artikel'); ?>

		<div class="form-group">
			<label for="name">Name*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Product name" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Description*</label>
			<textarea class="form-control" id="description" name="description" placeholder="Product description..."></textarea>
			<div class="invalid-feedback">
				<?php echo form_error('description') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Photo</label>
			<input class="form-control-file <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="file" name="image" />
			<div class="invalid-feedback">
				<?php echo form_error('image') ?>
			</div>
		</div>



		<button class="btn btn-success" type="submit">SAVE</button>


		<?php echo form_close(); ?>

	</div>

	<div class="card-footer small text-muted">
		* required fields
	</div>


	</body>

	</html>