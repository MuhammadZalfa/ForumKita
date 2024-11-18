<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Discussion;


class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {
        // Cari diskusi berdasarkan slug
        $discussion = Discussion::where('slug', $slug)->firstOrFail();

        // Validasi input
        $validated = $request->validate([
            'answer' => 'required|string|min:10',
        ]);

        // Simpan answer ke database
        try {
            $answer = new Answer();
            $answer->user_id = auth()->id(); // Ambil ID user login
            $answer->discussion_id = $discussion->id; // ID diskusi
            $answer->answer = $validated['answer']; // Isi jawaban
            $answer->save();
        } catch (\Exception $e) {
            // Debug jika error
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        // Redirect ke halaman diskusi setelah menyimpan
        return redirect()->route('diskusi.show', $slug)->with('success', 'Your answer has been posted!');
    }
}
