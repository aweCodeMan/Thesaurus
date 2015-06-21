<?php namespace Betoo\Thesaurus\Http\Controllers;

use Betoo\Thesaurus\Http\Requests;
use Betoo\Thesaurus\Http\Controllers\Controller;

use Betoo\Thesaurus\Http\Requests\APIDeleteRelationshipRequest;
use Betoo\Thesaurus\Http\Requests\APIStoreRelationshipRequest;
use Betoo\Thesaurus\Http\Requests\DeleteRelationshipRequest;
use Betoo\Thesaurus\Http\Requests\StoreRelationshipRequest;
use Betoo\Thesaurus\Word;
use Betoo\Thesaurus\WordRelationship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->get('query'))
        {
            return response()->json(Word::where('word', 'LIKE', $request->get('query') . '%')
                                        ->orderBy('word', 'asc')
                                        ->with('synonyms', 'antonyms')
                                        ->simplePaginate(50)
                                        ->appends('query', $request->get('query')));
        }

        return response()->json(Word::orderBy('word', 'asc')
                                    ->with('synonyms', 'antonyms')
                                    ->simplePaginate(50));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $word
     *
     * @return mixed
     */
    public function show($word)
    {
        if (is_numeric($word))
        {
            return Word::whereId($word)->with('synonyms', 'antonyms')->get();
        }

        return Word::whereWord($word)->with('synonyms', 'antonyms')->get();
    }

    /**
     * Store relationship between words.
     *
     * @param APIStoreRelationshipRequest $request
     *
     * @return mixed
     * @internal param int $word
     *
     */
    public function storeRelationship(APIStoreRelationshipRequest $request)
    {
        if (!$this->hasStoredRelationship($request->get('wordId'), $request->get('linkedWordId'), $request->get('type')))
        {
            $success = $this->storeRelationshipInDatabase($request->get('wordId'), $request->get('linkedWordId'), $request->get('type'));
        }
        else
        {
            $success = $this->updateRelationshipInDatabase($request->get('wordId'), $request->get('linkedWordId'), $request->get('type'));
        }

        if ($success)
        {
            return response()->json(array('status' => 'success'));
        }

        return response()->json(array('error' => 'Could not save into database'), 500);
    }

    /**
     * Delete relationship between words.
     *
     * @param APIDeleteRelationshipRequest $request
     *
     * @return mixed
     * @internal param int $word
     *
     */
    public function deleteRelationship(APIDeleteRelationshipRequest $request)
    {
        if ($this->hasStoredRelationship($request->get('wordId'), $request->get('linkedWordId'), $request->get('type')))
        {
            $success = $this->deleteRelationshipInDatabase($request->get('wordId'), $request->get('linkedWordId'), $request->get('type'));
        }

        if (!isset($success) || $success)
        {
            return response()->json(array('status' => 'success'));
        }

        return response()->json(array('error' => 'Could not delete from database'), 500);
    }

    /**
     * Show all synonyms.
     *
     * @return mixed
     */
    public function synonyms()
    {
        return WordRelationship::where('relationship_type', '=', Word::TYPE_SYNONYM)
                                    ->where('deleted_at', '=', null)
                                    ->orderBy('wordId', 'asc')
                                    ->with('word')
                                    ->with('linkedWord')
                                    ->paginate(50);
    }

    /**
     * Show all antonyms.
     *
     * @return mixed
     */
    public function antonyms()
    {
        return WordRelationship::where('relationship_type', '=', Word::TYPE_ANTONYM)
                               ->where('deleted_at', '=', null)
                               ->orderBy('wordId', 'asc')
                               ->with('word')
                               ->with('linkedWord')
                               ->paginate(50);
    }

    /**
     *  Return the API documentation.
     *
     * @return \Illuminate\View\View
     */
    public function docs()
    {
        return view('documentation.v1.docs');
    }

    /**
     *  Return stats about the thesaurus.
     *
     * @return \Illuminate\View\View
     */
    public function stats()
    {
        $data = array();
        $data['synonym_count'] = DB::table('word_relationships')
                                  ->where('relationship_type', '=', WORD::TYPE_SYNONYM)
                                  ->where('deleted_at', '=', null)
                                  ->count() / 2;

        $data['antonym_count'] = DB::table('word_relationships')
                                  ->where('relationship_type', '=', WORD::TYPE_ANTONYM)
                                  ->where('deleted_at', '=', null)
                                  ->count() / 2;

        $data['last_synonyms'] = WordRelationship::where('relationship_type', '=', Word::TYPE_SYNONYM)
                                                ->where('deleted_at', '=', null)
                                                ->orderBy('updated_at', 'desc')
                                                ->with('word')
                                                ->with('linkedWord')
                                                ->take(20)
                                                ->get();

        $data['last_antonyms'] = WordRelationship::where('relationship_type', '=', Word::TYPE_ANTONYM)
                                                ->where('deleted_at', '=', null)
                                                ->orderBy('updated_at', 'desc')
                                                ->with('word')
                                                ->with('linkedWord')
                                                ->take(20)
                                                ->get();

        return $data;
    }
}
