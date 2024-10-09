<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function question_expert_response()
    {
        return $this->hasMany(QuestionExpertResponse::class, 'region_id', 'id')->with('question');
    }
}
