<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function getAdminRole() {

        return Config::get('constants.roles.admin', 'admin_role');
    }

    public static function getUserRole() {

        return Config::get('constants.roles.user', 'user_role');
    }
}
