<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionnaire extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['id', 'title', 'status', 'created_by'];

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'id');
    }

    public function questionExpertPanel() {

        return $this->hasMany(QuestionExpertPanel::class);
    }


    public function question()
    {
        return $this->hasMany(Question::class)->where('status',1);
    }


}
