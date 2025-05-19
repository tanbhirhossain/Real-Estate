<?php

namespace App\Models;

use App\Models\User;
use App\Models\Realtor;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class House extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = [
        'realtor_id',
        'category_id',
        'title',
        'slug',
        'short_desc',
        'descriptions',
        'price',
        'city',
        'address',
        'bedroom',
        'bathroom',
        'size',
        'created_by',
    ];

    // Relationships
    public function realtor()
    {
        return $this->belongsTo(Realtor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Register gallery image collection
    public function registerMediaCollections(): void
    {
         $this->addMediaCollection('house_gallery_images');
    }
    
}
