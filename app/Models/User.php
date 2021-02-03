<?php

namespace App\Models;

use App\Traits\Follow;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Follow;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'description',
        'email',
        'avatar',
        'banner',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getBannerAttribute($value)
    {
        $path = $value ?? "website/default-banner.jpg";
        return asset("storage/" . $path);
    }

    public function getAvatarAttribute($value)
    {
        $path = $value ?? "website/default-avatar.png";
        return asset("storage/". $path);
    }

    public function timeline()
    {
        $ids = $this->follows()->pluck("id");

        $ids->push($this->id);

        return Tweet::whereIn("user_id", $ids)
            ->withLikes()
            ->latest()
            ->paginate(10);
    }

    public function explore()
    {
        $ids = $this->follows()->pluck("id");

        $ids->push($this->id);

        return User::whereNotIn("id", $ids)
            ->latest()
            ->paginate(10);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
}
