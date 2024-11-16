<?php
namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // Method untuk like
    public function likeDiscussion($slug)
{
    $discussion = Discussion::where('slug', $slug)->first();

    if (!$discussion) {
        return response()->json(['error' => 'Discussion not found.'], 404);
    }

    $user = Auth::user();

    if ($discussion->isLikedBy($user)) {
        return response()->json(['status' => 'error', 'message' => 'You already liked this discussion.'], 400);
    }

    $discussion->like($user);

    return response()->json([
        'status' => 'success',
        'message' => 'Successfully liked the discussion.',
        'likeCount' => $discussion->likes()->count(),
    ]);
}

public function unlikeDiscussion($slug)
{
    $discussion = Discussion::where('slug', $slug)->first();

    if (!$discussion) {
        return response()->json(['error' => 'Discussion not found.'], 404);
    }

    $user = Auth::user();

    if (!$discussion->isLikedBy($user)) {
        return response()->json(['status' => 'error', 'message' => 'You have not liked this discussion yet.'], 400);
    }

    $discussion->unlike($user);

    return response()->json([
        'status' => 'success',
        'message' => 'Successfully unliked the discussion.',
        'likeCount' => $discussion->likes()->count(),
    ]);
}

}
