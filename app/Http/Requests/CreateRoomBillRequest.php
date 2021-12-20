<?php

namespace App\Http\Requests;

use App\Rules\StrLengthRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoomBillRequest extends FormRequest
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
            'client_name' => [
                'required',
                'alpha',
                new StrLengthRule()
            ],
            'date_start' => 'required|date_format:"d-m-Y"|after_or_equal:today',
            'date_finish' => 'required|date_format:"d-m-Y"|after_or_equal:date_start',
            'CMND' => 'digits:12',
            'phone' => 'digits:10',
            'email' => 'required|email',
        ];
    }
}
