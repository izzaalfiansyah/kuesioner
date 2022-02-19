<?php
namespace App\Controllers\Admin;

class FormKuisioner extends \App\Controllers\BaseController {

	public function soal()
	{
		return view('admin/form_kuisioner_soal');
	}

	public function data($id = null)
	{
		if ($id) {
			return view('admin/form_kuisioner_data_detail', ['data_id' => $id]);
		}
		return view('admin/form_kuisioner_data');
	}

	public function dataCreate()
	{
		return view('admin/form_kuisioner_data_create');
	}

	public function export($id, $type = 'pdf')
	{
		if (empty($id) || empty($type)) {
			return redirect()->to(base_url('/'));
		}

		$client = \Config\Services::curlRequest();

		$jawaban = $client->get(base_url('/api/jawaban/show/' . $id));
		$jawaban = json_decode($jawaban->getBody(), true);

		$soal = $client->get(base_url('/api/soal'));
		$soal = json_decode($soal->getBody(), true);

		$responden = $client->get(base_url('/api/responden/details/' . $id));
		$responden = json_decode($responden->getBody(), true);
		
		if ($jawaban['error']) {
			return redirect()->to(base_url('/'));
		}

		echo view('admin/kuisioner_detail.php', ['soal' => $soal['data'], 'jawaban' => $jawaban['data'], 'responden' => $responden['data']]);

		if ($type == 'pdf') {
			echo '
			<script>
				window.print();
				setTimeout(() => {
					window.close()
				}, 500);
			</script>
			';
		}

		if ($type == 'excel') {
			header('Content-Type: application/vnd-ms-excel');
			header('Content-Disposition: attachment; filename=kuisioner detail.xls');
		}

		if ($type == 'word') {
			header('Content-Type: application/vnd.msword');
			header('Content-Disposition: attachment; filename=kuisioner detail.doc');
		}

		return "";
	}

}

/* End of file FormKuisioner.php */
/* Location: .//D/laragon/www/2020/kuisioner/app/Controllers/admin/FormKuisioner.php */