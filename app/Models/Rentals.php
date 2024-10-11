<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rentals extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rental_name',
        'rental_category',
        'city_id',
        'each_person_price',
        'address',
        'phone',
        'description',
        'size_in_sqm',
        'max_people',
        'common_rooms',
        'bedrooms',
        'bathrooms',
        'exterior',
        'baby_bed',
        'double_bed',
        'sofa_bed',
        'duvets',
        'pillows',
        'sheets',
        'pillow_protectors',
        'shower',
        'bath_towels',
        'washing_machine',
        'microwave',
        'hotplates',
        'fridge',
        'freezer',
        'coffee_maker',
        'tea_towels',
        'table',
        'chairs',
        'baby_high_chair',
        'coffee_table',
        'television',
        'fan',
        'smoke_detector',
        'rental_property_pictures',
    ];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }
    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id'); 
    }
}
