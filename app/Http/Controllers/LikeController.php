<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class LikeController extends Controller
{
    public function discussionLike(string $discussionSlug)
    {
        $discussion = Discussion::where('slug', $discussionSlug)->first();

        if (!$discussion) {
            return response()->json([
                'status' => 'error',
                'message' => 'Discussion not found',
            ], 404);
        }

        $discussion->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ],
        ]);
    }

    public function discussionUnlike(string $discussionSlug)
    {
        $discussion = Discussion::where('slug', $discussionSlug)->first();

        if (!$discussion) {
            return response()->json([
                'status' => 'error',
                'message' => 'Discussion not found',
            ], 404);
        }

        $discussion->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ],
        ]);
    }
}
    