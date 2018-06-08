<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreFaqRequest;
use App\Http\Requests\Backend\UpdateFaqRequest;
use DB;
use App\Faq;
use Carbon\Carbon;

class FaqController extends Controller
{

	public function index()
	{
	   $faqs = Faq::paginate(15);
	   return view('backend.faq.index', compact('faqs'));
	}

	public function store(StoreCityRequest $request)
	{
		$validated = $request->validated();

		DB::table('faqs')->insert(
			['title' => $request->title,
			 'content' => $request->content,
			 'isPublic' => $request->isPublic
			]
		);

		return redirect()->route('backendFaq.index')->with('success', 'FAQ wurde erfolgreich angelegt');
	}

	public function show($id)
	{
		$faq = Faq::findOrFail($id);

		return view('backend.faq.show', compact('faq'));
	}

	public function edit($id)
	{
		$faq = Faq::findOrFail($id);

		return view('backend.faq.edit', compact('faq'));
	}

	public function update(UpdateFaqRequest $request, $id)
	{
		$validated = $request->validated();

		$faq = Faq::findOrFail($id);
		$faq->update($request->all());

		return redirect()->route('backendFaq.index')->with('success', 'FAQ wurde erfolgreich geändert');
	}

	public function destroy($id)
	{
		$faq = Faq::findOrFail($id);
		$faq->delete();

		return redirect()->route('backendFaq.index');
	}
}