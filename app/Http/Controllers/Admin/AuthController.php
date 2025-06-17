<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    /**
     * Menentukan middleware yang akan diterapkan pada controller ini.
     * Digunakan untuk memastikan bahwa hanya tamu (belum login sebagai admin) yang bisa mengakses halaman tertentu,
     * kecuali untuk aksi logout.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('guest:admin', except: ['logout']),
        ];
    }

    // Middleware versi lama yang dipindahkan ke metode statis di atas
    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout');
    // }

    /**
     * Menampilkan halaman formulir login untuk admin.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Memproses permintaan login dari form admin.
     * Jika berhasil, redirect ke dashboard. Jika gagal, kembalikan ke form dengan pesan error.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input login untuk memastikan email dan password telah diisi dengan benar
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Coba lakukan proses otentikasi menggunakan guard khusus admin
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Jika sukses, perbarui sesi untuk mencegah serangan session fixation
            $request->session()->regenerate();

            // Arahkan ke dashboard admin
            return redirect()->intended(route('admin.dashboard'));
        }

        // Jika gagal login, kembalikan ke halaman sebelumnya dengan error pada input email
        return back()->withErrors([
            'email' => 'Data salah !!!',
        ])->onlyInput('email');
    }

    /**
     * Keluar dari sesi login admin.
     * Semua data sesi dihapus, token diamankan kembali, lalu redirect ke halaman login admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Jalankan proses logout menggunakan guard admin
        Auth::guard('admin')->logout();

        // Kosongkan sesi dan buat ulang token CSRF untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman login admin
        return redirect()->route('admin.login');
    }
}
