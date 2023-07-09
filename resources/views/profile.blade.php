@extends('layout')

@section('content')

<section class="container mt-4 mb-4 profile-section">
    <div class="border rounded my-4">
        <h1 class="text-center my-2" style="font-size: 3rem">SD NEGERI 3 SINDUREJO</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 col-12">
            <h3 class="my-2 bg-info" style="padding: 5px 10px">DATA PROFILE SEKOLAH</h3>
            <table class="data-sekolah" style="padding: 5px 10px">
                <tr>
                    <th>Nama Lembaga:</th>
                    <td>SD NEGERI 3 SINDUREJO</td>
                </tr>
                <tr>
                    <th>Alamat:</th>
                    <td>
                        Jalan Raya Banjarsari 105, Desa Sindurejo, Kecamatan Gedangan, Kabupaten Malang 65178
                    </td>
                </tr>
                <tr>
                    <th>Telepon:</th>
                    <td>
                        081555482414
                    </td>
                </tr>
            </table>
        </div>
        <div class="identitas-sekolah col-sm-6 col-12">
            <h3 class="my-2 bg-info" style="padding: 5px 10px">IDENTITAS SEKOLAH</h3>
            <table class="data-sekolah">
                <tr>
                    <th>Status Sekolah</th>
                    <td>NEGERI</td>
                </tr>
                <tr>
                    <th>NPSN</th>
                    <td>20516936</td>
                </tr>
                <tr>
                    <th>NSS</th>
                    <td>101058300228</td>
                </tr>
                <tr>
                    <th>Status Akreditasi</th>
                    <td>Terakreditasi A</td>
                </tr>
                <tr>
                    <th>SK Pendirian Sekolah </th>
                    <td>12 Juni 2017</td>
                </tr>
                <tr>
                    <th>SK Izin Operasional </th>
                    <td>12 Januari 2017</td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <div class="col-sm-6 col-12 mt-4">
            <h3 class="my-2 bg-info" style="padding: 5px 10px">Data Peserta Didik</h3>
            <table class="data-sekolah">
                <tr>
                    <th>Kelas 1 = </th>
                    <td>16 Siswa</td>
                </tr>
                <tr>
                    <th>Kelas 2 = </th>
                    <td>21 Siswa</td>
                </tr>
                <tr>
                    <th>Kelas 3 = </th>
                    <td>
                        27 Siswa
                    </td>
                </tr>
                <tr>
                    <th>Kelas 4 = </th>
                    <td>18 Siswa</td>
                </tr>
                <tr>
                    <th>Kelas 5 = </th>
                    <td>23 Siswa</td>
                </tr>
                <tr>
                    <th>Kelas 6 = </th>
                    <td>
                        14 Siswa
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
@endsection