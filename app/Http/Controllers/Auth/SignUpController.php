<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;  // Perbaiki import namespace
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function show() {
        // Menampilkan form sign-up
        return view('pages.auth.sign-up');
    }

    public function signUp(SignUpRequest $request) {
        // Validasi data yang masuk menggunakan SignUpRequest
        $validated = $request->validated();
        
        // Enkripsi password sebelum menyimpannya
        $validated['password'] = bcrypt($validated['password']);
        
        // Mengatur URL avatar berdasarkan username
        $validated['picture'] = config('app.avatar_generator_url') . $validated['username'];

        // Membuat pengguna baru
        $create = User::create($validated);

        // Login otomatis jika pembuatan berhasil
        if ($create) {
            Auth::login($create);
            return redirect()->route('diskusi'); // pastikan nama route benar
        }

        // Jika ada kesalahan saat menyimpan, beri respon error 500
        return abort(500);
    }
}
