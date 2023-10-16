<?php

namespace App\Models;

use App\Models\About;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visi extends Model
{
    use HasFactory;

    protected $fillable = [
        'visi',
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
