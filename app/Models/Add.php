<?php

namespace App\Models;

use App\Scopes\ScopePublishedAdds;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Add extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        self::addGlobalScope(new ScopePublishedAdds());
    }

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function comments() {

        return $this->hasMany(Comment::class);
    }

    public function isPublished() {

        return $this->is_published === 1;
    }

    public function scopeOnlyOtherUsersAdds(Builder $query) {

        return $query->where('user_id', '!=', Auth::id());
    }

}
