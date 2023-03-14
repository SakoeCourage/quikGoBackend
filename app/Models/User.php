<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\Cast\Object_;
use Overtrue\LaravelLike\Traits\Liker;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

     
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function businessprofile(){
            return $this->hasOne(businessprofile::class);

    }
    


    public function ads(){
        return $this->hasMany(Ad::class);
    }

    public function checkbusinessprofile(){
        $businessprofile=$this->businessprofile();
            return $businessprofile;
    }

  
  

}
