<?php

namespace App\Http\Requests;

use App\Models\User;
use RuntimeException;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>>

     */
    public function rules(): array
    {
        if ($this->user() === null) {
            throw new RuntimeException('User Must Be Logged In');
        }

        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
