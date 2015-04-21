<?php namespace App\Http\Requests;
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

use Illuminate\Support\Facades\Auth;

/**
 * Class StoreCategoryRequest
 * Validation request for create(store) a new Category.
 *
 * @package App\Http\Requests
 */
class StoreCategoryRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //- Check permissions -//
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //- Set validators -//
        return [
            'title'         => 'required|unique:categories,title|max:255',
            'description'   => 'required|min:8'
        ];
    }

}
