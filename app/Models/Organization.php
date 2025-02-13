<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    
    protected $fillable = ['organization'];

    // Relationship with Applications
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
