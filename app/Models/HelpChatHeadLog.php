<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpChatHeadLog extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'help_and_support_id', 'description', 'attachment', 'user_type', 'status', 'response_by'];

}
