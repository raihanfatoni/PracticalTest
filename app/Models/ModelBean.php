<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBean extends Model
{
	protected $table                = 'bean';
	protected $primaryKey           = 'id_bean';
	protected $allowedFields        = [
		'id_bean', 'nama', 'description','price'
	];
	public function cariData($cari){
		return $this->table('bean')
		->like('id_bean', $cari)
		->orLike('nama', $cari);
	}
}
