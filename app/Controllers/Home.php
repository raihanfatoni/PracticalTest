<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view ('main/layout');
	}
	public function login()
	{
		return view ('main');
	}
}
