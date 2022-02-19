<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Data') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Tambah Kuisioner
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<button class="ml-2 btn btn-success" type="button" data-toggle="modal" data-target="#submit">
				<i class="fa fa-paper-plane"></i>
				Submit
			</button>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="card mb-4">
			<div class="card-header">
				<div class="card-title">Identitas Responden</div>
			</div>
			<div class="card-body">
				<div class="row">
					<input type="hidden" class="responden_id">
					<div class="col-md-6">
						<form id="cari">
						<div class="form-group" style="position: relative;">
							<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" autocomplete="off">
							<button type="submit" hidden="true"></button>
							<style>
								.autocomplete {
									position: absolute;
									top: 100%;
									width: 100%;
									background: white;
									box-shadow: 0px 0px 3px gray;
									border-radius: 5px;
									list-style: none;
									padding: 0;
								}
								.autocomplete>.autocomplete-item {
									padding: 7px;
									margin: 0px;
									transition: .1s;
								}
								.autocomplete>.autocomplete-item:hover {
									background: dodgerblue;
									color: white;
								}
							</style>
							<ul class="autocomplete" id="auto-name" style="display: none;">
								<li class="autocomplete-item">Muhammad</li>
								<li class="autocomplete-item">Izza</li>
								<li class="autocomplete-item">Alfiansyah</li>
							</ul>
						</div>
						</form>
						<div class="form-group">
							<input type="text" class="form-control" disabled="true" placeholder="Usia" name="usia">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" disabled="true" placeholder="Jenis Kelamin" name="jenis_kelamin">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" disabled="true" placeholder="Pendidikan Terakhir" name="pendidikan_terakhir">
						</div>
						<div class="form-group">
							<textarea name="alamat" rows="5" class="form-control" disabled="true" placeholder="Alamat" style="resize: none;"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" disabled="true" placeholder="Tanggal Lahir" name="tanggal_lahir">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" disabled="true" placeholder="Status Pendidikan" name="status_pendidikan">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" disabled="true" placeholder="Status Pernikahan" name="status_pernikahan">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" disabled="true" placeholder="Nomor Telepon" name="nomor_telepon">
						</div>
						<div class="form-group text-center">
							<img src="<?= base_url('/cdn/img/responden/default.png') ?>" style="height: 105px;" class="foto">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="soal">
			
		</div>
	</div>
</div>
<div class="modal fade" id="submit">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="submit">
				<div class="modal-header">
					<div class="modal-title">Submit</div>
				</div>
				<div class="modal-body">
					<p>Anda yakin mengumpulkan soal ?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-success">Kumpulkan</button>
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
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="1" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															2
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="2" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															3
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="3" data-soal_id="` + obj.id + `">
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
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="4" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															5
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="5" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															6
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="6" data-soal_id="` + obj.id + `">
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
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="7" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															8
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="8" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															9
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="9" data-soal_id="` + obj.id + `">
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
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="10" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															11
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="11" data-soal_id="` + obj.id + `">
														</div>
														<div class="col">
															12
															<br>
															<input type="radio" class="jawaban" name="jawaban-` + obj.id + `" value="12" data-soal_id="` + obj.id + `">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
			})
		}

		show();

		$(document).on('submit', 'form#submit', function(e) {
			e.preventDefault()
			jawaban = [];
			$('input.jawaban').each(function() {
				if ($(this).prop('checked')) {
					jawaban.push({
						si: $(this).data('soal_id'),
						j: $(this).val()
					})
				}
			});
			const responden_id = $('.responden_id').val();
			$.post(base_url + '/api/jawaban/submit/' + responden_id, {
				jawaban: jawaban
			}).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success').then(() => {
						window.location = base_url + '/admin/form-kuisioner/data/' + responden_id;
					});
					$('div#submit').modal('hide');
					show();
				}
			})
		});

		$(document).on('keyup', 'form#cari [name=nama]', function(e) {
			e.preventDefault();
			const value = $(this).val()
			$.post(base_url + '/api/responden', {
				search: {
					value: (value ? value : '1234567890qwertyuiopasdfghjklzxcvbnm')
				},
				length: 5,
				start: 0
			}).done(res => {
				$('#auto-name').hide();
				if (res.data.length) {
					$('#auto-name').show();
					responden = '';
					res.data.forEach(obj => {
						responden = '<li class="autocomplete-item" data-value="' + obj.nama.toUpperCase() + '">' + obj.nama.toUpperCase().replace(value.toUpperCase(), '<b>' + value.toUpperCase() + '</b>') + '</li>';
					})
					$('#auto-name').html(responden);
					document.querySelector('form#cari [type=submit]').click();
				}
			})
		});

		$(document).on('click', '#auto-name li', function() {
			$('form#cari [name=nama]').val($(this).data('value'));
			document.querySelector('form#cari [type=submit]').click();
			$('#auto-name').hide();
		});

		$(document).on('submit', 'form#cari', function(e) {
			e.preventDefault();
			$.post(base_url + '/api/responden/get', $(this).serialize()).done(res => {
				if (res.data && $('form#cari [name=nama]').val()) {
					$('.responden_id').val(res.data.id);
					$('[name=usia]').val(res.data.usia);
					$('[name=jenis_kelamin]').val(res.data.jenis_kelamin == '1' ? "Laki-laki" : "Perempuan");
					$('[name=pendidikan_terakhir]').val(res.data.pendidikan_terakhir);
					$('[name=alamat]').val(res.data.alamat);
					$('[name=tanggal_lahir]').val(res.data.tanggal_lahir);
					$('[name=status_pendidikan]').val(res.data.status_pendidikan);
					$('[name=status_pernikahan]').val(res.data.status_pernikahan ? "Belum menikah" : "Sudah menikah");
					$('[name=nomor_telepon]').val(res.data.nomor_telepon);
					$('.foto').attr('src', base_url + '/cdn/img/responden/' + (res.data.foto ? res.data.foto : 'default.png'));
				} else {
					$('.responden_id').val("");
					$('[name=usia]').val("");
					$('[name=jenis_kelamin]').val("");
					$('[name=pendidikan_terakhir]').val("");
					$('[name=alamat]').val("");
					$('[name=tanggal_lahir]').val("");
					$('[name=status_pendidikan]').val("");
					$('[name=status_pernikahan]').val("");
					$('[name=nomor_telepon]').val("");
					$('.foto').attr('src', base_url + '/cdn/img/responden/default.png');
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>