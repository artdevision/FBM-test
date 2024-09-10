<?php
declare(strict_types=1);

namespace App\Modules\News\DTO;

use App\DTO\DTOInterface;

class NewsInputDTO implements DTOInterface
{
    public function __construct(
        public string $title,
        public ?string $content,
    )
    {
    }
}
