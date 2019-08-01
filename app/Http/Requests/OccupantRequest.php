<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupantRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // General Information
            'age' => 'nullable|integer|max:99',
            'race' => 'required|string',
            'gender' => 'required|string',
            'phone_number' => 'nullable|string|max:10',
            'nicknames' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'clean_date' => 'required|date',
            'last_address' => 'nullable|string|max:255',
            // Medical Information
            'drugs_of_choice' => 'required|string|max:255',
            'list_of_medications' => 'nullable|string|max:255',
            'health_issues' => 'nullable|string|max:255',
            // Emergency Information
            'emergency_name' => 'required|string|max:255',
            'emergency_phone' => 'required|string|max:255',
            'emergency_address' => 'nullable|string|max:255',
            // Probation Information
            'probation_officer_name' => 'nullable|string|max:255',
            'probation_officer_phone' => 'nullable|string|max:255',
            'probation_reason' => 'nullable|string|max:255',
            'probation_court_date' => 'nullable|string|max:255',
            // Important Dates
            'move_in_date' => 'required|date',
            'move_out_date' => 'nullable|date',
        ];
    }
}
