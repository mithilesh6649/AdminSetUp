<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'questions';
    protected $fillable = ['id', 'questionnaire_id', 'question', 'question_section_id', 'question_type', 'status', 'created_by'];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id', 'id');
    }

    public function questionSection()
    {
        return $this->belongsTo(QuestionSection::class, 'question_section_id', 'id');
    }

    public function question_options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'id');
    }

    public function questionExpertResponse() {

        return $this->hasMany(QuestionExpertResponse::class,'question_id','id');
    }

    public function coordinateQuestions() {
        return $this->hasOne(CoordinatorQuestion::class,'question_id','id');
    }
}
