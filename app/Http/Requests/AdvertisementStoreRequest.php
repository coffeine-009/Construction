<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

/**
 * Class AdvertisementStoreRequest
 * @package App\Http\Requests
 */
class AdvertisementStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth :: check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attachment'    => 'required|image',
            'message'       => 'required|max:255'
        ];
    }
}
