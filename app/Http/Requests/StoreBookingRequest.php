<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'house_id' => 'required|exists:houses,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'check_in' => 'required|date_format:y-m-d|after_or_equal_today',
            'check_out' => 'required|date_format:y-m-d|after:check_in',
            'note' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'check_in.after_or_equal' => 'The Check in must be today or feture day',
            'check_out.after_or_equal' => ' The Check ou must be After the Check in Date or Same Date' 
        ];
    }

    public function bookingData(): array
    {
        $validated = $this->validated();
        $validated['check_in_date'] = Carbon::parse($validated['check_in']);
        $validated['check_out_date'] = Carbon::parse($validated['check_out']);
        return $validated;
    }
}
