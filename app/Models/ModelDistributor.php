<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDistributor extends Model
{
	protected $table                = 'distributor';
	protected $primaryKey           = 'id_distributor';
	protected $allowedFields        = [
		'id_distributor', 'nama', 'city','region','country','country','phone','email'
	];
	public function cariData($cari){
		return $this->table('distributor')
		->like('id_distributor', $cari)
		->orLike('nama', $cari)
		->orLike('city', $cari)
		->orLike('region', $cari)
		->orLike('country', $cari);
	}
}
