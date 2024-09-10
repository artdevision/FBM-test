<?php
declare(strict_types=1);

namespace App\Modules\News\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\News\Http\Resources\NewsCollection;
use App\Modules\News\Repositories\NewsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class NewsApiController extends Controller
{
    public function __construct(
        protected NewsRepository $repository
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return (new NewsCollection($this->repository->get()))
            ->toResponse($request);
    }
}
