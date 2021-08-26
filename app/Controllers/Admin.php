<?php

namespace App\Controllers;

use App\Models\DataUndanganModel;

class Admin extends BaseController
{
	protected $dataUndanganModel;
	public function __construct()
	{
		$this->dataUndanganModel = new DataUndanganModel();
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
			'data_undangan' => $this->dataUndanganModel->getdataUndangan(),
		];
		return view('admin/pages/data_undangan', $data);
	}
	
	public function gallery($id = 0)
	{
		$data = [
			'title' => 'Gallery',
			'gallery' => $this->galleryModel->getGallery(),
			'pasangan' => $this->dataUndanganModel->getdataUndangan(),
			'gallery_id' => $id?$this->galleryModel->getGallery($id):'',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/gallery', $data);
	}

	public function simpanGallery($id = 0)
	{
		if(!$this->validate([
				'id_data' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'pasangan harus diisi!'
					],
				],
				'foto' => [
					'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
					'errors' => [
						'max_size' => 'ukuran {field} terlalu besar!',
						'is_image' => 'file yang dipilih bukan {field}!',
						'mime_in' => 'file yang dipilih bukan {field}!',
					],
				]
			])){
				if($id){
					return redirect()->to('/admin/dtgllry/'.$this->request->getVar('id'))->withInput();
				}
				return redirect()->to('/admin/gallery')->withInput();
		}
		$foto = $this->request->getFile('foto');
		$namaFoto = $foto->getRandomName();
		if($foto->getError() == 4){
			$namaFoto = $this->request->getVar('foto-lama');			
		} else {
			if($this->request->getVar('foto-lama')){
				$foto->move('img/gallery', $namaFoto);
				unlink('img/gallery/'.$this->request->getVar('foto-lama'));
			} else {
				$foto->move('img/gallery', $namaFoto);
			}
			
		}
		
		$this->galleryModel->save([
			'id' => $id,
			'id_data' => $this->request->getVar('id_data'),
			'foto' => $namaFoto,
		]);

		$teks = $id?'diperbaharui':'ditambahkan';
		session()->setFlashdata('pesan', 'Data berhasil <strong>'.$teks.'</strong>!');
		return redirect()->to('/admin/gallery');
	}
	
	public function deleteGallery($id)
	{
		$gallery = $this->galleryModel->getGallery($id);
		if($gallery['foto'] != 'default.jpg'){
			if($gallery['jenis'] == 'gallery'){
				unlink('img/gallery/'.$gallery['foto']);
			}
			unlink('img/bg/'.$gallery['foto']);
		}
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
			'pasangan' => $this->dataUndanganModel->getdataUndangan(),
			'wedding_gift_id' => $id?$this->weddingGiftModel->getWeddingGift($id):'',
			'validation' => \Config\Services::validation(),
		];
		return view('admin/pages/wedding_gift', $data);
	}

	public function simpanWeddingGift($id = 0)
	{
		if(!$this->validate([
				'id_data' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'pasangan harus diisi!'
					],
				],
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
			'id_data' => $this->request->getVar('id_data'),
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
					'rules' => 'required|valid_date[m/d/Y]',
					'errors' => [
						'required' => 'tanggal akad harus diisi!',
						'valid_date' => 'tanggal akad tidak valid!'
					],
				],
				'tanggal_resepsi' => [
					'rules' => 'required|valid_date[m/d/Y]',
					'errors' => [
						'required' => 'tanggal resepsi harus diisi!',
						'valid_date' => 'tanggal resepsi tidak valid!'
					],
				],
				'akad_awal' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'waktu akad harus diisi!'
					],
				],
				'akad_akhir' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'waktu akad harus diisi!'
					],
				],
				'resepsi_awal' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'waktu resepsi harus diisi!'
					],
				],
				'resepsi_akhir' => [
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
				// 'file.0' => [
				// 	'rules' => 'uploaded[file.0]|max_size[file.0,2048]|is_image[file.0]|mime_in[file.0,image/jpg,image/jpeg,image/png]',
				// 	'errors' => [
				// 		'uploaded' => 'Pilih foto terlebih dahulu!',
				// 		'max_size' => 'Ukuran foto terlalu besar!',
				// 		'is_image' => 'File bukan foto!',
				// 		'mime_in' => 'File bukan foto!',
				// 	],
				// ],
				// 'file.1' => [
				// 	'rules' => 'uploaded[file.1]|max_size[file.1,2048]|is_image[file.01|mime_in[file.1,image/jpg,image/jpeg,image/png]',
				// 	'errors' => [
				// 		'uploaded' => 'Pilih foto terlebih dahulu!',
				// 		'max_size' => 'Ukuran foto terlalu besar!',
				// 		'is_image' => 'File bukan foto!',
				// 		'mime_in' => 'File bukan foto!',
				// 	],
				// ],
				// 'file.2' => [
				// 	'rules' => 'uploaded[file.2]|max_size[file.2,10240]',
				// 	'errors' => [
				// 		'uploaded' => 'Pilih musik terlebih dahulu!',
				// 		'max_size' => 'Ukuran musik terlalu besar!',
				// 	],
				// ],
				'kalimat' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'kalimat resepsi harus diisi!'
					],
				],
			])){
			return redirect()->to('/admin/tambahDataUndangan')->withInput();
		}


		$foto1 = $this->request->getFile('file.0');
		$foto2 = $this->request->getFile('file.1');
		$musik = $this->request->getFile('file.2');
		$namaFoto1 = $foto1->getRandomName();
		$namaFoto2 = $foto2->getRandomName();
		$namaMusik = $musik->getRandomName();
		$foto1->move('img/foto', $namaFoto1);
		$foto2->move('img/foto', $namaFoto2);
		$musik->move('music', $namaMusik);

		$this->dataUndanganModel->save([
			'nick_pria' => $this->request->getVar('nickname_p'),
			'nick_wanita' => $this->request->getVar('nickname_w'),
			'fullname_pria' => $this->request->getVar('fullname_p'),
			'fullname_wanita' => $this->request->getVar('fullname_w'),
			'tanggal_akad' => date('Y-m-d', strtotime($this->request->getVar('tanggal_akad'))),
			'tanggal_resepsi' => date('Y-m-d',strtotime($this->request->getVar('tanggal_resepsi'))),
			'akad_awal' => $this->request->getVar('akad_awal'),
			'akad_akhir' => $this->request->getVar('akad_akhir'),
			'resepsi_awal' => $this->request->getVar('resepsi_awal'),
			'resepsi_akhir' => $this->request->getVar('resepsi_akhir'),
			'alamat_akad' => $this->request->getVar('alamat_akad'),
			'link_akad' => $this->request->getVar('link_akad'),
			'alamat_resepsi' => $this->request->getVar('alamat_resepsi'),
			'link_resepsi' => $this->request->getVar('link_resepsi'),
			'foto_pria' => $namaFoto1,
			'foto_wanita' => $namaFoto2,
			'musik' => $namaMusik,
			'kalimat' => $this->request->getVar('kalimat'),
			'is_actived' => 1,
		]);
		
		
		return redirect()->to('/admin/data_undangan');
	}
}