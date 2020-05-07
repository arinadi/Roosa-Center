<?php

namespace App\Http\Requests\API;

use App\Models\bot_users_pair_devices;
use InfyOm\Generator\Request\APIRequest;

class Updatebot_users_pair_devicesAPIRequest extends APIRequest
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
        $rules = bot_users_pair_devices::$rules;
        
        return $rules;
    }
}
