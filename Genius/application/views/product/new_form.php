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
			<label for="name">NIS*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Nomer Induk Siswa" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="name">Nama Lengkap*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Nama lengkap siswa" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Jenjang*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Tingkat satuan pendidikan" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Asal Sekolah*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Nama asal sekolah" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Alamat*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Alamat rumah" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">No. Hp*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Nomer yang bisa dihubungi" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Nama Ortu*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Nama orangtua" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Pekerjaan Ortu*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Pekerjaan orangtua" />
			<div class="invalid-feedback">
				<?php echo form_error('name') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Total Bayar*</label>
			<input class="form-control" type="text" id="name" name="name" placeholder="Nominal bayar" />
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