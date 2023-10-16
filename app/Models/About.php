<?php

namespace App\Models;

use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'description',
        'company_address',
        'company_email',
        'company_phone',
        'company_map',
        'company_logo',
        'company_image',
    ];

    //berleasi one to many dengan model Visi
    public function visi()
    {
        return $this->hasMany(Visi::class);
    }

    //berleasi one to many dengan model Misi
    public function misi()
    {
        return $this->hasMany(Misi::class);
    }
}
