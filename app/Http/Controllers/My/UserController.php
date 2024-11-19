<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discussion;
use App\Models\Answer;
use Storage;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return abort(404);
        }

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture
            : Storage::url($user->picture);

        $perPage = 5;
        $column = ['*'];
        $discussionsPageName = 'discussions';
        $answerPageName = 'answers';

        return view('pages.users.show', [
            'user' => $user,
            'picture' => $picture,
            'discussions' => Discussion::where('user_id', $user->id)
                ->paginate($perPage, $column, $discussionsPageName),
            'answers' => Answer::where('user_id', $user->id)
                ->paginate($perPage, $column, $answerPageName),
        ]);
    }

    public function edit()
    {
        $user = auth()->user(); // Data user login diambil dari auth

        if (!$user) {
            return abort(404);
        }

        $picture = filter_var($user->picture, FILTER_VALIDATE_URL)
            ? $user->picture
            : Storage::url($user->picture);

        return view('pages.users.form', [
            'user' => $user,
            'picture' => $picture,
        ]);
    }

    public function update(UpdateRequest $request, $username)
{
    $user = auth()->user();

    if (!$user) {
        return abort(404);
    }

    $validated = $request->validated();

    // Periksa jika password tidak kosong, baru update
    if (!empty($validated['password'])) {
        $validated['password'] = bcrypt($validated['password']);
    } else {
        unset($validated['password']); // Hilangkan dari array validated
    }

    // Jika ada file picture
    if ($request->hasFile('picture')) {
        // Hapus gambar lama jika bukan URL
        if (filter_var($user->picture, FILTER_VALIDATE_URL) === false) {
            Storage::disk('public')->delete($user->picture);
        }

        $filePath = Storage::disk('public')->put('image/users/picture', $request->file('picture'));
        $validated['picture'] = $filePath;
    }

    if ($user->update($validated)) {
        session()->flash('success', 'Your profile has been successfully updated!');
        return redirect()->route('users.show', $user->username);
    }

    return abort(500);
}
}
