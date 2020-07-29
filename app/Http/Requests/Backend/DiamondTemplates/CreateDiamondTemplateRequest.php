<?php

namespace App\Http\Requests\Backend\DiamondTemplates;

use Illuminate\Foundation\Http\FormRequest;

class CreateDiamondTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-diamondtemplate');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'title'          => 'required|max:255',
            // 'multiplier_gbp' => 'required|max:100|regex:"^[0-9]\d*$"',
            // 'multiplier_gbp' => 'required|max:100|regex:"^[0-9]\d*$"',
            // 'vat_from_gbp'   => 'required|max:100|regex:"^[0-9]\d*$"',
            // 'vat_to_gbp'     => 'required|max:100|regex:"^[0-9]\d*$"',
            // 'vat_from_usd'   => 'required|max:100|regex:"^[0-9]\d*$"',
            // 'vat_to_usd'     => 'required|max:100|regex:"^[0-9]\d*$"',
        ];
    }

    public function messages()
    {
        return [
            //The Custom messages would go in here
            //For Example : 'title.required' => 'You need to fill in the title field.'
            //Further, see the documentation : https://laravel.com/docs/6.x/validation#customizing-the-error-messages
        ];
    }
}
