<?php
declare(strict_types=1);

namespace App\Modules\News\Http\Requests;

use App\Modules\News\DTO\NewsInputDTO;
use Illuminate\Foundation\Http\FormRequest;

final class CreateRequest extends FormRequest
{
    protected string $type = NewsInputDTO::class;

    public function rules(): array
    {
        return [
            'title' => 'requred|string|min:3',
            'content' => 'nullable|string|min:3'
        ];
    }
}
