<?php
declare(strict_types=1);

namespace App\Modules\News\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property User $author
 */
final class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
