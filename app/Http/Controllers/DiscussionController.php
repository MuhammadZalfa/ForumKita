<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */

    public function index(Request $request) {
        $discussions = Discussion::with('user', 'category');

        if ($request->search){
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
        // Mengambil semua kategori dari database
        return response()->view('pages.discussion.form', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Form Data:', $request->all());  // Debugging log

        // Validasi input dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_slug' => 'required|exists:categories,slug',
            'content' => 'required|string',
        ]);

        // Ambil ID kategori berdasarkan slug
        $categoryId = Category::where('slug', $validated['category_slug'])->first()->id;

        // Set additional data
        $validated['category_id'] = $categoryId;
        $validated['user_id'] = auth()->id(); // ID pengguna yang login
        $validated['slug'] = Str::slug($validated['title']) . '-' . time(); // Membuat slug unik

        // Strip HTML tags dan buat preview content jika panjangnya lebih dari 120 karakter
        $stripContent = strip_tags($validated['content']);
        $isContentLong = strlen($stripContent) > 120;
        $validated['content_preview'] = $isContentLong
            ? (substr($stripContent, 0, 120) . '...') // Tambahkan preview jika konten panjang
            : $stripContent;

        // Create diskusi
        $create = Discussion::create($validated);

        if ($create) {
            // Mengarahkan kembali dengan session success
            return redirect()->route('diskusi.index')->with('success', 'Diskusi berhasil dibuat!');
        }

        // Jika gagal, tampilkan error
        return abort(500);
    }

    public function show(string $slug)
{
    $discussion = Discussion::with('user', 'category') // Relasi yang diperlukan
        ->where('slug', $slug) // Cari berdasarkan slug
        ->first();

    if (!$discussion) {
        abort(404, 'Diskusi tidak ditemukan.');
    }

    $notLikedImage = asset('assets/images/like.png');
    $likedImage = asset('assets/images/liked.png');

    return response()->view('pages.discussion.show', [
        'discussion' => $discussion,
        'categories' => Category::all(),
        'likedImage' => $likedImage,
        'notLikedImage' => $notLikedImage
    ]);
}



    // Other methods (show, edit, update, destroy) bisa ditambahkan sesuai kebutuhan
}

