<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademyRequest extends FormRequest
{
    public function authorize(): bool { return $this->user()->hasRole('admin'); }

    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('academy', 'name')->ignore($this->academy)
            ],
            'abbreviation' => [
                'required', 'string', 'max:10',
                Rule::unique('academy', 'abbreviation')->ignore($this->academy)
            ],
        ];
    }
}