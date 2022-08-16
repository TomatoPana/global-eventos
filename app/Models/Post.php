<?php

namespace App\Models;

use App\Events\MyEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $title
 * @property string $description
 * @property string $body
 * @property int $likes
 * @property User $author
 * @property Collection<Comment> $comments
 * @property Collection<Hashtag> $hashtags
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'likes',
        'user_id',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($model) {
            broadcast(new MyEvent($model->toJson()));
        });

        static::updated(function ($model) {
            broadcast(new MyEvent($model->toJson()));
        });

        static::deleted(function ($model) {
            broadcast(new MyEvent($model->toJson()));
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(PostComment::class);
    }

    public function hashtags(): BelongsToMany
    {
        return $this->belongsToMany(Hashtag::class, 'post_has_hashtags');
    }
}
