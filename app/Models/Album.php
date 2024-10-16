<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function first_photo()
    {
        return $this->photos()->first();
    }

    public function second_photo()
    {
        return $this->photos()->skip(1)->first();
    }
}