<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class QuestionOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'question_options';
    protected $fillable = ['id', 'question_id', 'option', 'is_correct', 'created_by'];
}
