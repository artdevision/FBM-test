<?php
declare(strict_types=1);

namespace App\Traits;

use App\DTO\DTOInterface;
use App\Facades\Serializer;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;

trait ConvertableToDTO
{
    public function toDTO(): null|array|DTOInterface
    {
        $contextBuilder = (new ObjectNormalizerContextBuilder())
            ->withSkipNullValues(true);

        return Serializer::denormalize(
            $this->validated(),
            $this->type,
            null,
            $contextBuilder->toArray()
        );
    }
}
