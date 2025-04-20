<?php

namespace App\Http\Requests;

use App\Helpers\Dto\Request\CursorDto;
use Illuminate\Foundation\Http\FormRequest;

final class CursorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => ['string', 'nullable', 'required_with:date'],
            'date' => ['date_format:Y-m-d H:i:s', 'nullable', 'required_with:key'],
        ];
    }

    public function toDto(): CursorDto
    {
        return new CursorDto(
            key: $this->query('key'),
            date: $this->query('date'),
        );
    }
}
