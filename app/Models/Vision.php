<?php

namespace App\Models;

use App\Models\About;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vision extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'visi',
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
