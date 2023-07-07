@extends('layout')

@section('content')

@php
    $id = session('id_kelas');
    $kelas = DB::table('kategori')->where(['id' => $id, 'hapus' => 0])->first();
    $video = DB::table('video as v')
    ->join('mapel as m', 'm.id', '=', 'v.id_mapel')
    ->where(['v.id_kategori' => $id, 'v.hapus' => 0])
    ->select('v.*', 'v.gambar', 'm.nama_mapel')
    ->get();




@endphp
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    @if (session()->has('id_kelas'))
                        <h2>Kelas {{ $kelas->nama_kategori }}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($video as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                <img src="{{ asset('foto_vendor/'.$data->gambar) }}" alt="" />

                <!-- <video width="320" height="240" poster="{{ asset('foto_vendor/'.$data->video) }}" controls>
                <source src="{{ asset('foto_vendor/'.$data->video) }}" type="video/mp4">
                Your browser does not support the video tag.
                </video> -->

                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                {{$data->nama_mapel}}
                            </div>
                            @php
                                $komentar_count = DB::table('komentar')
                                ->where('id_video', $data->id)
                                ->count();
                            @endphp
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                {{$komentar_count}}
                            </div>
                        </div>
                        <a href="{{url('/detail/'.$data->id)}}">
                            <h4>{{$data->judul}}</h4>
                        </a>
                        <p>{{$data->deskripsi}} </p>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
  </section>
@endsection
