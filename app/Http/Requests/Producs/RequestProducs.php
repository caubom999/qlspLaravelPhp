<?php

namespace App\Http\Requests\Producs;

use Illuminate\Foundation\Http\FormRequest;

class RequestProducs extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
               'name'=>'required',
//                 'price'=>'required',
//              'price_sale'=>'required',
//                 'description'=>'required',
//              'content'=>'required',
              'thumb'=>'required'

        ];
    }
    public function  messages()
    {
        return [
            'name.required'=>'vui long nhap ten sp',
//            'price.required'=>'vui long nhap gia',
//            'price_sale.required'=>'vui long nhap gia giam',
//            'description.required'=>'vui long nhap mota',
//            'content.required'=>'vui long nhap mota chi tiet',
            'thumb.required'=> 'anh dai dien no dc trong'
        ];
    }
}
