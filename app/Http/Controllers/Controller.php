<?php namespace Betoo\Thesaurus\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    protected function hasStoredRelationship($wordId, $linkedWordId, $type)
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

    protected function storeRelationshipInDatabase($wordId, $linkedWordId, $type)
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

    protected function deleteRelationshipInDatabase($wordId, $linkedWordId, $type)
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

    protected function updateRelationshipInDatabase($wordId, $linkedWordId, $type)
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
