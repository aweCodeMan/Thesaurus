<?php namespace Betoo\Thesaurus;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    const TYPE_SYNONYM = 1;
    const TYPE_ANTONYM = 2;

    protected $table   = 'words';
    protected $appends = array('link');
    protected $hidden = array('hidden_at', 'pivot');

    public function getLinkAttribute()
    {
        return route('show', array('word' => $this->getAttribute('word')));
    }

    public function synonyms()
    {
        return $this->belongsToMany('Betoo\Thesaurus\Word', 'word_relationships', 'wordId', 'linkedWordId')
                    ->wherePivot('relationship_type', '=', $this::TYPE_SYNONYM)
                    ->whereNull('deleted_at');
    }

    public function antonyms()
    {
        return $this->belongsToMany('Betoo\Thesaurus\Word', 'word_relationships', 'wordId', 'linkedWordId')
                    ->wherePivot('relationship_type', '=', $this::TYPE_ANTONYM)
                    ->whereNull('deleted_at');
    }
}
