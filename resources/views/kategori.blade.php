@extends('layout')

@section('content')

@php
    // Ambil id kategori dari URL
    $id = request()->segment(count(request()->segments()));

    // Ambil data kategori dari database berdasarkan id
    $kategori = DB::table('kategori')->where(['id' => $id, 'hapus' => 0])->first();

    // Ambil data vendor dari database yang terkait dengan kategori yang dipilih
    $vendor = DB::table('vendor')->where(['id_kategori' => $id, 'hapus' => 0])->get();
@endphp

<section class="women-banner spad">
  <div class="filter-control">
    <ul>
      <li class="active">{{$kategori->nama_kategori}}</li>
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
</section>

@endsection
