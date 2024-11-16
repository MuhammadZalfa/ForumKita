<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index(Request $request) {
        $discussions = Discussion::with('user', 'category');

        if ($request->search) {
            $discussions->where('title', 'like', "%$request->search%")
                ->orWhere('content', 'like', "%$request->search%");
        }

        return response()->view('pages.discussion.index', [
            'discussions' => $discussions->orderBy('created_at', 'desc')
                ->paginate(10)->withQueryString(),
            'categories' => Category::all(),
            'search' => $request->search,
        ]);
    }

    public function create()
    {
        return response()->view('pages.discussion.form', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_slug' => 'required|exists:categories,slug',
            'content' => 'required|string',
        ]);

        $categoryId = Category::where('slug', $validated['category_slug'])->first()->id;

        // Set additional data
        $validated['category_id'] = $categoryId;
        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']) . '-' . time();

        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated['content_preview'] = $isContentLong
            ? (substr($stripContent, 0, 120) . '...')
            : $stripContent;

        // Create diskusi
        $create = Discussion::create($validated);

        if ($create) {
            return redirect()->route('diskusi.index')->with('success', 'Diskusi berhasil dibuat!');
        }

        return abort(500);
    }

    public function show(string $slug)
{
    $discussion = Discussion::with(['user', 'category'])->where('slug', $slug)->first();
    $notLiked = url('assets/images/like.png');
    $likedImage = url('assets/images/likee.png');

    // Pastikan untuk memeriksa apakah user sudah login
    $isLikedByUser = auth()->check() ? $discussion->likedByUser(auth()->user()) : false;

    return response()->view('pages.discussion.show', [
        'discussion' => $discussion,
        'categories' => Category::all(),
        'likedImage' => $likedImage,
        'notLiked' => $notLiked,
        'isLikedByUser' => $isLikedByUser, // Kirim status like ke view
    ]);
}

}
