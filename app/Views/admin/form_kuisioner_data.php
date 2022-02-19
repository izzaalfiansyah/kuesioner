<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Data') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Data Kuisioner
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<a class="btn btn-success" href="<?= base_url('/admin/form-kuisioner/data/create') ?>">
				<i class="fa fa-plus"></i>
				Tambah
			</a>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="table-responsive">
			<table class="table table-hover" id="jawaban">
				<thead>
					<tr>
						<th>No</th>
						<th>Responden</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<link rel="stylesheet" href="<?= base_url('/cdn/vendors/custom/datatables/datatables.bundle.css') ?>">
<script src="<?= base_url('/cdn/vendors/custom/datatables/datatables.bundle.js') ?>"></script>
<script>
	$(document).ready(function() {
		
		show = () => {
			$('#jawaban').DataTable().destroy();
			$('#jawaban').DataTable({
				"deferRender": true,
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": base_url + "/api/jawaban",
					"method": "POST",
					"dataSrc": "data"
				},
				"columns": [
					{
						data: null,
						render: (data, type, row, meta) => {
							return meta.row + meta.settings._iDisplayStart + 1;
						}
					},
					{
						data: null,
						render: (data) => {
							return '<a href="' + base_url + '/admin/form-data/biodata-responden/' + data.responden_nama.replace(/ /gi, '-').toLowerCase() + '/' + data.responden_id + '" class="m-link">' + data.responden_nama + '</a>';
						}
					},
					{
						data: "created_at"
					},
					{
						data: null,
						render: (data) => {
							return `
							<div class="text center">
								<a href="` + base_url + `/admin/form-kuisioner/data/` + data.responden_id + `" class="btn btn-info btn-sm">
									<i class="fa fa-search"></i>
								</a>
								<button class="btn btn-sm btn-danger btn-hapus" type="button" data-toggle="modal" data-target="#hapus">
									<i class="fa fa-trash"></i>
								</button>
							</div>
							`;
						}
					}
				],
				"language": {
					"zeroRecords": "data kuisioner tidak tersedia"
				}
			});
		}

		show();

	})
</script>
<?= $this->endSection() ?>