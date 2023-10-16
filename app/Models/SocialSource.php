<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'social_id',
        'name',
        'link',
    ];

    public function mediaSocial()
    {
        return $this->belongsTo(MediaSocial::class, 'social_id');
    }
}
