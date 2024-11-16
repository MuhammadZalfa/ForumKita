<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    // Define the relationship with users (many-to-many)
    public function usersThatLiked()
    {
        return $this->belongsToMany(User::class, 'likes', 'discussion_id', 'user_id');
    }

    // Method to check if a user has liked the discussion
    public function likedByUser(User $user)
    {
        return $this->usersThatLiked()->where('user_id', $user->id)->exists();
    }

    // Additional methods for liking/unliking (optional)
    public function like(User $user)
    {
        return $this->usersThatLiked()->attach($user->id);
    }

    public function unlike(User $user)
    {
        return $this->usersThatLiked()->detach($user->id);
    }
}
