<?php

namespace App\Models;

use App\Models\About;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mision extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_about',
        'mission',
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
