<?php namespace Betoo\Thesaurus\Http\Controllers;

use Betoo\Thesaurus\Http\Requests;
use Betoo\Thesaurus\Http\Controllers\Controller;

use Betoo\Thesaurus\Http\Requests\DeleteRelationshipRequest;
use Betoo\Thesaurus\Http\Requests\StoreRelationshipRequest;
use Betoo\Thesaurus\Word;
use Betoo\Thesaurus\WordRelationship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThesaurusController extends Controller
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
        if ($request->ajax() && $request->get('query'))
        {
            return response()->json(Word::where('word', 'LIKE', $request->get('query') . '%')
                                        ->orderBy('word', 'asc')
                                        ->take(25)
                                        ->get());
        }

        $data = array();
        $data['synonymCount'] = DB::table('word_relationships')
                                  ->where('relationship_type', '=', WORD::TYPE_SYNONYM)
                                  ->where('deleted_at', '=', null)
                                  ->count() / 2;

        $data['antonymCount'] = DB::table('word_relationships')
                                  ->where('relationship_type', '=', WORD::TYPE_ANTONYM)
                                  ->where('deleted_at', '=', null)
                                  ->count() / 2;

        $data['lastSynonyms'] = WordRelationship::where('relationship_type', '=', Word::TYPE_SYNONYM)
                                                ->where('deleted_at', '=', null)
                                                ->orderBy('updated_at', 'desc')
                                                ->with('word')
                                                ->with('linkedWord')
                                                ->take(20)
                                                ->get();

        $data['lastAntonyms'] = WordRelationship::where('relationship_type', '=', Word::TYPE_ANTONYM)
                                                ->where('deleted_at', '=', null)
                                                ->orderBy('updated_at', 'desc')
                                                ->with('word')
                                                ->with('linkedWord')
                                                ->take(20)
                                                ->get();

        return view('thesaurus.home')->with('data', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $word
     *
     * @return Response
     */
    public function show($word)
    {
        $words = Word::whereWord($word)->get();

        return view('thesaurus.show')->with('words', $words)->with('query', $word);
    }

    /**
     * Store relationship between words.
     *
     * @param StoreRelationshipRequest $request
     *
     * @return Response
     * @internal param int $word
     *
     */
    public function storeRelationship(StoreRelationshipRequest $request)
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
     * @param DeleteRelationshipRequest $request
     *
     * @return Response
     * @internal param int $word
     *
     */
    public function deleteRelationship(DeleteRelationshipRequest $request)
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
     * Show FAQ page.
     *
     * @return Response     *
     */
    public function faq()
    {
        return view('thesaurus.faq');
    }

    /**
     * Show all synonyms.
     *
     * @return Response     *
     */
    public function synonyms()
    {
        $synonyms = WordRelationship::where('relationship_type', '=', Word::TYPE_SYNONYM)
                                    ->where('deleted_at', '=', null)
                                    ->orderBy('wordId', 'asc')
                                    ->with('word')
                                    ->with('linkedWord')
                                    ->paginate(60);

        return view('thesaurus.synonyms')->with('synonyms', $synonyms);
    }

    /**
     * Show all antonyms.
     *
     * @return Response     *
     */
    public function antonyms()
    {
        $antonyms = WordRelationship::where('relationship_type', '=', Word::TYPE_ANTONYM)
                                    ->where('deleted_at', '=', null)
                                    ->orderBy('wordId', 'asc')
                                    ->with('word')
                                    ->with('linkedWord')
                                    ->paginate(60);

        return view('thesaurus.antonyms')->with('antonyms', $antonyms);
    }
    private function hasStoredRelationship($wordId, $linkedWordId, $type)
    {
        return DB::table('word_relationships')
                 ->where(function ($query) use ($wordId, $linkedWordId)
                 {
                     $query->where('wordId', '=', $wordId)
                           ->where('linkedWordId', '=', $linkedWordId);
                 })
                 ->orWhere(function ($query) use ($wordId, $linkedWordId)
                 {
                     $query->where('wordId', '=', $linkedWordId)
                           ->where('linkedWordId', '=', $wordId);
                 })
                 ->where('relationship_type', '=', $type)
                 ->count() > 0;
    }

    private function storeRelationshipInDatabase($wordId, $linkedWordId, $type)
    {
        return Db::table('word_relationships')->insert(array(
            array('wordId' => $wordId, 'linkedWordId' => $linkedWordId, 'relationship_type' => $type, 'created_at' => Carbon::now()
                                                                                                                            ->toDateTimeString(), 'updated_at' => Carbon::now()
                                                                                                                                                                        ->toDateTimeString()),
            array('wordId' => $linkedWordId, 'linkedWordId' => $wordId, 'relationship_type' => $type, 'created_at' => Carbon::now()
                                                                                                                            ->toDateTimeString(), 'updated_at' => Carbon::now()
                                                                                                                                                                        ->toDateTimeString()),
        ));
    }

    private function deleteRelationshipInDatabase($wordId, $linkedWordId, $type)
    {
        $first = DB::table('word_relationships')
                   ->where('wordId', '=', $wordId)
                   ->where('linkedWordId', '=', $linkedWordId)
                   ->where('relationship_type', '=', $type)
                   ->update(['deleted_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()
                                                                                                      ->toDateTimeString()]);

        $second = DB::table('word_relationships')
                    ->where('wordId', '=', $linkedWordId)
                    ->where('linkedWordId', '=', $wordId)
                    ->where('relationship_type', '=', $type)
                    ->update(['deleted_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()
                                                                                                       ->toDateTimeString()]);

        return ($first && $second) == true;
    }

    private function updateRelationshipInDatabase($wordId, $linkedWordId, $type)
    {
        $first = DB::table('word_relationships')
                   ->where('wordId', '=', $wordId)
                   ->where('linkedWordId', '=', $linkedWordId)
                   ->where('relationship_type', '=', $type)
                   ->update(['deleted_at' => null, 'updated_at' => Carbon::now()->toDateTimeString()]);

        $second = DB::table('word_relationships')
                    ->where('wordId', '=', $linkedWordId)
                    ->where('linkedWordId', '=', $wordId)
                    ->where('relationship_type', '=', $type)
                    ->update(['deleted_at' => null, 'updated_at' => Carbon::now()->toDateTimeString()]);

        return ($first && $second) == true;
    }

}
