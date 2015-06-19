<?php namespace Betoo\Thesaurus\Http\Requests;

use Betoo\Thesaurus\Http\Requests\Request;

class APIStoreRelationshipRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'wordId'       => 'required|exists:words,id|different:linkedWordId',
            'linkedWordId' => 'required|exists:words,id',
            'type'         => 'required|between: 1,2'
        ];
    }

    //  Hardcore that it always returns JSON
    public function wantsJson()
    {
        return true;
    }

}
