<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Soal') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Data Soal
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<button class="btn btn-primary mr-2" type="button" data-toggle="modal" data-target="#import">
				<i class="fa fa-file"></i>
				Import
			</button>
			<button class="btn btn-success" type="button" data-toggle="modal" data-target="#tambah">
				<i class="fa fa-plus"></i>
				Tambah
			</button>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="row" id="soal">
			
		</div>
	</div>
</div>
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="tambah">
				<div class="modal-header">
					<div class="modal-title">Tambah Soal</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Soal</label>
						<textarea name="teks" rows="7" class="form-control" placeholder="Masukkan Teks Soal"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="ubah">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="ubah">
				<div class="modal-header">
					<div class="modal-title">Edit Soal</div>
				</div>
				<div class="modal-body">
					<input type="hidden" class="id">
					<div class="form-group">
						<label>Soal</label>
						<textarea name="teks" rows="7" class="form-control" placeholder="Masukkan Teks Soal"></textarea>
					</div>
					<div class="form-group">
						<label>Urutan Soal ke</label>
						<select name="urutan" class="form-control"></select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="hapus">
				<div class="modal-header">
					<div class="modal-title">Hapus Soal</div>
				</div>
				<div class="modal-body">
					<input type="hidden" class="id">
					<p>Anda yakin menghapus soal ?</p>
					<ul>
						<li class="teks"></li>
					</ul>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button class="btn btn-danger" type="submit">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="import">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="import">
				<div class="modal-header">
					<div class="modal-title">Import Soal</div>
				</div>
				<div class="modal-body">
					<p>silahkan unduh format file excel <a href="<?= base_url('/cdn/file/soal.xlsx') ?>">disini</a></p>
					<div class="form-group">
						<input type="file" name="pilih-excel" class="form-control">
					</div>
					<input type="hidden" name="excel">
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" type="submit">Import</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	$(document).ready(function() {
		
		show = () => {
			$.get(base_url + '/api/soal').done(res => {
				soal = ''
				if (res.data) {
					res.data.forEach(obj => {
						soal += `
						<div class="col-lg-12 mb-3">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12 mt-3 mb-2">
											` + obj.urutan + `. ` + obj.teks + `
										</div>
										<div class="col-lg-3 col-xs-6 col-sm-6 col-6">
											<div class="card text-center mb-3">
												<div class="card-header">
													STS
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col">
															1
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															2
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															3
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-xs-6 col-sm-6 col-6">
											<div class="card text-center mb-3">
												<div class="card-header">
													TS
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col">
															4
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															5
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															6
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-xs-6 col-sm-6 col-6">
											<div class="card text-center mb-3">
												<div class="card-header">
													S
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col">
															7
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															8
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															9
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-xs-6 col-sm-6 col-6">
											<div class="card text-center mb-3">
												<div class="card-header">
													SS
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col">
															10
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															11
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
														<div class="col">
															12
															<br>
															<input type="radio" name="jawaban-` + obj.id + `">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-right">
									<button class="btn btn-info btn-sm btn-ubah" type="button" data-toggle="modal" data-target="#ubah" data-id="` + obj.id + `" data-teks="` + obj.teks + `" data-urutan="` + obj.urutan + `">
										<i class="fa fa-pen"></i>
										Edit
									</button>
									<button class="btn btn-sm btn-danger btn-hapus" type="button" data-toggle="modal" data-target="#hapus" data-id="` + obj.id + `" data-teks="` + obj.teks + `">
										<i class="fa fa-trash"></i>
										Hapus
									</button>
								</div>
							</div>
						</div>
						`;
					})
				} else {
					soal += `
					<div class="text-center col-lg-12">
						` + res.message + `
					</div>
					`;
				}
				$('#soal').html(soal)

				urutan = ''
				for (var i = 1; i <= res.data.length; i++) {
					urutan += '<option value="' + i + '">' + i + '</option>';
				}
				$('[name=urutan]').html(urutan);
			})
		}

		show();

		$(document).on('submit', 'form#tambah', function(e) {
			e.preventDefault();
			$.post(base_url + '/api/soal/add', $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					$('form#tambah [name]').val('');
					$('div#tambah').modal('hide');
					notif(res.message, 'success');
					show();
				}
			})
		});

		$(document).on('click', 'button.btn-ubah', function() {
			$('form#ubah .id').val($(this).data('id'));
			$('form#ubah [name=teks]').val($(this).data('teks'));
			$('form#ubah [name=urutan]').val($(this).data('urutan'));
		});

		$(document).on('submit', 'form#ubah', function(e) {
			e.preventDefault();
			const id = $('form#ubah .id').val()
			$.post(base_url + '/api/soal/edit/' + id, $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					$('form#ubah [name]').val('');
					$('div#ubah').modal('hide');
					show();
				}
			})
		});

		$(document).on('click', 'button.btn-hapus', function() {
			$('form#hapus .id').val($(this).data('id'));
			$('form#hapus .teks').html($(this).data('teks'));
		});

		$(document).on('submit', 'form#hapus', function(e) {
			e.preventDefault();
			const id = $('form#hapus .id').val()
			$.get(base_url + '/api/soal/remove/' + id).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					$('div#hapus').modal('hide');
					show();
				}
			})
		});

		$(document).on('change', '[name=pilih-excel]', function() {
			read('[name=pilih-excel]', function(data) {
				$('[name=excel]').val(data);
			})
		});

		$(document).on('submit', 'form#import', function(event) {
			event.preventDefault();
			$.post(base_url + '/api/soal/import', $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					$('form#import [name]').val('');
					$('div#import').modal('hide');
					show();
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>