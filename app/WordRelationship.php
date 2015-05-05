<?php namespace Betoo\Thesaurus;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WordRelationship extends Model
{
    protected $table   = 'word_relationships';

    protected $append = ['timeDifference'];

    public function getTimeDifferenceAttribute()
    {
        Carbon::setLocale('sl');
        return  Carbon::parse($this->getAttribute('updated_at'))->diffForHumans(Carbon::now());
    }

    public function word()
    {
        return $this->hasOne('Betoo\Thesaurus\Word', 'id', 'wordId');
    }

    public function linkedWord()
    {
        return $this->hasOne('Betoo\Thesaurus\Word', 'id', 'linkedWordId');

    }
}
