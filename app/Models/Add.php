<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Add extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price'];

    protected static $paginationPerPage = 3;

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function comments() {

        return $this->hasMany(Comment::class);
    }

    public function publish() {

        $this->is_published = 1;
        $this->save();
    }

    public function unpublish() {

        $this->is_published = 0;
        $this->save();
    }

    public function isPublished() {

        return $this->is_published === 1;
    }

    public function scopeOnlyOtherUsersAdds(Builder $query) {

        return $query->where('user_id', '!=', Auth::id());
    }

    public function scopePublished(Builder $query) {

        return $query->where('is_published', 1);
    }

    public static function getPaginationPerPage() {

        return static::$paginationPerPage;
    }
}
