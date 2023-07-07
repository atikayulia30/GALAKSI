@php
    $kategori = DB::table('kategori')->where(['hapus' => 0])->get();
    $vendor = DB::table('vendor')->where(['hapus' => 0])->get();

@endphp
<header class="header-section">
<!-- header.blade.php -->
<div class="header-top">
    <div class="container">
        <div class="ht-left">
        </div>
        <div class="ht-right">
            @if (session('user'))
                <!-- Session login sudah ter-set, tampilkan menu logout -->
                 
                    @csrf
                    <a href="{{ route('logout') }}" class="login-panel" style="border:0 !important;">
                     <i class="fa fa-user"></i> <span>{{ session('user_name') }}</span>
                    
            @else
                <!-- Session login belum ter-set, tampilkan menu login dan register -->
                <a href="{{ route('login') }}" class="login-panel" style="border:0 !important;">
                    <i class="fa fa-user"></i> Login
                </a>
                <a href="{{ route('register') }}" class="login-panel" style="border:0 !important;">
                    <i class="fa fa-user"></i> Register
                </a>
            @endif
        </div>
    </div>
</div>


            
        </div>
    </div>
    @php
        $link = request()->segment(1);
    @endphp
    @if($link != 'login' && $link != 'register')
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            GALAKSI
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <form action="{{ url('/search') }}">
                        <div class="advanced-search">
                            <div class="input-group" style="max-width:100% !important;">
                                <input type="text" name="cari" placeholder="What do you need?" value="{{ $_GET['cari'] ?? '' }}"/>
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <!-- <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span></span> -->
                    <!-- <ul class="depart-hover">
                    @if(!empty($kategori))
                        @foreach($kategori as $item)
                            <li><a href="{{url('/kategori/'.$item->id)}}">{{$item->nama_kategori}}</a></li>
                        @endforeach
                        @endif


                    </ul> -->
                <!-- </div> -->
            </div>
            <nav class="nav-menu mobile-menu" hidden>
                <ul>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="#">Blog Details</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
    @endif
</header>