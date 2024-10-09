<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expert extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;



    protected $guarded = [];

    protected $appends = ['profile_image'];
    

    public function getProfileImageAttribute()
    {

        if ($this->profile) {

            return config('site.STORAGE_PATH').$this->profile;  
            
        }else{
            if ($this->profile=='male') {
                return config('site.STORAGE_PATH').'user_profile.jpg';  
            }else{

                return config('site.STORAGE_PATH').'female.jpg';  
            }     
        }



    }
    public function expertPanel(){

        return $this->hasMany(ExpertPanelExpert::class,'expert_id','id');
    }

    public function getexpertise(){

        return $this->hasOne(Expertise::class,'id','expertise');
    }



    public function fcmTokens()
    {
        return $this->morphMany(FcmToken::class, 'tokenable');
    }


    public function Coordinator() {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }




}
