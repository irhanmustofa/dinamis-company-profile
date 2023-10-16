<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'service_id',
        'item_code',
        'name',
        'slug',
        'price',
        'tipe',
        'description',
        'item_img',
    ];  

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate'=>true,
            ]
        ];
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
