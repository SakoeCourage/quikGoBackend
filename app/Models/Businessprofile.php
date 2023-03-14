<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businessprofile extends Model
{
    use HasFactory;

    protected $table="businessprofiles";

    protected $fillable = [
        'profile_image', 
        'user_id',
        'location_id',
        'category_id',
        'business_name',
        'contact_number',
        'email',
        'address',
        'others',
    ];

       public function user(){

        $this->belongsTo(User::class);
    }
}
