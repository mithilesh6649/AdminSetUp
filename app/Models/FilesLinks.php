<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesLinks extends Model
{
    use HasFactory;

     protected $fillable = [
        'country_id',
        'country_name',
        'link',
        'file_path',
        'status',
    ];
}
