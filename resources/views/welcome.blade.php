@extends('layout')

@section('content')

<section class="jumbotron jumbotron-fluid landing-page">
  <div class="container d-flex justify-content-center align-items-center flex-wrap ">
    <div class="content d-flex justify-content-center flex-wrap">
      <h1 style="font-size:50px;" class="font-weight-bold title text-center">GALAKSI</h1>
      <p style="color:white;font-size:20px;" class="text-center description">
        Website ini merupakan web lokal yang digunakan sebagai media pembelajaran di Sekolah Dasar Negeri 3 Sindurejo,
        Kecamatan Gedangan, Kabupaten Malang. Pada website ini berisi video pembelajaran yang dapat digunakan siswa
        untuk mempelajari kembali materi pembelajaran sesuai kurikulum yang digunakan.
      </p>

    </div>
    <div class="bg-red d-flex justify-content-center" style="margin-top: 15px;">
      <a href="{{route("mapel.list")}}" class="primary-btn text-center" style="margin-top:10px;">Lihat</a>
    </div>

  </div>
</section>
@endsection