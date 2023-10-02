<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected static $paginationPerPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {

        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function assignRole($roleName) {

        $role = Role::where('name', $roleName)->first();

        if($role) {

            $this->roles()->attach($role->id);
        }
    }

    public function hasRole($roleName) {

        return $this->roles()->where('name', $roleName)->exists();
    }

    public function isActivated() {

        return $this->is_activated === 1;
    }

    public function activate() {

        $this->is_activated = 1;
        $this->save();
    }

    public function deActivate() {

        $this->is_activated = 0;
        $this->save();
    }

    public function scopeUsersOnly(Builder $query) {

        return $query->whereHas('roles', function($roleQuery) {

            $roleQuery->where('name', Role::getUserRole());
        });
    }

    public static function getPaginationPerPage() {

        return static::$paginationPerPage;
    }
}
