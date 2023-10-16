<?php

namespace App\Models;

use App\Models\ServiceItem;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    use Sluggable;

    
    protected $fillable=[
        'service_code', 
        'name',
        'slug',
        'description',
        'service_img',
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

    public function serviceItems()
    {
        return $this->hasMany(ServiceItem::class);
    }   
}
