<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
	protected $table                = 'kategori';
	protected $primaryKey           = 'id_kategori';
	protected $allowedFields        = [
		'id_kategori', 'nama_kategori'
	];
	public function cariData($cari){
		return $this->table('kategori')
		->like('id_kategori', $cari)
		->orLike('nama_kategori', $cari);
	}
}

