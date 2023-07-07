@extends('layout')

@php

@endphp

@section('content')

<section class="women-banner spad">
  <div class="container-fluid">
      <div class="row">
            <div class="col-lg-12 ">
                <div class="filter-control">
                    <ul>
                        <!-- <li class="active">Clothings</li> -->
                        <li class="active">Pencarian</li>
                        
                    </ul>
                </div>
                @if(count($video) == 0)
                    <center>Video Tidak Ditemukan</center>
                @else
               <div class="container-fluid">
                <div class="row">
                @foreach ($video as $data)
                    <div class="col-lg-4">
                    <div class="card p-3" style="height: 400px; display: flex; flex-direction: column; justify-content: space-between;">
                        <div style="margin-top:25px;height: 150px; overflow: hidden;">
                        <img src="{{ asset('foto_vendor/ikon.png') }}" style="object-fit: cover; height: 100%;width:100%;">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                        <span>{{$data->judul}}</span>
                        <div class="colors">
                        </div>
                        </div>
                        <p>{{ substr(strip_tags($data->deskripsi), 0, 100) }}{{ strlen(strip_tags($data->deskripsi)) > 100 ? "..." : "" }}</p>

                        <a href="{{url('/blog/'.$data->id)}}" class="primary-btn"style="text-align:center;">Lihat</a>
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
                @endif
            </div>
      </div>
  </div>
</section>

@endsection
