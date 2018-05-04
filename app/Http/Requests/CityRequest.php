<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
      'name' => 'required',
      'sid' => 'required', 
      'cid' => 'required'
     

    ];
  }
  public function messages()
  {
    return [
      'name.required' => 'City Name is required',
      'sid.required' => 'State Name is required',
      'cid.required' => 'Country Name is required'
      
     ];
  }
}
