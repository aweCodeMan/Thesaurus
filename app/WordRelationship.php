<?php namespace Betoo\Thesaurus;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WordRelationship extends Model
{
    protected $table   = 'word_relationships';

    protected $append = ['timeDifference', 'type'];

    protected $hidden = ['id', 'wordId', 'linkedWordId', 'deleted_at'];

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

    public function getRelationshipTypeAttribute()
    {
        switch($this->attributes['relationship_type'])
        {
            case Word::TYPE_SYNONYM:
                return 'synonym';

            case Word::TYPE_ANTONYM:
                return 'antonym';
        }

        return null;
    }
}
