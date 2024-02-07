<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDistributor;
use App\Models\ModelCountry;

class Distributor extends BaseController
{
	public function __construct(){
		$this->distributor = new ModelDistributor();
	}
	public function index()
	{
		$tombolcari = $this->request->getPost('tombolcari');
		if(isset($tombolcari)){
			$cari = $this->request->getPost('cari');
			session()->set('cari_distributor', $cari);
			redirect()->to('/distributor/index');
		} else{
			$cari = session()->get('cari_distributor');
		}
		$dataDistributor = $cari ? $this->distributor->cariData($cari)->paginate(5, 'distributor') : $this->distributor->paginate(5, 'distributor');
		$data = [
			'tampildata'=> $dataDistributor,
			'pager'=> $this->distributor->pager
		];
		return view('distributor/viewdistributor',$data);
	}

	public function formtambah()
	{
		$modelCountry = new ModelCountry();
		$country = $modelCountry->findAll();

		$kodeCountry = [];
		foreach($country as $index=>$value){
			$kodeCountry[$value['nama']] = $value['nama']; 
		}
		return view('distributor/formtambah',[
			'kodeCountry'=>$kodeCountry
		]);
	}
	public function simpandata()
	{
		$nama = $this->request->getPost('nama');
		$city = $this->request->getPost('city');
		$region = $this->request->getPost('region');
		$country = $this->request->getPost('country');
		$phone = $this->request->getPost('phone');
		$email = $this->request->getPost('email');
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'nama' =>[
				'rules'=>'required',
				'label'=>'Nama Distributor',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'city' =>[
				'rules'=>'required',
				'label'=>'Nama Distributor',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'country' =>[
				'rules'=>'required',
				'label'=>'Country',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'phone' =>[
				'rules'=>'required',
				'label'=>'Phone',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'email' =>[
				'rules'=>'required',
				'label'=>'Email',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			]
		]);

		if(!$valid){
			$pesan = [
				'errorNamaDistributor'=>'<br><div class ="alert alert-danger">'. $validation->getError(). '</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/distributor/formtambah');
		} else{
			$this->distributor->insert([
				'nama'=> $nama,
				'city'=> $city,
				'region'=> $region,
				'country'=> $country,
				'phone'=> $phone,
				'email'=> $email,
			]);
			$pesan = [
				'sukses'=>'<div class ="alert alert-success">Data Distributor Berhasil Ditambahkan</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/distributor/index');
		}
	}
	public function formedit($id){
		$modelDistributor = new ModelDistributor();
		$modelCountry = new ModelCountry();
		$country = $modelCountry->findAll();

		$kodeCountry = [];
		foreach($country as $index=>$value){
			$kodeCountry[$value['nama']] = $value['nama']; 
		}
		$rowData = $modelDistributor->find($id);
		if($rowData){
			$data = [
				'id' => $id,
				'nama'=> $rowData['nama'],
				'city'=> $rowData['city'],
				'region'=> $rowData['region'],
				'country'=> $rowData['country'],
				'phone'=> $rowData['phone'],
				'email'=> $rowData['email'],
				'kodeCountry'=> $kodeCountry
			];
			return view('distributor/formedit', $data);
		}else{
			exit('Data Tidak Ditemukan');
		}
	}
	public function updatedata(){
		$iddistributor = $this->request->getPost('iddistributor');
		$nama = $this->request->getPost('nama');
		$city = $this->request->getPost('city');
		$region = $this->request->getPost('region');
		$country = $this->request->getPost('country');
		$phone = $this->request->getPost('phone');
		$email = $this->request->getPost('email');
		$validation = \Config\Services::validation();

		$valid = $this->validate([
			'nama' =>[
				'rules'=>'required',
				'label'=>'Nama Distributor',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'city' =>[
				'rules'=>'required',
				'label'=>'Nama Distributor',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'country' =>[
				'rules'=>'required',
				'label'=>'Country',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'phone' =>[
				'rules'=>'required',
				'label'=>'Phone',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'email' =>[
				'rules'=>'required',
				'label'=>'Email',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			]
		]);

		if(!$valid){
			$pesan = [
				'errorNamaDistributor'=>'<br><div class ="alert alert-danger">'. $validation->getError(). '</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/distributor/formedit/'. $iddistributor);
		} else{
			$this->distributor->update($iddistributor,[
				'nama'=> $nama,
				'city'=> $city,
				'region'=> $region,
				'country'=> $country,
				'phone'=> $phone,
				'email'=> $email,
			]);
			$pesan = [
				'sukses'=>'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
				Data Distributor Berhasil Di Update.
			  </div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/distributor/index');
		}
	}
	public function hapus($id){
		$rowData = $this->distributor->find($id);
		if($rowData){
			$this->distributor->delete($id);
			$pesan = [
				'sukses'=>'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
				Data Distributor Berhasil Dihapus.
			  </div>'
			];

			session()->setFlashdata($pesan);
			return redirect()->to('/distributor/index');
		}else{
			exit('Data Tidak Ditemukan');
		}
	}
}
