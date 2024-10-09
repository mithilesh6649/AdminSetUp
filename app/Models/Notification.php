<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    
    protected $fillable = ['id', 'title', 'body', 'type', 'sender_id','expert_panel_id','receiver_id','status'];

}
