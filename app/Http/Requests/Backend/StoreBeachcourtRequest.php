<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeachcourtRequest extends FormRequest
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
            'postalCode' => 'required',
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'isChargeable' => 'boolean',
            'isPublic' => 'boolean',
            'isMembership' => 'boolean',
            'isSingleAccess' => 'boolean',
            'isswimmingLake' => 'boolean',
            'user_id' => 'numeric',
        ];
    }
}
