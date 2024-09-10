<?php
declare(strict_types=1);

namespace App\Admin\Resources\NewsResource\Pages;

use App\Admin\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

final class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
