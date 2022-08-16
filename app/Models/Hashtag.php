<?php

namespace App\Models;

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

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
