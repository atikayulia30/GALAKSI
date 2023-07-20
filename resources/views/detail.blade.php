@extends('layout')

@section('content')
<div class="site-section" data-aos="fade">
  <div class="container-fluid">

    <div class="row justify-content-center">

      <div class="col-md-7">
        <div class="row mb-5">
          <div class="col-12 ">
            <h2 class="site-section-heading text-center" style="margin-top:10px;">{{$video->judul}}</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-md-7">
        <video width="640" height="360" controls>
          <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="col-md-4">
        <p>{{strip_tags($video->deskripsi)}}</p>
      </div>
    </div>
    <div>
      <a href="{{ route("download_materi", ['file_path' => $video->materi_path]) }}" class="btn btn-warning">Unduh
        PDF</a>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <h5 class="card-title">Komentar</h5>
        <hr>
        <!-- Form komentar -->
        @csrf
        <form method="POST" action="{{ url('/komentar') }}">
          @csrf
          <div class="form-group">
            <label for="name">Nama</label>
            @if (session('user'))
            <input type="text" class="form-control" name="name" value="{{ session('user_name') }}" readonly>
            @endif
          </div>
          <div class="form-group">
            <label for="comment">Komentar</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
          </div>
          <input type="hidden" name="video_id" value="{{ $video->id }}">
          <button type="submit" class="primary-btn">Kirim Komentar</button>
        </form>

        <hr>
        <!-- Daftar komentar -->
        @foreach ($komentars as $komentar)
        <div class="media mt-3">
          <img class="mr-3" src="{{ asset('foto_vendor/profile.png') }}" alt="User Avatar" width="64" height="64">
          <div class="media-body">
            <h5 class="mt-0">{{ $komentar->nama }}</h5>
            <p>{{ $komentar->komentar }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-4 ml-auto">
    </div>
  </div>



</div>
</div>
<div class="footer py-4">
  <div class="container-fluid text-center">
    <p>
    </p>
  </div>
</div>
</div>
@endsection