<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rentals extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'publisher_id',
        'rental_name',
        'rental_category',
        'pets',
        'parking',
        'smoking',
        'music',
        'no_of_shares',
        'each_person_price',
        'address',
        'phone',
        'rental_property_pictures',
        'no_of_beds',
        'washroom',
        'wifi',
        'description'
    ];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }
}
