<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PagesController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('frontend.page.show', compact('page'));
    }
}
