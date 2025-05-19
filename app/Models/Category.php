<?php

namespace App\Models;

use App\Models\User;
use App\Models\House;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'descriptions',
        'parent_id',
        'created_by',
    ];

    // Relationships
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
