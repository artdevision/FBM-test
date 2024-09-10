<?php
declare(strict_types=1);

namespace App\Modules\News\Observers;

use App\Modules\News\Models\News;
use Illuminate\Support\Facades\Auth;

final class NewsObserver
{
    public function creating(News $model): News
    {
        if (Auth::hasUser()) {
            $model->author_id = (int) Auth::user()->id;
        }
        return $model;
    }
}
