<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required','string','max:255'],
            'middle_name' => ['required','string','max:255'],
            'last_name' => ['string','max:255'],
            'age' => ['required'],
            'gender_id' => ['required'],
            'phone' => ['required','string','max:255'],
            'email' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            'city_id' => ['required','integer'],
            'experience' => ['string'],
            'skills' => ['required','string'],
        ];
    }
}
