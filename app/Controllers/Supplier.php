<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSupplier;

class Supplier extends BaseController
{
	public function __construct(){
		$this->supplier = new ModelSupplier();
	}
	public function index()
	{
		$tombolcari = $this->request->getPost('tombolcari');
		if(isset($tombolcari)){
			$cari = $this->request->getPost('cari');
			session()->set('cari_supplier', $cari);
			redirect()->to('/supplier/index');
		} else{
			$cari = session()->get('cari_supplier');
		}
		$dataSupplier = $cari ? $this->supplier->cariData($cari)->paginate(5, 'supplier') : $this->supplier->paginate(5, 'supplier');
		$data = [
			'tampildata'=> $dataSupplier,
			'pager'=> $this->supplier->pager
		];
		return view('supplier/viewsupplier',$data);
	}

	public function formtambah()
	{
		return view('supplier/formtambah');
	}
	public function simpandata()
	{
		$namaperusahaan = $this->request->getPost('nama_perusahaan');
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'nama_perusahaan' =>[
				'rules'=>'required',
				'label'=>'Nama Perusahaan',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			]
		]);
		if(!$valid){
			$pesan = [
				'errorNamaPerusahaan'=>'<br><div class ="alert alert-danger">'. $validation->getError(). '</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/supplier/formtambah');
		} else{
			$this->supplier->insert([
				'nama_perusahaan'=> $namaperusahaan
			]);
			$pesan = [
				'sukses'=>'<div class ="alert alert-success">Data Supplier Berhasil Ditambahkan</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/supplier/index');
		}
	}
	public function formedit($id){
		$rowData = $this->supplier->find($id);
		if($rowData){
			$data = [
				'id' => $id,
				'nama'=> $rowData['nama_perusahaan']
			];
			return view('supplier/formedit', $data);
		}else{
			exit('Data Tidak Ditemukan');
		}
	}
	public function updatedata(){
		$idsupplier = $this->request->getPost('idsupplier');
		$namakategori = $this->request->getPost('nama_perusahaan');
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'nama_perusahaan' =>[
				'rules'=>'required',
				'label'=>'Nama Kategori',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			]
		]);

		if(!$valid){
			$pesan = [
				'errorNamaKategori'=>'<br><div class ="alert alert-danger">'. $validation->getError(). '</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/supplier/formedit/'. $idsupplier);
		} else{
			$this->supplier->update($idsupplier,[
				'nama_perusahaan'=> $namakategori
			]);
			$pesan = [
				'sukses'=>'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
				Data Kategori Berhasil Di Update.
			  </div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/supplier/index');
		}
	}
	public function hapus($id){
		$rowData = $this->supplier->find($id);
		if($rowData){
			$this->supplier->delete($id);
			$pesan = [
				'sukses'=>'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
				Data Kategori Berhasil Dihapus.
			  </div>'
			];

			session()->setFlashdata($pesan);
			return redirect()->to('/supplier/index');
		}else{
			exit('Data Tidak Ditemukan');
		}
	}
}
