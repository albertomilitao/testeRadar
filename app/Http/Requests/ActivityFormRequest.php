<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityFormRequest extends FormRequest
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
        if ($this->status == 4) {
            return [
                'name'        => 'required|min:3|max:255',
                'description' => 'required|min:3|max:600',
                'start_date'  => 'required|date',
                'end_date'    => 'required|date',
                'status'      => 'required|numeric|min:1|max:10',
                'situation'   => 'required|numeric|min:0|max:10',
            ];
        } else {
            return [
                'name'        => 'required|min:3|max:255',
                'description' => 'required|min:3|max:600',
                'start_date'  => 'required|date',
                'status'      => 'required|numeric|min:1|max:10',
                'situation'   => 'required|numeric|min:0|max:10',
            ];
        }
    }
}
