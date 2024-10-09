<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class QuestionExpertPanel extends Model
{
    use HasFactory,SoftDeletes;    
   
    protected $fillable = ['id', 'questionnaire_id','expert_panel_id', 'status', 'created_by'];


    public function expertPanel() {

        return $this->belongsTo(ExpertPanel::class);
    }


    public function questionnaires() {

        return $this->belongsTo(Questionnaire::class,'questionnaire_id','id');
    }


    public function userRegion() {

        return $this->hasMany(UserRegion::class,'user_id','created_by');
    }

 
    public function ExpertPanelExpert() {

        return $this->hasMany(ExpertPanelExpert::class,'expert_panel_id','expert_panel_id');
    }


    public function expertResponse()
    {
        return $this->hasMany(QuestionExpertResponse::class,'questionnaires_id','id');
    }




}