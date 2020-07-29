<?php

namespace App\Http\Requests\Backend\DiamondFeeds;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiamondFeedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-diamondfeed');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'feed_file'       => 'required|mimes:csv,txt,xlsx',
        ];
    }

    public function messages()
    {
        return [
            'feed_file.mimes'     => 'Invalid feed file - should be a csv',
        ];
    }
}
