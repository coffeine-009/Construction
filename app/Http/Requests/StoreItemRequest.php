<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreItemRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth:: check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attachments'   => 'required|array:image',
            'category'      => 'required|exists:categories,id',
            'title'         => 'required|unique:items,title|max:255',
            'description'   => 'required|min:8'
        ];
    }

}
