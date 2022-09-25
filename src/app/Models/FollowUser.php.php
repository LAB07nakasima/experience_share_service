<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    use HasFactory;
    protected $table = 'follow_users';

    protected $fillable = [
        'following_user_id',
        'followed_user_id',
    ];

}
