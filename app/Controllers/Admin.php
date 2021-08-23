<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];
		return view('admin/pages/index', $data);
	}
	public function data_undangan()
	{
		return view('admin/pages/data_undangan');
	}
}