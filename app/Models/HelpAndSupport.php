<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpAndSupport extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'description',
        'user_id',
        'user_type',
        'status',
        'attachment',
        'response_by'
    ];

    public function user($type)
    {
        dd($type);
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function helpResponse(){
 
        return $this->hasMany(HelpChatHeadLog::class);
 
    }
}
