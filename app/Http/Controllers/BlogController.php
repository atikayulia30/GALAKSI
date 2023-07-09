<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $id = session('id_kelas');
        $kelas = DB::table('kategori')->where(['id' => $id, 'hapus' => 0])->first();
        $query = DB::table('video as v')
            ->join('mapel as m', 'm.id', '=', 'v.id_mapel')
            ->where(['v.id_kategori' => $id, 'v.hapus' => 0])
            ->select('v.*', 'v.gambar', 'm.nama_mapel');
        if ($mapel_id = $request->query("mapel")) {
            $query->where("id_mapel", $mapel_id);
        }

        $video = $query->get();

        return view('blog', ["id" => $id, "kelas" => $kelas, "video" => $video]);
    }

    public function getMapel()
    {
        $mapel = DB::table('mapel')->get();
        return view("matapelajaran-list", ["mapels" => $mapel]);
    }

    public function getVideoByMapel(Request $request)
    {
        $id = session('id_kelas');
        $kelas = DB::table('kategori')->where(['id' => $id, 'hapus' => 0])->first();
        $video = DB::table('video as v')
            ->join('mapel as m', 'm.id', '=', 'v.id_mapel')
            ->where(['v.id_kategori' => $id, 'v.hapus' => 0])
            ->select('v.*', 'v.gambar', 'm.nama_mapel')
            ->get();

        return view('blog', ["id" => $id, "kelas" => $kelas, "video" => $video]);
    }
}
