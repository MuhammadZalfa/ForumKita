<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Discussion;
use App\Http\Requests\Answer\StoreRequest;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
    }

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
    $answer = new Answer();
    $answer->user_id = auth()->id();
    $answer->discussion_id = $discussion->id;
    $answer->answer = $validated['answer'];
    $answer->save();

    // Redirect ke halaman diskusi setelah menyimpan
    return redirect()->route('diskusi.show', $slug)->with('success', 'Your answer has been posted!');
}




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
