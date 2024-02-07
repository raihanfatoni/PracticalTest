<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
	protected $table                = 'barang';
	protected $primaryKey           = 'id_barang';
	protected $allowedFields        = [
		'id_barang', 'supplier_id', 'kategori_id', 'nama_barang', 'hargabeli','hargajual'
	];

	public function tampilData(){
		return $this->table('barang')->join('supplier', 'id_supllier = supplier_id')->join('kategori', 'id_kategori = kategori_id');
	}
}
