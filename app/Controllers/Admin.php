<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function __contructor()
	{
		$this->adminModel = new \App\Models\AdminModel();
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/index', $data);
	}	
	public function data_undangan()
	{
		return view('admin/pages/data_undangan');
	}
	public function simpanDataUndangan(){
		if(!$this->validate([
			'nickname_p' => [
				'rules' => 'required|max_length[50]',
				'errors' => [
					'required' => '{field} harus diisi!',
					'max_length' => '{field} lebih dari 50 karakter!'
				],
			],
			'nickname_w' => [
				'rules' => 'required|max_length[50]',
				'errors' => [
					'required' => '{field} harus diisi!',
					'max_length' => '{field} lebih dari 50 karakter!'
				],
			]
			])){
				$validation = \Config\Services::validation();
			return redirect()->to('/admin/data_undangan')->withInput()->with('validation', $validation);	
		}

		// $this->ucapanModel->save([
		// 	'nama' => $this->request->getVar('nama'),
		// 	'ucapan' => $this->request->getVar('ucapan'),
		// ]);

		return redirect()->to('/admin/data_undangan');
		
	}
}