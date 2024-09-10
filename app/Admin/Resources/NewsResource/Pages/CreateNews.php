<?php
declare(strict_types=1);

namespace App\Admin\Resources\NewsResource\Pages;

use App\Admin\Resources\NewsResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;
}
