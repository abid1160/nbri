<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_name',
        'organization_type',
        'organization_id',
        'manual_organization',
        'designation',
        'contact_no',
        'email',
        'image_path',
        'purpose',
        'date_of_arrival',
        'arrival_time',
        'date_of_departure',
        'departure_time',
        'room',
        'payment',
        'csrf_token' // If you're explicitly storing it
    ];

    // Relationship with Guests
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    // Relationship with Organization
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
