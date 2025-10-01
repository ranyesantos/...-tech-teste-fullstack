<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Subreddit extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'banner_url',
        'icon_url',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'subreddit_user', 'subreddit_id', 'user_id');
    }

    public function latestPost()
    {
        return $this->hasOne(Post::class)->latestOfMany();
    }
}
