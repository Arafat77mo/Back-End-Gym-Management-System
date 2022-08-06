<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\SingleWorkoutCaregory;
// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable implements JWTSubject,MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'gender',
        'image',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function singleworkout(){
    //     return $this-> belongsToMany (related:'App\Model\SingleWorkoutCaregory',
    //     table:'single_workout_users',
    //     foreignPivotKey:'user_id',
    //     relatedPivotKey:'single_workout_caregorie_id',
    //     parentKey:'id',relatedKey:'id');
    // }



public function categories(){
        return $this-> belongsToMany ('App\Models\SingleWorkoutCaregory',
        'single_workout_users',
        'user_id',
        'single_workout_caregorie_id',
        'id','id');
    }
    //  public function categories()
    //  {
    // return $this->belongsToMany(SingleWorkoutCaregory::class,'users','id');
    //  }


    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}

