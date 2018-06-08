<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;

class FaqController extends Controller
{

	public function show()
	{
	  $faqs = Faq::all();
	  
	  return view('frontend.page.faq', compact('faqs', 'title', 'content'));
	}
}