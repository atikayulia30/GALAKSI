<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Vendor;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:admin')->except(['login', 'doLogin']);
    }
    //login logout
    function login()
    {
        return view('admin.login');
    }
    function doLogin(Request $request)
    {
        //auth admin

        $cred = array(
            'username' => $request->username,
            'password' => $request->password,
        );
        if (Auth::guard('admin')->attempt($cred)) {
            return redirect('/admin/login')->with(['status' => 1, 'msg' => 'Berhasil Login']);
        } else {
            return redirect('/admin/login')->with(['status' => 1, 'msg' => 'Gagal Login']);
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
    //end login logout

    function index()
    {
        return view('admin.menu.dashboard');
    }

    function kategori()
    {
        $data['kategori'] = DB::table('kategori')->where(['hapus' => 0])->get();
        return view('admin.menu.kategori', $data);
    }
    function mapel()
    {
        $data['mapel'] = DB::table('mapel')->where(['hapus' => 0])->get();
        return view('admin.menu.mapel', $data);
    }
    function mapelInsert(Request $request)
    {
        $nama_mapel = $request->nama_mapel;
        $insert = DB::table('mapel')->insert([
            'nama_mapel' => $nama_mapel,
            'hapus' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($insert) {
            return redirect('/admin/mapel')->with(['status' => 1, 'msg' => 'Berhasil Menambahkan Mata Pelajaran']);
        } else {
            return redirect('/admin/mapel')->with(['status' => 0, 'msg' => 'Gagal Menambahkan Mata Pelajaran']);
        }
    }
    function mapelDetail($id)
    {

        $data = DB::table('mapel')->where(['id' => $id])->first();
        echo json_encode($data);
    }

    function mapelEdit(Request $request)
    {
        $id = $request->id;
        $nama_mapel = $request->nama_mapel;
        $update = DB::table('mapel')->where(['id' => $id])->update([
            'nama_mapel' => $nama_mapel,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/mapel')->with(['status' => 1, 'msg' => 'Berhasil Mengubah Mata Pelajaran']);
        } else {
            return redirect('/admin/mapel')->with(['status' => 2, 'msg' => 'Gagal Mengubah Mata Pelajaran']);
        }
    }

    function mapelHapus(Request $request)
    {
        $id = $request->id;
        $update = DB::table('mapel')->where(['id' => $id])->update([
            'hapus' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/mapel')->with(['status' => 1, 'msg' => 'Berhasil Menghapus Mata Pelajaran']);
        } else {
            return redirect('/admin/mapel')->with(['status' => 2, 'msg' => 'Gagal Menghapus Mata Pelajaran']);
        }
    }


    function kategoriInsert(Request $request)
    {
        $nama_kategori = $request->nama_kategori;
        $insert = DB::table('kategori')->insert([
            'nama_kategori' => $nama_kategori,
            'hapus' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($insert) {
            return redirect('/admin/kategori')->with(['status' => 1, 'msg' => 'Berhasil Menambahkan Kategori']);
        } else {
            return redirect('/admin/kategori')->with(['status' => 2, 'msg' => 'Gagal Menambahkan Kategori']);
        }
    }

    function kategoriDetail($id)
    {

        $data = DB::table('kategori')->where(['id' => $id])->first();
        echo json_encode($data);
    }

    function kategoriEdit(Request $request)
    {
        $id = $request->id;
        $nama_kategori = $request->nama_kategori;
        $update = DB::table('kategori')->where(['id' => $id])->update([
            'nama_kategori' => $nama_kategori,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/kategori')->with(['status' => 1, 'msg' => 'Berhasil Mengubah Kategori']);
        } else {
            return redirect('/admin/kategori')->with(['status' => 2, 'msg' => 'Gagal Mengubah Kategori']);
        }
    }

    function kategoriHapus(Request $request)
    {
        $id = $request->id;
        $update = DB::table('kategori')->where(['id' => $id])->update([
            'hapus' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/kategori')->with(['status' => 1, 'msg' => 'Berhasil Menghapus Kategori']);
        } else {
            return redirect('/admin/kategori')->with(['status' => 2, 'msg' => 'Gagal Menghapus Kategori']);
        }
    }

    function vendor()
    {
        $data['vendor'] = DB::table('vendor')->select(
            'vendor.*',
            'kategori.nama_kategori'
        )->where(['vendor.hapus' => 0])->join(
            'kategori',
            'kategori.id',
            '=',
            'vendor.id_kategori'
        )->get();
        $data['video'] = DB::table('video')->select(
            'video.*',
            'kategori.nama_kategori',
            'mapel.nama_mapel'
        )->where(['video.hapus' => 0])->join(
            'kategori',
            'kategori.id',
            '=',
            'video.id_kategori'
        )->join(
            'mapel',
            'mapel.id',
            '=',
            'video.id_mapel'
        )->get();
        $data['kategori'] = DB::table('kategori')->where(['hapus' => 0])->get();
        $data['mapel'] = DB::table('mapel')->where(['hapus' => 0])->get();
        return view('admin.menu.vendor', $data);
    }


    function vendorInsert(Request $request)
    {
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $deskripsi = Str::of($deskripsi)->stripTags();
        $video = $request->video;
        $gambar = $request->gambar;
        $id_kategori = $request->id_kelas;
        $id_mapel = $request->id_mapel;

        // Validasi gambar
        $gambar_validator = Validator::make($request->all(), [
            'gambar' => 'image|mimes:jpeg,png,jpg|max:1048',
        ]);
        if ($gambar_validator->fails()) {
            return redirect('/admin/vendor')->with(['status' => 2, 'msg' => 'Error Validasi Gambar']);
        }

        // Upload file gambar
        if ($gambar) {
            $file = $request->file('gambar');
            $nama_file_gambar = time() . "_" . $gambar->getClientOriginalName();
            $tujuan_upload_gambar = 'foto_vendor';
            $gambar->move($tujuan_upload_gambar, $nama_file_gambar);
        } else {
            return redirect('/admin/vendor')->with(['status' => 2, 'msg' => 'Error Upload File Gambar']);
        }

        // Validasi video
        $validator = Validator::make($request->all(), [
            'video' => 'required',
        ]);
        //    if ($validator->fails()) {
        //        return redirect('/admin/vendor')->with(['status' => 2 , 'msg' => 'Error Validasi Video']);
        //    }

        // Upload file video
        $file = $request->file('video');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'foto_vendor';
        if ($stored = $file->storePubliclyAs($tujuan_upload, $nama_file)) {
            $videoFilePath = $stored;
        } else {
            return redirect('/admin/vendor')->with(['status' => 2, 'msg' => 'Error Upload File Video']);
        }

        $insert = DB::table('video')->insert([
            'judul' => $judul,
            'id_kategori' => $id_kategori,
            'id_mapel' => $id_mapel,
            'video' => $videoFilePath,
            'gambar' => $nama_file_gambar, // Simpan nama file gambar ke database
            'deskripsi' => $deskripsi,
            'hapus' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($insert) {
            return redirect('/admin/vendor')->with(['status' => 1, 'msg' => 'Berhasil Menambahkan Video']);
        } else {
            return redirect('/admin/vendor')->with(['status' => 2, 'msg' => 'Gagal Menambahkan Video']);
        }
    }


    function vendorDetail($id)
    {

        $data = DB::table('video')->where(['id' => $id])->first();
        echo json_encode($data);
    }
    function vendorEdit(Request $request)
    {
        try {
            $id = $request->id;
            $data_update = [
                'judul' => $request->judul,
                'id_mapel' => $request->id_mapel,
                'id_kategori' => $request->id_kategori,
                'deskripsi' => Str::of($request->deskripsi)->stripTags(),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($request->hasFile('video')) {
                $request->validate([
                    'video' => 'required|mimes:mp4,avi,wmv,mov|max:102400',
                ]);

                $file = $request->file('video');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'foto_vendor';

                if ($file->move($tujuan_upload, $nama_file)) {
                    $data_update['video'] = $nama_file;
                }
                //end upload file
            }

            $update = DB::table('video')->where(['id' => $id])->update($data_update);

            if ($update) {
                return redirect('/admin/vendor')->with(['status' => 1, 'msg' => 'Berhasil Mengubah Video']);
            } else {
                throw new \Exception('Gagal mengubah data.');
            }
        } catch (\Exception $e) {
            return redirect('/admin/vendor')->with(['status' => 2, 'msg' => $e->getMessage()]);
        }
    }

    function vendorHapus(Request $request)
    {
        $id = $request->id;
        $update = DB::table('video')->where(['id' => $id])->update([
            'hapus' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if ($update) {
            return redirect('/admin/vendor')->with(['status' => 1, 'msg' => 'Berhasil Menghapus Video']);
        } else {
            return redirect('/admin/vendor')->with(['status' => 2, 'msg' => 'Gagal Menghapus Video']);
        }
    }

    function pesanan()
    {
        $pesanan = DB::table('pesanan')->select(
            'pesanan.*',
            'vendor.nama_vendor',
            'users.name'
        )->join(
            'vendor',
            'vendor.id',
            '=',
            'pesanan.id_vendor'
        )->join(
            'users',
            'users.id',
            '=',
            'pesanan.id_user'
        )->get();
        return view('admin.menu.pesanan', ['pesanan' => $pesanan]);
    }

    function profile()
    {
        $data['user'] = DB::table('admin')->first();
        return view('admin.menu.user_profile', $data);
    }
    function profileEdit(Request $request)
    {
        $data_update = [
            'name' => $request->nama,
        ];
        if ($request->password != '') {
            $data_update['password'] = Hash::make($request->password);
        }
        $update = DB::table('admin')->where(['id' => 1])->update($data_update);
        if ($update) {
            return redirect('/admin/profile')->with(['status' => 1, 'msg' => 'Berhasil Mengubah Profile']);
        } else {
            return redirect('/admin/profile')->with(['status' => 2, 'msg' => 'Gagal Mengubah Profile']);
        }
    }

    function user()
    {
        $data['user'] = DB::table('users')->get();
        return view('admin.menu.user', $data);
    }
}
