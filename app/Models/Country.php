<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = ['id', 'country_name', 'lat', 'long', 'regions', 'iso2', 'timezone', 'status'];

    public function region()
    {
        return $this->hasMany(Region::class, 'country_id', 'id')->with('question_expert_response');
    }

    public function filelinks()
    {
        return $this->hasOne(FilesLinks::class, 'country_id', 'id');
    }
}
