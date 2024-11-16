<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion; // Pastikan model Discussion ada
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($categorySlug)
{
    $category = Category::where('slug', $categorySlug)->first();

    if (!$category) {
        return abort(404);
    }

    $discussions = Discussion::where('category_id', $category->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString();

    return response()->view('pages.discussion.index', [
        'discussions' => $discussions,
        'categories' => Category::all(),
        'category' => $category, // Kirim kategori yang dipilih ke view
    ]);
}

}
