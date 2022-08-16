<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Events\MyEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $first_names
 * @property string $last_names
 * @property string $full_name
 * @property Carbon $birthdate
 * @property string $email
 * @property string $password
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_names',
        'last_names',
        'birthdate',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthdate' => 'date:Y-m-d',
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

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn(string|null $name, array $data) => $data['first_names'] . ' ' . $data['last_names']
        );
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_friends', 'friend_id');
    }
}
