<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'Form Kuisioner') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Form Kuisioner
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<button class="btn btn-default" type="button" data-toggle="modal" data-target="#info">
				<i class="fa fa-question"></i>
			</button>
			<button class="ml-2 btn btn-success" type="button" data-toggle="modal" data-target="#submit">
				<i class="fa fa-paper-plane"></i>
				Submit
			</button>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="row" id="soal">
			
		</div>
	</div>
</div>
<div class="modal fade" id="info">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title">Keterangan</div>
			</div>
			<div class="modal-body">
				<big>
					<ul>
						<li><strong>STS</strong>: Sangat Tidak Setuju</li>
						<li><strong>TS</strong>: Tidak Setuju</li>
						<li><strong>S</strong>: Setuju</li>
						<li><strong>SS</strong>: Sangat Setuju</li>
					</ul>
				</big>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" type="button" data-dismiss="modal">Oke</button>
			</div>
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
<div class="modal fade" id="warning">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title">Penting!</div>
			</div>
			<div class="modal-body">
				<p>
					Berikan centang pada pernyataan berikut ini <i class="fa fa check"></i> <br>
					Saya telah membaca dan memahami maksud dan tujuan pengisian kuesioner ini, serta sewaktu-waktu dapat mengundurkan diri dari keikutsertaan dalam pengisian kuesioner ini. Oleh karena itu, saya dengan sukarela setuju dan tanpa paksaan bersedia untuk menjadi responden dan ikut berpartisipasi dalam pengisian kuesioner ini yang di lakukan oleh peneliti/ surveyor bernama Imadul Auwalin.
				</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-info" type="button" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	$(document).ready(function() {

		$('#warning').modal('show');
		
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

				urutan = ''
				for (var i = 1; i <= res.data.length; i++) {
					urutan += '<option value="' + i + '">' + i + '</option>';
				}
				$('[name=urutan]').html(urutan);
				setTimeout(function() {
					showJawaban()
				}, 1000);
			})
		}

		show();

		showJawaban = () => {
			$.get(base_url + '/api/jawaban/show/<?= Session()->get('id') ?>').done(res => {
				$('input.jawaban').prop('checked', false);
				if (!res.error) {
					res.data.jawaban.forEach(obj => {
						$('[name=jawaban-' + obj.si + ']').each(function() {
							if ($(this).val() == obj.j) {
								$(this).prop('checked', true);
							}
						})
					});
				}
			})
		}

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
			$.post(base_url + '/api/jawaban/submit/<?= Session()->get('id') ?>', {
				jawaban: jawaban
			}).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					$('div#submit').modal('hide');
					show();
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>