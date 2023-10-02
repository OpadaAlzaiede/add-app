<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'add_id'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($comment) {
            $comment->user_id = Auth::id();
        });
    }

    public function user() {

        return $this->belongsTo(User::class);
    }
}
