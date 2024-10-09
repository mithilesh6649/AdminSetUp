<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'admin';


    protected $fillable = [
        'first_name', 
        'last_name',
        'email', 
        'password',
        'phone_number',
        'password',
        'ip_address',
        'status',
        'remember_me',
        'email_verification_token',
        'email_verified_at',
        'is_email_verified',
        'is_user_locked',
        'wrong_attampt',
        'role_id',
        'created_by',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Get the admins for the role.
	*/
	public function role() {
		return $this->belongsTo(Role::class);
	}
}
