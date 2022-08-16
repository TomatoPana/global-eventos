<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $person_id
 * @property int $post_id
 * @property string $comment
 * @property int $likes
 */
class PostComment extends Pivot
{
    protected $fillable = [
        'person_id',
        'post_id',
        'comment',
        'likes',
    ];
}
