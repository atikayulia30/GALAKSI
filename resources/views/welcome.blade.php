@extends('layout')

@section('content')

@php
    $kategori = DB::table('kategori')->where(['hapus' => 0])->get();
    $vendor = DB::table('vendor')->where(['hapus' => 0])->get();
    $premium = DB::table('vendor')->where(['jenis_vendor' => 2])->get();
@endphp

<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="{{ asset('foto_vendor/background.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span  style="font-size:50px;">GALAKSI</span> 
                        <h1 style="color:white;font-size:20px;">Website resmi Desa Sindurejo yang menawarkan fitur komunikasi dan pembelajaran menggunakan jaringan intranet (lokal)</h1>
                        <a href="{{url('/blog')}}" class="primary-btn" style="margin-top:10px;">Lihat</a>
                    </div>
                 <div class="ikon">
                  <img src="{{asset('foto_vendor/ikon.png')}}" alt="">
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="women-banner spad">
  <div class="filter-control">
    <ul>
      <li class="active">All Vendor</li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="row">
      @foreach ($vendor as $data)
        <div class="col-lg-4">
          <div class="card p-3" style="margin-top:25px;height: 400px; display: flex; flex-direction: column; justify-content: space-between;">
            <div style="height: 150px; overflow: hidden;">
              <img src="{{ asset('foto_vendor/'.$data->foto) }}" style="object-fit: cover; height: 100%;width:100%;">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
              <span>{{$data->nama_vendor}}</span>
              <div class="colors">
              </div>
            </div>
            <p>{{ substr(strip_tags($data->paket), 0, 100) }}{{ strlen(strip_tags($data->paket)) > 100 ? "..." : "" }}</p>

            <p>{{$data->alamat}}</p>
            <p><b>Rp.{{$data->harga}}</b></p>
            <a href="{{url('/detail/'.$data->id)}}" class="primary-btn"style="text-align:center;">Lihat</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section> -->

@endsection
