<?php

namespace App\Controllers;

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
						'max_length' => '{field} lebih dari 50 karakter!'
					],
				],
				'ucapan' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} dan do\'a harus diisi!',
					],
				]
			])){
			return redirect()->to('/#guest')->withInput();
		}

		$this->ucapanModel->save([
			'nama' => $this->request->getVar('nama'),
			'ucapan' => $this->request->getVar('ucapan'),
		]);

		return redirect()->to('/#guest');
	}
}