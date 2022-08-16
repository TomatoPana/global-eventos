<?php

namespace App\Models;

use App\Events\MyEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $hashtag
 * @property Collection<Post> $posts
 */
class Hashtag extends Model
{
    use HasFactory;

    protected $fillable = ['hashtag'];

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

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
