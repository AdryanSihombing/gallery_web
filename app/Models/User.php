<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Photo::class, 'likes');
    }

    public function hasLiked(Photo $photo)
    {
        return $this->likes()->where('photo_id', $photo->id)->exists();
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

}
