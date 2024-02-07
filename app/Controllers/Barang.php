<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelKategori;
use App\Models\ModelSupplier;


class Barang extends BaseController
{
	public function index()
	{
		$modelBarang = new ModelBarang();
		$tombolcari = $this->request->getPost('tombolcari');
		if(isset($tombolcari)){
			$cari = $this->request->getPost('cari');
			session()->set('cari_barang', $cari);
			redirect()->to('/barang/index');
		} else{
			$cari = session()->get('cari_barang');
		}
		$dataBarang = $cari ? $modelBarang->cariData($cari)->paginate(5, 'barang') : $modelBarang->tampildata()->paginate(5,'barang');
		$data = [
			'tampildata'=> $dataBarang,
			'pager' => $modelBarang->pager
		];
		return view('barang/viewbarang',$data);
	}

	public function formtambah()
	{
		function console_log($output, $with_script_tags = true) {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
        ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }
		$modelSupplier = new ModelSupplier();
		$supplier = $modelSupplier->findAll();
	
		$modelKategori = new ModelKategori();
		$kategori = $modelKategori->findAll();

		$kodeSupplier = [];
		foreach($supplier as $index=>$value){
			$kodeSupplier[$value['id_supllier']] = $value['nama_perusahaan']; 
			console_log($kodeSupplier);
		}
		$namaKategori = [];
		foreach($kategori as $index=>$value){
			$namaKategori[$value['id_kategori']] = $value['nama_kategori'];
			console_log($namaKategori);
		}
		return view('barang/formtambah',[
			'kodeSupplier'=>$kodeSupplier,
			'namaKategori'=>$namaKategori,
		]);
	}
	public function simpandata()
	{
		function console_log($output, $with_script_tags = true) {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
        ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }

		$id_barang = $this->request->getPost('id_barang');
		$id_kategori = $this->request->getPost('kategori_id');
		$id_supplier = $this->request->getPost('supplier_id');
		console_log($id_supplier);
		console_log($id_kategori);
		$nama_barang = $this->request->getPost('nama_barang');
		$hargabeli = $this->request->getPost('hargabeli');
		$hargajual = $this->request->getPost('hargajual');
		$modelBarang = new ModelBarang();
		$validation = \Config\Services::validation();
		$valid = $this->validate([
			'id_barang' =>[
				'rules'=>'required|is_unique[barang.id_barang]',
				'label'=>'ID Barang',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong',
					'is_unique'=> '{field} Sudah Ada...'
				]
			],
			'kategori_id' =>[
				'rules'=>'required',
				'label'=>'Kategori ID',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'supplier_id' =>[
				'rules'=>'required',
				'label'=>'Supplier ID',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'nama_barang' =>[
				'rules'=>'required',
				'label'=>'Nama Barang',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'hargabeli' =>[
				'rules'=>'required',
				'label'=>'Harga Beli',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'hargajual' =>[
				'rules'=>'required',
				'label'=>'Harga Jual',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			]
			
		]);

		if(!$valid){
			$errors = $validation->getErrors();
			foreach ($errors as $key => $value) {
				$pesan[] = '<br><div class ="alert alert-danger">'. $value . '</div>';
			}
			session()->setFlashdata(['errorNamaBarang' => implode('', $pesan)]);
			return redirect()->to('/barang/formtambah');
		} else{
			$modelBarang->insert([
				'id_barang'=> $id_barang,
				'supplier_id'=> $id_supplier,
				'kategori_id'=> $id_kategori,
				'nama_barang'=> $nama_barang,
				'hargajual'=> $hargajual,
				'hargabeli'=> $hargabeli
			]);
			$pesan = [
				'sukses'=>'<div class ="alert alert-success">Data Barang Berhasil Ditambahkan</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/barang/index');
		}
	}

	public function formedit($id){
		$modelBarang = new ModelBarang();
		$modelSupplier = new ModelSupplier();
		$supplier = $modelSupplier->findAll();
	
		$modelKategori = new ModelKategori();
		$kategori = $modelKategori->findAll();

		$kodeSupplier = [];
		foreach($supplier as $index=>$value){
			$kodeSupplier[$value['id_supllier']] = $value['nama_perusahaan']; 

		}
		$namaKategori = [];
		foreach($kategori as $index=>$value){
			$namaKategori[$value['id_kategori']] = $value['nama_kategori'];

		}
		$rowData = $modelBarang->find($id);
		if($rowData){
			$data = [
				'id' => $id,
				'kategori_id'=> $rowData['kategori_id'],
				'supplier_id'=> $rowData['supplier_id'],
				'nama_barang'=> $rowData['nama_barang'],
				'hargabeli'=> $rowData['hargabeli'],
				'hargajual'=> $rowData['hargajual'],
				'namaKategori'=> $namaKategori,
				'kodeSupplier'=> $kodeSupplier
			];
			return view('barang/formedit', $data);
		}else{
			exit('Data Tidak Ditemukan');
		}
	}

	public function updatedata(){
		$id_barang = $this->request->getPost('idbarang');
		$id_kategori = $this->request->getPost('kategori_id');
		$id_supplier = $this->request->getPost('supplier_id');
		$nama_barang = $this->request->getPost('nama_barang');
		$hargabeli = $this->request->getPost('hargabeli');
		$hargajual = $this->request->getPost('hargajual');
		$modelBarang = new ModelBarang();
		$validation = \Config\Services::validation();
		$valid = $this->validate([
			'nama_barang' =>[
				'rules'=>'required',
				'label'=>'Nama Barang',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'kategori_id' =>[
				'rules'=>'required',
				'label'=>'Kategori ID',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'supplier_id' =>[
				'rules'=>'required',
				'label'=>'Satuan ID',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'hargabeli' =>[
				'rules'=>'required',
				'label'=>'Harga Beli',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			],
			'hargajual' =>[
				'rules'=>'required',
				'label'=>'Harga Jual',
				'errors'=> [
					'required'=> '{field} Tidak Boleh Kosong' 
				]
			]
		]);

		if(!$valid){
			$errors = $validation->getErrors();
			foreach ($errors as $key => $value) {
				$pesan[] = '<br><div class ="alert alert-danger">'. $value . '</div>';
			}
			session()->setFlashdata(['errorNamaBarang' => implode('', $pesan)]);
			return redirect()->to('/barang/formedit/'.$id_barang);
		} else{
			$modelBarang->update($id_barang,[
				'supplier_id'=> $id_supplier,
				'kategori_id'=> $id_kategori,
				'nama_barang'=> $nama_barang,
				'hargajual'=> $hargajual,
				'hargabeli'=> $hargabeli
			]);
			$pesan = [
				'sukses'=>'<div class ="alert alert-success">Data Barang Berhasil Ditambahkan</div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/barang/index');
		}
	}
	public function hapus($id){
		$modelBarang = new ModelBarang();
		$rowData = $modelBarang->find($id);
		if($rowData){
			$modelBarang->delete($id);
			$pesan = [
				'sukses'=>'<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i> Berhasil!</h5>
				Data Barang Berhasil Dihapus.
			  </div>'
			];
			session()->setFlashdata($pesan);
			return redirect()->to('/barang/index');
		}else{
			exit('Data Tidak Ditemukan');
		}
	}
}
