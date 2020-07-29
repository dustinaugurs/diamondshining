<?php

namespace App\Http\Requests\Backend\DiamondFeeds;

use Illuminate\Foundation\Http\FormRequest;

class CreateDiamondFeedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-diamondfeed');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'feed_file'       => 'image|dimensions:min_width=226,min_height=48',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'feed_file.dimensions'     => 'Invalid logo - should be minimum 226*48',
        ];
    }
}
