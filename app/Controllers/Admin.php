<?php

namespace App\Controllers;

use App\Models\GalleryModel;
use App\Models\WeddingGiftModel;

class Admin extends BaseController
{
	protected $galleryModel;
	public function __construct()
	{
		$this->galleryModel = new GalleryModel();
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
		$data = [
			'title' => 'Data Undangan',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/data_undangan', $data);
	}
	
	public function gallery($id = 0)
	{
		$data = [
			'title' => 'Gallery',
			'gallery' => $this->galleryModel->getGallery(),
			'gallery_id' => $id?$this->galleryModel->getGallery($id):'',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/gallery', $data);
	}

	public function simpanGallery($id = 0)
	{
		if(!$this->validate([
				'jenis' => [
					'rules' => 'required|max_length[50]',
					'errors' => [
						'required' => '{field} harus diisi!',
						'max_length' => '{field} lebih dari 50 karakter!'
					],
				],
				'foto' => [
					'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
					'errors' => [
						'uploaded' => 'pilih {field} dipilih dulu!',
						'max_size' => 'ukuran {field} terlalu besar!',
						'is_image' => 'file yang dipilih bukan {field}!',
						'mime_in' => 'file yang dipilih bukan {field}!',
					],
				]
			])){
			return redirect()->to('/admin/gallery')->withInput();
		}

		$foto = $this->request->getFile('foto');
		if($this->request->getVar('foto') == 'gallery'){
			$foto->move('img/gallery');
		}
		$foto->move('img/bg');

		$this->galleryModel->save([
			'id' => $id,
			'id_data' => 1,
			'jenis' => $this->request->getVar('jenis'),
			'foto' => $foto->getName(),
		]);

		$teks = $id?'diperbaharui':'ditambahkan';
		session()->setFlashdata('pesan', 'Data berhasil <strong>'.$teks.'</strong>!');
		return redirect()->to('/admin/gallery');
	}
	
	public function deleteGallery($id)
	{
		$this->galleryModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil <strong>dihapus</strong>!');
		return redirect()->to('/admin/gallery');
	}	
	public function ucapan($id = 0)
	{
		$data = [
			'title' => 'Wedding Gift',
			'ucapan' => $this->ucapanModel->getUcapan(),
			'ucapan_id' => $id?$this->ucapanModel->getUcapan($id):'',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/ucapan', $data);
	}

	public function simpanUcapan($id = 0)
	{
		if(!$this->validate([
				'jenis' => [
					'rules' => 'required|max_length[50]',
					'errors' => [
						'required' => '{field} harus diisi!',
						'max_length' => '{field} lebih dari 50 karakter!'
					],
				],
				'ucapan' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi!',
					],
				]
			])){
			return redirect()->to('/admin/ucapan')->withInput();
		}

		$this->ucapanModel->save([
			'id' => $id,
			// 'id_data' => 1,
			'jenis' => $this->request->getVar('jenis'),
			'ucapan' => $this->request->getVar('ucapan'),
		]);

		$teks = $id?'diperbaharui':'ditambahkan';
		session()->setFlashdata('pesan', 'Data berhasil <strong>'.$teks.'</strong>!');
		return redirect()->to('/admin/ucapan');
	}
	
	public function deleteUcapan($id)
	{
		$this->ucapanModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil <strong>dihapus</strong>!');
		return redirect()->to('/admin/ucapan');
	}
	
	public function wedding_gift($id = 0)
	{
		$data = [
			'title' => 'Wedding Gift',
			'wedding_gift' => $this->weddingGiftModel->getWeddingGift(),
			'wedding_gift_id' => $id?$this->weddingGiftModel->getWeddingGift($id):'',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/wedding_gift', $data);
	}

	public function simpanWeddingGift($id = 0)
	{
		if(!$this->validate([
				'jenis' => [
					'rules' => 'required|max_length[50]',
					'errors' => [
						'required' => '{field} harus diisi!',
						'max_length' => '{field} lebih dari 50 karakter!'
					],
				],
				'rincian' => [
					'rules' => 'required',
					'errors' => [
						'required' => '{field} harus diisi!',
					],
				]
			])){
			return redirect()->to('/admin/wedding_gift')->withInput();
		}

		$this->weddingGiftModel->save([
			'id' => $id,
			'id_data' => 1,
			'jenis' => $this->request->getVar('jenis'),
			'rincian' => $this->request->getVar('rincian'),
		]);

		$teks = $id?'diperbaharui':'ditambahkan';
		session()->setFlashdata('pesan', 'Data berhasil <strong>'.$teks.'</strong>!');
		return redirect()->to('/admin/wedding_gift');
	}
	
	public function deleteWeddingGift($id)
	{
		$this->weddingGiftModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil <strong>dihapus</strong>!');
		return redirect()->to('/admin/wedding_gift');
	}

	public function tambahDataUndangan(){
		$data = [
			'title' => 'Tambah Data Undangan',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/tambahDataUndangan', $data);
		
	}
	public function simpanDataUndangan()
	{
		if(!$this->validate([
				'nickname_p' => [
					'rules' => 'required|max_length[50]',
					'errors' => [
						'required' => 'nickname harus diisi!',
						'max_length' => 'nickname lebih dari 50 karakter!'
					],
				],
				'nickname_w' => [
					'rules' => 'required|max_length[50]',
					'errors' => [
						'required' => 'nickname harus diisi!',
						'max_length' => 'nickname lebih dari 50 karakter!'
					],
				],
				'fullname_p' => [
					'rules' => 'required|max_length[100]',
					'errors' => [
						'required' => 'fullname pria harus diisi!',
						'max_length' => 'fullname pria lebih dari 100 karakter!'
					],
				],
				'fullname_w' => [
					'rules' => 'required|max_length[100]',
					'errors' => [
						'required' => 'fullname wanita harus diisi!',
						'max_length' => 'fullname wanita lebih dari 100 karakter!'
					],
				],
				'tanggal_akad' => [
					'rules' => 'required|valid_date[d/m/Y]',
					'errors' => [
						'required' => 'tanggal akad harus diisi!',
						'valid_date' => 'tanggal akad tidak valid!'
					],
				],
				'tanggal_resepsi' => [
					'rules' => 'required|valid_date[d/m/Y]',
					'errors' => [
						'required' => 'tanggal resepsi harus diisi!',
						'valid_date' => 'tanggal resepsi tidak valid!'
					],
				],
				'awal_akad' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'waktu akad harus diisi!'
					],
				],
				'akhir_akad' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'waktu akad harus diisi!'
					],
				],
				'awal_resepsi' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'waktu resepsi harus diisi!'
					],
				],
				'akhir_resepsi' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'waktu resepsi harus diisi!'
					],
				],
				'alamat_akad' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'alamat akad harus diisi!'
					],
				],
				'alamat_resepsi' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'alamat resepsi harus diisi!'
					],
				],
				'foto_pria' => [
					'rules' => 'uploaded[sampul]|max_size[foto_pria,1024]|is_image[foto_pria]|mime_in[foto_pria,image/jpg,image/jpeg,image/png]',
					'errors' => [
						'uploaded' => 'Pilih gambar terlebih dahulu!',
						'max_size' => 'Ukuran gambar terlalu besar!',
						'is_image' => 'File bukan foto!',
						'mime_in' => 'File bukan foto!',
					],
				],
			])){
			return redirect()->to('/admin/tambahDataUndangan')->withInput();
		}


		$this->DataUndanganModel->save([
			'nick_pria' => $this->request->getVar('nickname_p'),
			'nick_wanita' => $this->request->getVar('nickname_w'),
			'fullname_pria' => $this->request->getVar('fullname_p'),
			'fullname_wanita' => $this->request->getVar('fullname_w'),
			'tanggal_akad' => $this->request->getVar('tanggal_akad'),
			'tanggal_resepsi' => $this->request->getVar('tanggal_resepsi'),
			'akad_awal' => $this->request->getVar('akad_awal'),
			'resepsi_awal' => $this->request->getVar('resepsi_awal'),
			'resepsi_akhir' => $this->request->getVar('resepsi_akhir'),
			'alamat_akad' => $this->request->getVar('alamat_akad'),
			'link_akad' => $this->request->getVar('link_akad'),
			'alamat_resepsi' => $this->request->getVar('alamat_resepsi'),
			'link_resepsi' => $this->request->getVar('link_resepsi'),
			'foto_pria' => $this->request->getVar('foto_pria'),
			'foto_wanita' => $this->request->getVar('foto_wanita'),
			'musik' => $this->request->getVar('musik'),
			'kalimat' => $this->request->getVar('kalimat'),
			'is_actived' => 1,
		]);
		
		
		return redirect()->to('/admin/tambahDataUndangan');
	}
}