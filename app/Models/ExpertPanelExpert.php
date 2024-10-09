<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ExpertPanelExpert extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expert_panel_experts';
    protected $fillable = ['id', 'expert_panel_id', 'expert_id', 'status', 'created_by'];



    public function Expert()
    {

        return $this->belongsTo(Expert::class, 'expert_id', 'id');
    }


    public function expertPanel()
    {
        return $this->belongsTo(ExpertPanel::class, 'expert_panel_id', 'id');
    }

    public function expertResponse()
    {

        return $this->hasMany(QuestionExpertResponse::class,'expert_id','expert_id');
    }


}
