<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */

namespace ToxicLemurs\MenuBuilder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MenuItemRequest
 * @package App\Http\Requests
 */
class MenuItemRequest extends FormRequest
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
