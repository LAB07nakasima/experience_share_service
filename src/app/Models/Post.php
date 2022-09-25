<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'contents',
        'user_id'
    ];

    public static function getAllOrderByUpdated_at()
    {
        // selfはpostモデルのこと
        //orderBy(ソートする要素名, 降順(昇順))
        //get()で実行
        return self::orderBy('updated_at', 'desc')->get();
    }

    public function user()
    {
        // １対多の1と繋げてる
        return $this->belongsTo(User::class);
    }

    // いいね機能
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // コメント
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
