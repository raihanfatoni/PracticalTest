<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSupplier extends Model
{
	protected $table                = 'supplier';
	protected $primaryKey           = 'id_supllier';
	protected $allowedFields        = [
		'id_supllier', 'nama_perusahaan'
	];
	public function cariData($cari){
		return $this->table('supplier')
		->like('id_supllier', $cari)
		->orLike('nama_perusahaan', $cari);
	}
}
