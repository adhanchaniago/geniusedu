<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo site_url('user/list_lab'); ?>"><i class="fas fa-arrow-left"></i> List</a>
    </div>

    <div class="card-body">

        <?php echo form_open_multipart('user/inputan'); ?>

        <div class="form-group">
            <label for="name">nama_kepala*</label>
            <input class="form-control" type="text" id="nama_kepala" name="nama_kepala" placeholder=" nama ketua lab" />
            <div class="invalid-feedback">
                <?php echo form_error('nama') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="name">TTL*</label>
            <textarea class="form-control" id="TTL" name="TTL" placeholder="Tempat-Tanggal-Lahir"></textarea>
            <div class="invalid-feedback">
                <?php echo form_error('TTL') ?>
            </div>
        </div>
        <div class="form-group">
            <label for="name">deskripsi*</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi"></textarea>
            <div class="invalid-feedback">
                <?php echo form_error('deskripsi') ?>
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