<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
    ];

    public function socialSource()
    {
        return $this->hasMany(SocialSource::class);
    }
}
