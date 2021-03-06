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
        $description = $this->generateDescription($words, $word);

        return view('thesaurus.show')->with('words', $words)->with('query', $word)->with('description', $description);
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
     * @return Response
     */
    public function faq()
    {
        return view('thesaurus.faq');
    }

    /**
     * Show all synonyms.
     *
     * @return Response
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
     * @return Response
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

    /**
     *  Generate a meta description
     *
     * @param $words
     *
     * @return string
     *
     */
    private function generateDescription($words, $query)
    {
        $count = 0;

        foreach ($words as $word)
        {
            $count += $word->synonyms->count();
        }

        if ($count == 0)
        {
            return 'Beseda ' . $query . ' nima še nobene sopomenke. Pomagajte ostalim s tem, da dodate besedi ' . $query . ' novo sopomenko.';
        }
        else if ($count == 1)
        {
            return 'Beseda ' . $query . ' ima 1 sopomenko. Preverite katera sopomenka obstaja za besedo ' . $query . '.';
        }
        else if ($count == 2)
        {
            return 'Beseda ' . $query . ' ima 2 sopomenki. Preverite kateri sopomenki obstajata za besedo ' . $query . '.';
        }
        else if ($count == 3 || $count == 4)
        {
            return 'Beseda ' . $query . ' ima ' . $count . ' sopomenke. Preverite katere sopomenke obstajajo za besedo ' . $query . '.';
        }

        return 'Beseda ' . $query . ' ima ' . $count . ' sopomenk. Preverite katere sopomenke obstajajo za besedo ' . $query . '.';
    }
}
