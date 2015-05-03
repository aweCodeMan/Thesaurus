<?php namespace Betoo\Thesaurus\Http\Controllers;

use Betoo\Thesaurus\Http\Requests;
use Betoo\Thesaurus\Http\Controllers\Controller;

use Betoo\Thesaurus\Word;
use Illuminate\Http\Request;

class ThesaurusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        if($request->ajax() && $request->get('query'))
        {
            return response()->json(Word::where('word', 'LIKE', '%' . $request->get('query') . '%')->orderBy('word', 'asc')->take(25)->get());
        }

		return view('thesaurus.home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $word
	 * @return Response
	 */
	public function show($word, Request $request)
	{
        $words = Word::whereWord($word)->get();

        if($request)

        return $words;
		//
	}

}
