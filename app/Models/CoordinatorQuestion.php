<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinatorQuestion extends Model
{
    use HasFactory; 

    protected $fillable = ['coordinator_id', 'questionnaire_id', 'question_id', 'question'];

    public $timestamps = true;

    protected $hidden = ['created_at', 'updated_at'];

    public function questions()
    {
        return $this->belongsTo(QuestionOption::class, 'question_id', 'id');
    }
}
