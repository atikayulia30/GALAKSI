<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    function index()
    {
        return view('welcome');
    }

    public function profile()
    {
        return view('profile');
    }


    public function kategori($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return view('kategori', compact('kategori'));
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $video = DB::table('video')->where('judul', 'like', "%" . $cari . "%")->get();
        return view('search', compact('video'));
    }


    function login()
    {
        return view('login');
    }

    function detail($id)
    {
        $video = DB::table('video')->where(['id' => $id, 'hapus' => 0])->first();
        $komentars = DB::table('komentar')->get();

        return view('detail', ["komentars" => $komentars, "video" => $video]);
    }


    function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->put('user', true);
            $request->session()->put('user_name', Auth::guard('user')->user()->name); // set session 'user'
            $request->session()->put('id_kelas', Auth::guard('user')->user()->kelas); // set session 'id_kelas'
            return redirect()->route("mapel.list")->withSuccess('success', 'You have successfully logged in');
        }
        return redirect("login")->withError('Salah Email atau Password');
    }


    function komentar(Request $request)
    {
        $nama = $request->name;
        $video = $request->video_id;
        $komentar = $request->comment;
        $insert = DB::table('komentar')->insert([
            'nama' => $nama,
            'komentar' => $komentar,
            'id_video' => $video,
        ]);
        if ($insert) {
            return redirect('/detail/' . $video)->with(['status' => 1, 'msg' => 'Berhasil Menambahkan Komentar']);
        } else {
            return redirect('/detail/' . $video)->with(['status' => 0, 'msg' => 'Gagal Menambahkan Komentar']);
        }
    }

    function register()
    {
        $kategori['kategori'] = DB::table('kategori')->where(['hapus' => 0])->get();
        return view('register', $kategori);
    }

    public function downloadMateri(Request $request)
    {
        return Storage::download($request->file_path);
    }

    function doRegister(Request $request)
    {
        $data = array(
            'name' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'password' => Hash::make($request->password)
        );
        $cek = DB::table('users')->where(['email' => $request->email])->count();
        if ($cek > 0) {
            return redirect("register")->withError('Email Sudah Terdaftar');
        }
        $user = DB::table('users')->insert($data);
        return redirect("register")->withSuccess('Berhasil Daftar');
    }
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
