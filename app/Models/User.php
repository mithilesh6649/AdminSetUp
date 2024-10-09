<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;



class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    const COORDINATOR =1;
    const EXPERT =2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_type',
        'name_and_affiliation',
        'email',
        'country',
        'gps_coordination',
        'lat',
        'lat',
        'password',
        'assessment_in_two_months',
        'finalize_country_questionnaire',
        'terms_conditions',
        'email_verification_token',
        'email_verification_at',
        'is_email_verified',
        'phone_number',
        'push_notification',
        'email_notification',
        'app_notification',
        'ip_address',
        'device_name',
        'remember_me',
        'login_with',
        'user_locked',
        'user_locked_at',
        'wrong_attampt',
        'last_login_at',        
        'remember_token',
        'profile_image',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = ['profile'];


    public function getProfileAttribute()
    { 

        if (isset($this->profile_image)) {

            return config('site.STORAGE_PATH').$this->profile_image;  
            
        }else{
            return config('site.STORAGE_PATH').'user_profile.jpg';       
        }

    }

    protected function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function fcmTokens()
    {
        return $this->morphMany(FcmToken::class, 'tokenable');
    }

 

    public function getcountry()
    {

        return $this->hasOne(Country::class,'id','country');
    }
    public function getUserRegion()
    {

        return $this->hasMany(UserRegion::class,'user_id','id');
    }


   
     

 
}
