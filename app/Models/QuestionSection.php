<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'question_sections';
    protected $fillable = ['id', 'name', 'slug'];
}
