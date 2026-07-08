<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class WeatherRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'city' => 'required|string|max:255|',
            'temperature' => 'required|decimal:1|max:200',
            'condition' => 'required|string|max:60',
            'chanceToRain' => 'required|integer|min:0|max:100',
            'humidity' => 'required|integer|min:0|max:100',
            'windSpeed' => 'required|integer|min:1|max:500',
        ];
    }
}
