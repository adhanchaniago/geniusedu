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
			<label for="no_induk">NIS*</label>
			<input class="form-control" type="text" id="no_induk" name="no_induk" placeholder="Nomer Induk Siswa" onkeypress="return hanyaAngka(event)"/>
			<div class="invalid-feedback">
				<?php echo form_error('no_induk') ?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="nama_siswa">Nama Lengkap*</label>
			<input class="form-control" type="text" id="nama_siswa" name="nama_siswa" placeholder="Nama lengkap siswa" />
			<div class="invalid-feedback">
				<?php echo form_error('nama_siswa') ?>
			</div>
		</div>

		<div class='form-group'>
<label>Jenjang</label>
<select class='form-control' id='jenjang' name='jenjang'>
<option value='0'>--pilih--</option>
<option value='1'>SD</option>
<option value='2'>SMP</option>
<option value='3'>SMA</option>
</select>
</div>

		<div class="form-group">
			<label for="sekolah">Asal Sekolah*</label>
			<input class="form-control" type="text" id="sekolah" name="sekolah" placeholder="Nama asal sekolah" />
			<div class="invalid-feedback">
				<?php echo form_error('sekolah') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="alamat">Alamat*</label>
			<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah"></textarea>
			<div class="invalid-feedback">
				<?php echo form_error('alamat') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="no_hp">No. Hp*</label>
			<input class="form-control" type="text" id="no_hp" name="no_hp" placeholder="Nomer yang bisa dihubungi" onkeypress="return hanyaAngka(event)"/>
			<div class="invalid-feedback">
				<?php echo form_error('no_hp') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="nama_ortu">Nama Ortu*</label>
			<input class="form-control" type="text" id="nama_ortu" name="nama_ortu" placeholder="Nama orangtua" />
			<div class="invalid-feedback">
				<?php echo form_error('nama_ortu') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="pekerjaan_ortu">Pekerjaan Ortu*</label>
			<input class="form-control" type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" placeholder="Pekerjaan orangtua" />
			<div class="invalid-feedback">
				<?php echo form_error('pekerjaan_ortu') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="total_bayar">Total Bayar*</label>
			<input class="form-control" type="text" id="total_bayar" name="total_bayar" placeholder="Nominal bayar" onkeypress="return hanyaAngka(event)"/>
			<div class="invalid-feedback">
				<?php echo form_error('total_bayar') ?>
			</div>
		</div>

		<div class="form-group">
			<label for="name">Photo</label>
			<input class="form-control-file <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="file" name="image" />
			<div class="invalid-feedback">
				<?php echo form_error('image') ?>
			</div>
		</div>

<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>


		<button class="btn btn-success" type="submit">SAVE</button>


		<?php echo form_close(); ?>

	</div>

	<div class="card-footer small text-muted">
		* required fields
	</div>


	</body>

	</html>