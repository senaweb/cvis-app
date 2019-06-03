<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'first_name', 'last_name', 'email', 'location', 'login_status', 'organization_id', 'organization_unit', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role of a user
     * @return \Illuminate\Database\Eloquent
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function is($role)
    {
        return $this->role()->where('name', $role)->first();
    }



    /**
     * Get user fullname
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Rules for updating users
     */
    public function updateRules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'organization_id' => 'required|string|max:255',
            'organization_unit' => 'required|string|max:255',
            'phone' => 'required',
            // 'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:8|confirmed'
        ];
    }
}
