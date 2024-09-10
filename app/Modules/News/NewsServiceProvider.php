<?php
declare(strict_types=1);

namespace App\Modules\News;

use App\Modules\News\Models\News;
use App\Modules\News\Observers\NewsObserver;
use Illuminate\Support\ServiceProvider;

final class NewsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }

    public function boot(): void
    {
        News::observe(NewsObserver::class);
    }
}
