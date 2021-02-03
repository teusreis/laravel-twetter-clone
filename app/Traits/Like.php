<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Like
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) as likes, sum(!liked) as dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );

    }

    public function like(bool $liked = true)
    {
        return $this->likes()->updateOrCreate([
            'user_id' => auth()->user()->id,
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike()
    {
        return $this->like(false);
    }

    public function isLikedBy(User $user, $liked = true)
    {
        return (bool) $user->likes()
            ->where("tweet_id", $this->id)
            ->where("liked", $liked)
            ->count();
    }

    public function isDisLikedBy(User $user)
    {
        return $this->isLikedBy($user, false);
    }
}
