<?php

namespace App\Http\Requests\Admin\Booking;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreBooking extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.booking.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'trip_id' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'seat_id' => ['required', 'string'],
            'start_id' => ['required', 'string'],
            'destination_id' => ['required', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
