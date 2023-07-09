@extends('layout')

@section('content')

<section class="latest-blog spad matapelajaran">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around align-items-center flex-wrap" style="min-height: 500px">
            @foreach ($mapels as $mapel)
            <div class="btn btn-warning mapel border shadow rounded-lg p-5 position-relative col-12 col-md-3 text-justify">
                <h3 class="h-4 bd-highlight text-center">{{ $mapel->nama_mapel }}</h3>
                <a href="{{ route("pelajaran.index", ["mapel" => $mapel->id]) }}" class="stretched-link"></a>
            </div>

            @endforeach
        </div>
    </div>
</section>
@endsection