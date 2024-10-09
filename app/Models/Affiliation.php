<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affiliation extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

    
    protected $fillable = ['id', 'name', 'status'];
}
