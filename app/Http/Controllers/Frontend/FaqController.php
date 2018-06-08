<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;

class FaqController extends Controller
{

	public function show()
	{
	  $faq = Faq::all();
	  $title = ($faq->title);
	  $content = ($faq->content);
	  
	  return view('frontend.page.faq', compact('faq', 'title', 'content'));
	}
}