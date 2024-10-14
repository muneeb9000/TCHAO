<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','city_name','rental_id','rental_name','number_of_persons','arrival_date','departure_date','payment_amount','payment_method','payment_time'];

    public function customers()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
