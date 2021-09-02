<?php

namespace App\Controllers;

class Home extends BaseController
{	
	
	public function index()
	{
		$dataUndangan = $this->dataUndanganModel->getDataAktif();
		if($dataUndangan){
			$ucapan = $this->ucapanModel->findAll();
			$weddingGift = $this->weddingGiftModel->getWeddingGift();
			$orangtua = $this->orangtuaModel->getOrangtua();
			$background = $this->backgroundModel->getBackground();
			$gallery = $this->galleryModel->getGallery();
			$timeline = $this->timelineModel->getTimeline();
			$data = [
				'ucapan' => $ucapan,
				'gallery' => $gallery,
				'timeline' => $timeline,
				'background' => $background,
				'orangtua' => $orangtua,
				'wedding_gift' => $weddingGift,
				'data_undangan' => $dataUndangan,
				'validation' => \Config\Services::validation(),
			];
			return view('invitation/index', $data);
		} else {
			return view('404');
		}
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