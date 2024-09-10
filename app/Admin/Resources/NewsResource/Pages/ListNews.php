<?php
declare(strict_types=1);

namespace App\Admin\Resources\NewsResource\Pages;

use App\Admin\Resources\NewsResource;
use App\Modules\News\Models\News;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

final class ListNews extends ListRecords
{
    protected static string $resource = NewsResource::class;

    protected function getTableQuery(): ?Builder
    {
        return News::query()->orderBy('created_at', 'desc');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
