<?php

namespace ToxicLemurs\MenuBuilder\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class MenuItemRequest
 * @package App\Http\Requests
 */
class MenuItemRequest extends Request
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
            'group_id' => 'required',
            'order' => 'numeric|required',
            'title' => 'required',
            'path' => 'required',
            'active' => 'required'
        ];
    }
}
