<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expertise extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expertises';
    protected $fillable = ['id', 'name', 'status', 'created_by'];
}
