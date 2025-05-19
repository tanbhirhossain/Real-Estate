<?php

namespace App\Models;

use App\Models\User;
use App\Models\House;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Realtor extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'slug',
        'bio',
        'email',
        'address',
        'created_by',
    ];

    // Relationships
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }

     // Register media collection (e.g., profile image)
     public function registerMediaCollections(): void
     {
         $this->addMediaCollection('profile_image')
             ->singleFile(); // Only one image at a time
     }
}
