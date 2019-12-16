<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>

<!-- Card  -->
<div class="card mb-3">
	<div class="card-header">

		<a href="<?php echo site_url('User/list'); ?>"><i class="fas fa-arrow-left"></i>
			Back</a>
	</div>
	<div class="card-body">

		<?= form_open_multipart('User/edit_action'); ?>

		<input type="hidden" name="product_id" value="<?php echo $list['product_id']; ?>" />

		<div class="form-group">
			<label for="name">Name*</label>
			<input class="form-control" type="text" id="name" name="name" value="<?php echo $list['name']; ?>" />
			<div class="invalid-feedback">

			</div>
		</div>



		<div class="form-group">
			<label for="name">Photo</label>
			<input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
				<input type="hidden" name="old_image" value="<?php echo $list['image']; ?>" /> 
			<div class="invalid-feedback">

			</div>
		</div>

		<div class="form-group">
			<label for="name">Description*</label>
			<textarea class="form-control" id="description" name="description"><?php echo $list['description']; ?></textarea>
			<div class="invalid-feedback">

			</div>
		</div>

		<button class="btn btn-success" type="submit" name="btn">SAVE</button>
		</form>

	</div>

	<div class="card-footer small text-muted">
		* required fields
	</div>


</div>
<!-- /.container-fluid -->



</body>

</html>