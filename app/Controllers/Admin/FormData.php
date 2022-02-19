<?php
namespace App\Controllers\Admin;

class FormData extends \App\Controllers\BaseController {

	public function biodataResponden($nama = null, $id = null)
	{
		if ($id) {
			return view('admin/form_data_biodata_responden_detail', ['responden_id' => $id]);
		}
		return view('admin/form_data_biodata_responden');
	}

	public function biodataRespondenCreate()
	{
		return view('admin/form_data_biodata_responden_create');
	}

	public function listUser()
	{
		return view('admin/form_data_list_user');
	}

}

/* End of file FormData.php */
/* Location: .//D/laragon/www/2020/tracer/app/Controllers/admin/FormData.php */