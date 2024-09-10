<?php
declare(strict_types=1);

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerServiceProvider extends ServiceProvider
{
    public function register():void
    {
        $this->app->bind(SerializerInterface::class, function() {
            $phpDocExtractor = new PhpDocExtractor();

            return new Serializer([
                new DateTimeNormalizer([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s']),
                new ObjectNormalizer(nameConverter: new CamelCaseToSnakeCaseNameConverter(),
                    propertyTypeExtractor: new PropertyInfoExtractor(
                        typeExtractors: [
                            new ConstructorExtractor([$phpDocExtractor]),
                            $phpDocExtractor,
                        ]
                    )),
                new ArrayDenormalizer(),
            ], [new JsonEncoder()]);
        });
    }
}
