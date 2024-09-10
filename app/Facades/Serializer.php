<?php
declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @method static mixed serialize(mixed $data, string $format, array $context = [])
 * @method static mixed deserialize(mixed $data, string $type, string $format, array $context = [])
 * @method static mixed normalize(mixed $data, ?string $format = null, array $context = [])
 * @method static mixed denormalize(mixed $data, string $type, ?string $format = null, array $context = [])
 */
final class Serializer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SerializerInterface::class;
    }
}
