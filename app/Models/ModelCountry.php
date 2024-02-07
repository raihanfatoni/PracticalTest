<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCountry extends Model
{
	protected $table                = 'country';
	protected $primaryKey           = 'id_country';
	protected $allowedFields        = [
		'id_country','nama'
	];
}
