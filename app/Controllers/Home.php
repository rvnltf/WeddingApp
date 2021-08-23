<?php

namespace App\Controllers;

use App\Models\UcapanModel;

class Home extends BaseController
{	
	public function index()
	{
		$ucapan = $this->ucapanModel->findAll();
		$data = [
			'ucapan' => $ucapan,
			'validation' => \Config\Services::validation(),
		];
		return view('invitation/index', $data);
	}
	public function kirimUcapan()
	{
		if(!$this->validate([
				'nama' => [
					'rules' => 'required|max_length[50]',
					'errors' => [
						'required' => '{field} harus diisi!',
						'max_length' => '{field} dan do\'a harus diisi!'
					],
				],
				'ucapan' => [
					'rules' => 'required',
					'errors' => '{field} harus diisi!',
				]
			])){
			$validation = \Config\Services::validation();
			return redirect()->to('/#guest')->withInput()->with('validation', $validation);
		}

		$this->ucapanModel->save([
			'nama' => $this->request->getVar('nama'),
			'ucapan' => $this->request->getVar('ucapan'),
		]);

		return redirect()->to('/#guest');
	}
}