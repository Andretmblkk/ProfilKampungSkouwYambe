<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
	public function index()
	{
		$galleries = Gallery::where('is_active', true)
			->orderBy('created_at', 'desc')
			->paginate(12);

		return view('galeri', compact('galleries'));
	}
}
