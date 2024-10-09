<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpertPanel extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['id', 'user_id', 'panel_name', 'status', 'created_by'];


    public function ExpertPanel(){

        return $this->hasMany(ExpertPanelExpert::class);
    }


    public function scopeFilter($query, $request)
    {

        if (in_array($request->status,['pending','ongoing','completed']))
        {
            return $query->where('ep_status',$request->status);
        }
        else
        {
            return $query;
        }
    }


    public function questionExpertPanel(){

        return $this->hasOne(QuestionExpertPanel::class);
    }


    public function panel_owner(){

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function experPanelExepert() {
        return $this->hasMany(ExpertPanelExpert::class,'expert_panel_id','id');
    }

}
