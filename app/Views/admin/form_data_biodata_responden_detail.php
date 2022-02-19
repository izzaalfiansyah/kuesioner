<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Biodata Responden') ?>

<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-5">
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<div class="m-portlet__body">
				<div class="form-group">
					<img src="" class="foto" style="width: 100%;">
				</div>
				<div class="form-group">
					<input type="file" name="pilih-foto" class="form-control">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<form id="ubah">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Detail Responden
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
							<div class="form-group">
								<label>Kode</label>
								<input type="text" class="form-control" placeholder="Masukkan Kode" name="kode" autocomplete="off">
							</div>
							<input type="hidden" name="foto">
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md">
							Nama:
							<h4 class="nama">-</h4>
							<hr>
							Usia:
							<h4 class="usia">0</h4>
							<hr>
							Jenis Kelamin: 
							<h4 class="jenis_kelamin">P/L</h4>
							<hr>
							Pendidikan/Sekolah:
							<h4 class="pendidikan_terakhir">-</h4>
							<hr>
							Alamat: 
							<h4 class="alamat">-</h4>	
						</div>
						<div class="col-md">
							Tanggal Lahir:
							<h4 class="tanggal_lahir">0000-00-00</h4>
							<hr>
							Status Pendidikan:
							<h4 class="status_pendidikan">SD/SMP/SMA</h4>
							<hr>
							Status Pernikahan:
							<h4 class="status_pernikahan">Belum/Sudah Menikah</h4>
							<hr>
							Nomor Telepon:
							<h4 class="nomor_telepon">+62</h4>
						</div>
					</div> -->
				</div>
				<div class="m-portlet__foot text-right">
					<a href="<?= base_url('/admin/form-data/biodata-responden') ?>" class="btn btn-default">Kembali</a>
					<button type="submit" class="btn btn-success">Simpan</button>
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
	var responden_id = '<?= $responden_id ?>';

	$(document).ready(function() {
		
		const show = () => {
			$.get(base_url + '/api/responden/details/' + responden_id).done(res => {
				if (res.error) {
					window.location = base_url + '/admin/form-data/biodata-responden';
				} else {
					$('[name=nama]').val(res.data.nama);
					$('[name=usia]').val(res.data.usia);
					$('[name=jenis_kelamin]').val(res.data.jenis_kelamin);
					$('[name=pendidikan_terakhir]').val(res.data.pendidikan_terakhir);
					$('[name=alamat]').val(res.data.alamat);
					$('[name=tanggal_lahir]').val(res.data.tanggal_lahir);
					$('[name=status_pendidikan]').val(res.data.status_pendidikan);
					$('[name=status_pernikahan]').val(res.data.status_pernikahan);
					$('[name=nomor_telepon]').val(res.data.nomor_telepon);
					$('[name=kode]').val(res.data.kode);
					$('.foto').attr('src', base_url + '/cdn/img/responden/' + (res.data.foto ? res.data.foto : 'default.png'));
				}
			})
		}

		show();

		$(document).on('submit', 'form#ubah', function(e) {
			e.preventDefault();
			$.post(base_url + '/api/responden/edit/' + responden_id, $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					show();
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