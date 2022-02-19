<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'Register') ?>

<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-5">
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<div class="m-portlet__body">
				<div class="form-group">
					<img src="<?= base_url('/cdn/img/responden/default.png') ?>" class="foto" style="width: 100%;">
				</div>
				<div class="form-group">
					<input type="file" name="pilih-foto" class="form-control">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<form id="tambah">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Register
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Usia</label>
								<input type="number" class="form-control" placeholder="Masukkan Usia" name="usia" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control">
									<option value="1">Laki-laki</option>
									<option value="2">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Pendidikan/Sekolah Terakhir</label>
								<input type="text" class="form-control" placeholder="Masukkan Pendidikan/Sekolah Terakhir" name="pendidikan_terakhir" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" rows="5" class="form-control" placeholder="Masukkan Alamat" style="resize: none;"></textarea>
							</div>
						</div>
						<div class="col-md">
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Status Pendidikan</label>
								<select name="status_pendidikan" class="form-control">
									<option value="SD">SD</option>
									<option value="SMP">SMP</option>
									<option value="SMA">SMA</option>
									<option value="Sarjana">Sarjana</option>
								</select>
							</div>
							<div class="form-group">
								<label>Status Pernikahan</label>
								<select name="status_pernikahan" class="form-control">
									<option value="1">Belum Menikah</option>
									<option value="2">Sudah Menikah</option>
								</select>
							</div>
							<div class="form-group">
								<label>Nomor Telepon</label>
								<input type="text" class="form-control" placeholder="Masukkan Nomor Telepon" name="nomor_telepon" autocomplete="off">
							</div>
							<input type="hidden" name="foto">
						</div>
					</div>
				</div>
				<div class="m-portlet__foot text-right">
					<a href="<?= base_url('/auth/responden') ?>" class="btn btn-default">Kembali</a>
					<button type="submit" class="btn btn-success">Daftar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('/cdn/vendors/custom/canvas-resize/jquery.canvasResize.js') ?>"></script>
<script src="<?= base_url('/cdn/vendors/custom/canvas-resize/jquery.exif.js') ?>"></script>
<script src="<?= base_url('/cdn/vendors/custom/canvas-resize/canvasResize.js') ?>"></script>
<script src="<?= base_url('/cdn/vendors/custom/canvas-resize/exif.js') ?>"></script>
<script src="<?= base_url('/cdn/vendors/custom/canvas-resize/binaryajax.js') ?>"></script>
<script src="<?= base_url('/cdn/vendors/custom/canvas-resize/zepto.min.js') ?>"></script>
<script>
	$(document).ready(function() {

		$(document).on('submit', 'form#tambah', function(e) {
			e.preventDefault();
			$.post(base_url + '/api/responden/add', $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success').then(() => {
						window.location = base_url + '/auth/cek/' + res.data_id + '/2';
					});
				}
			})
		});

		$(document).on('change', '[name=pilih-foto]', function() {
			canvasResize(this.files[0], {
				height: 500,
				width: 500,
				crop: true,
				rotation: 0,
				quality: 500,
				callback: (data) => {
					$('.foto').attr('src', data);
					$('[name=foto]').val(data);
				}
			});
		});

	})
</script>
<?= $this->endSection() ?>