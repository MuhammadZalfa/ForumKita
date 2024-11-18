<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\Answer;
use App\Models\Category;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{

    // Method untuk menampilkan detail diskusi berdasarkan slug
public function show(string $slug)
{
    // Mengambil data diskusi dengan relasi
    $discussion = Discussion::with('user', 'category')
        ->where('slug', $slug)
        ->first();

    // Jika tidak ditemukan
    if (!$discussion) {
        abort(404, 'Diskusi tidak ditemukan.');
    }

    $discussionAnswers = Answer::where('discussion_id', $discussion->id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);

    // Mengirim data ke view
    return view('pages.discussion.show', [
        'discussion' => $discussion,
        'categories' => Category::all(),
        'likedImage' => asset('assets/images/liked.png'),
        'notLikedImage' => asset('assets/images/like.png'),
        'discussionAnswers' => $discussionAnswers,
    ]);
}


    // Method untuk menampilkan daftar diskusi dengan paginasi
    public function index(Request $request)
    {
        // Ambil semua diskusi dengan paginasi 10 item per halaman
        $discussions = Discussion::latest()->paginate(10);

        // Ambil semua kategori untuk ditampilkan di sidebar
        $categories = Category::all();

        // Jika ada pencarian atau filter kategori, ambil sesuai filter
        if ($request->has('search') && $request->search != '') {
            $discussions = Discussion::where('title', 'like', '%' . $request->search . '%')
                                    ->latest()
                                    ->paginate(10);
        }

        if ($request->has('category_slug') && $request->category_slug != '') {
            $discussions = Discussion::where('category_slug', $request->category_slug)
                                    ->latest()
                                    ->paginate(10);
        }

        return view('pages.discussion.index', compact('discussions', 'categories'));
    }

    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('pages.discussion.form', compact('categories'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category_slug' => 'required|exists:categories,slug',
        'content' => 'required|string',
    ]);

    $category = Category::where('slug', $validated['category_slug'])->firstOrFail();

    Discussion::create([
        'title' => $validated['title'],
        'slug' => Str::slug($validated['title']),
        'category_id' => $category->id,
        'content' => $validated['content'],
        'content_preview' => Str::limit(strip_tags($validated['content']), 100), // Tambahkan preview
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('diskusi.index')->with('success', 'Discussion created successfully!');
}



    public function edit($slug)
{
    // Cari diskusi berdasarkan slug
    $discussion = Discussion::where('slug', $slug)->firstOrFail();

    // Pastikan hanya pemilik yang bisa mengedit
    if ($discussion->user_id !== auth()->id()) {
        return redirect()->route('diskusi.index')->with('error', 'You do not have permission to edit this discussion.');
    }

    $categories = Category::all();

    return view('pages.discussion.form', compact('discussion', 'categories'));
}


public function update(Request $request, $slug)
{
    // Validasi input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category_slug' => 'required|exists:categories,slug',
        'content' => 'required|string',
    ]);

    // Cari category_id berdasarkan category_slug
    $category = Category::where('slug', $validated['category_slug'])->firstOrFail();

    // Cari diskusi berdasarkan slug
    $discussion = Discussion::where('slug', $slug)->firstOrFail();

    // Pastikan hanya pemilik yang bisa update
    if ($discussion->user_id !== auth()->id()) {
        return redirect()->route('diskusi.index')->with('error', 'You do not have permission to edit this discussion.');
    }

    // Update diskusi dengan category_id
    $discussion->update([
        'title' => $validated['title'],
        'slug' => Str::slug($validated['title']), // Update slug
        'category_id' => $category->id, // Update category_id
        'content' => $validated['content'],
    ]);

    return redirect()->route('diskusi.index')->with('success', 'Discussion updated successfully!');
}

public function destroy(string $slug)
{
    // Cari diskusi berdasarkan slug
    $discussion = Discussion::where('slug', $slug)->firstOrFail();

    // Pastikan hanya pemilik yang bisa menghapus
    if ($discussion->user_id !== auth()->id()) {
        return redirect()->route('diskusi.index')->with('error', 'You do not have permission to delete this discussion.');
    }

    // Hapus diskusi
    $discussion->delete();

    return redirect()->route('diskusi.index')->with('success', 'Discussion deleted successfully!');
}



}
