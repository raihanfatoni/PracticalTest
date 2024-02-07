<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBean;

class Bean extends BaseController
{
	public function index()
	{
		$modelBean = new ModelBean();
		$tombolcari = $this->request->getPost('tombolcari');
		if(isset($tombolcari)){
			$cari = $this->request->getPost('cari');
			session()->set('cari_bean', $cari);
			redirect()->to('/bean/index');
		} else{
			$cari = session()->get('cari_bean');
		}
		$dataBean = $cari ? $modelBean->cariData($cari)->paginate(5, 'bean') : $modelBean->paginate(5, 'bean');
		$data = [
			'tampildata'=> $dataBean,
			'pager'=> $modelBean->pager
		];
		return view('bean/viewbean',$data);
	}
}
