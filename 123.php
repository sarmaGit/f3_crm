<?php

namespace TraX\Http\Requests\Form\Create\User\Worker;

use \Request;

class Bonus extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ([
            'amount'      => 'required|numeric|min:0',
            'description' => 'required'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function sanitize()
    {
        return ($this->onlySanitize(['amount', 'description'], ['added_user_id' => helper()->user->id]));
    }
}