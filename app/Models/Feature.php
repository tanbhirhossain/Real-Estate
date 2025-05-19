<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'created_by'
    ];

    public function houses()
    {
        return $this->belongsToMany(House::class, 'assign_features', 'feature_id', 'house_id');
    }

}
