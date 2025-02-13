<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'guest_name',
        'organization',
        'age',
        'gender',
        'contact',
        'category',
        'photo_id_proof'
    ];

    // Relationship with Application
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
