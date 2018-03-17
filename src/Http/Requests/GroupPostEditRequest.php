<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */

namespace ToxicLemurs\MenuBuilder\Http\Requests;

use Illuminate\Http\Request;

/**
 * Class GroupPostEditRequest
 * @package ToxicLemurs\MenuBuilder\Http\Requests
 */
class GroupPostEditRequest extends Request
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
            'name' => 'required'
        ];
    }
}
