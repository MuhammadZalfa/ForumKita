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

    /**
     * Show the form for editing an existing answer.
     */
    public function edit(string $id)
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        // Cek kepemilikan jawaban
        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(403); // Gunakan 403 untuk unauthorized access
        }

        return response()->view('pages.answers.form', [
            'answer' => $answer,
        ]);
    }

    /**
     * Update an existing answer.
     */
    public function update(Request $request, string $id)
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        // Cek kepemilikan jawaban
        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(403);
        }

        // Validasi input
        $validated = $request->validate([
            'answer' => 'required|string|min:10',
        ]);

        // Update jawaban
        $update = $answer->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Answer updated successfully!');
            return redirect()->route('diskusi.show', $answer->discussion->slug);
        }

        // Handle error jika update gagal
        return back()->withErrors(['error' => 'Failed to update answer.']);
    }
    
    public function destroy (string $id){

        $answer = Answer::find($id);

        if (!$answer) {
            return abort(404);
        }

        // Cek kepemilikan jawaban
        $isOwnedByUser = $answer->user_id == auth()->id();

        if (!$isOwnedByUser) {
            return abort(403);
        }

        // Update jawaban
        $delete = $answer->delete();

        if ($delete) {
            session()->flash('notif.success', 'Answer Deleted successfully!');
            return redirect()->route('diskusi.show', $answer->discussion->slug);
        }

        // Handle error jika update gagal
        return back()->withErrors(['error' => 'Failed to update answer.']);
    }
}
