<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{

	public function index()
	{
	    $pages = Page::where('slug', $slug)->first();
	    
	    $pages->count = $pages->count();

	    return view('backend.pages.index', ['page' => $pages]);
	}

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('backend.pages.show', compact('page'));
    }
}