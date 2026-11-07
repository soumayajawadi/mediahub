<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Categorie extends Model
{
    use HasFactory;
    
    protected $fillable = ['nom', 'slug'];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}