<?php

namespace App\Http\Requests\API;

use App\Models\device_data_categories;
use InfyOm\Generator\Request\APIRequest;

class Updatedevice_data_categoriesAPIRequest extends APIRequest
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
        $rules = device_data_categories::$rules;
        
        return $rules;
    }
}
