<?php
declare(strict_types=1);

namespace App\Modules\News\Repositories;

use App\Modules\News\DTO\NewsInputDTO;
use App\Modules\News\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class NewsRepository
{
    public function __construct(
        protected News $model
    ) {

    }

    public function get(): LengthAwarePaginator
    {
        return $this->model::query()
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    public function create(NewsInputDTO $inputDTO): News
    {
        $model =$this->model->fill([
            'title' => $inputDTO->title,
            'content' => $inputDTO->content
        ]);
        $model->save();
        $model->refresh();
        return $model;
    }

    public function update(int $id, NewsInputDTO $inputDTO): News
    {
        /** @var News $model */
        $model = $this->model::query()->findOrFail($id);
        $model->update([
            'title' => $inputDTO->title,
            'content' => $inputDTO->content
        ]);
        $model->refresh();
        return $model;
    }
}
