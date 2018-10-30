<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurant extends FormRequest
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
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'minimum_order' => 'integer',
            'contact_number' => 'required',
            'status' => 'in:verfied,pending,shut',
            'open' => 'boolean',
            'openingTimes.monday.open' => 'required_unless:openingTimes.monday.closed,on',
            'openingTimes.monday.close' => 'required_unless:openingTimes.monday.closed,on',
            'openingTimes.monday.closed' => 'required_without:openingTimes.monday.open,openingTimes.monday.close',
            'openingTimes.tuesday.open' => 'required_unless:openingTimes.tuesday.closed,on',
            'openingTimes.tuesday.close' => 'required_unless:openingTimes.tuesday.closed,on',
            'openingTimes.tuesday.closed' => 'required_without:openingTimes.tuesday.open,openingTimes.tuesday.close',
            'openingTimes.wednesday.open' => 'required_unless:openingTimes.wednesday.closed,on',
            'openingTimes.wednesday.close' => 'required_unless:openingTimes.wednesday.closed,on',
            'openingTimes.wednesday.closed' => 'required_without:openingTimes.wednesday.open,openingTimes.wednesday.close',
            'openingTimes.thursday.open' => 'required_unless:openingTimes.thursday.closed,on',
            'openingTimes.thursday.close' => 'required_unless:openingTimes.thursday.closed,on',
            'openingTimes.thursday.closed' => 'required_without:openingTimes.thursday.open,openingTimes.thursday.close',
            'openingTimes.friday.open' => 'required_unless:openingTimes.friday.closed,on',
            'openingTimes.friday.close' => 'required_unless:openingTimes.friday.closed,on',
            'openingTimes.friday.closed' => 'required_without:openingTimes.friday.open,openingTimes.friday.close',
            'openingTimes.saturday.open' => 'required_unless:openingTimes.saturday.closed,on',
            'openingTimes.saturday.close' => 'required_unless:openingTimes.saturday.closed,on',
            'openingTimes.saturday.closed' => 'required_without:openingTimes.saturday.open,openingTimes.saturday.close',
            'openingTimes.sunday.open' => 'required_unless:openingTimes.sunday.closed,on',
            'openingTimes.sunday.close' => 'required_unless:openingTimes.sunday.closed,on',
            'openingTimes.sunday.closed' => 'required_without:openingTimes.saturday.open,openingTimes.saturday.close',
        ];
    }
}
