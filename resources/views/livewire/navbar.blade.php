<nav class="navbar navbar-expand-lg navbar-dark" style="border-radius: 0;z-index: 999;">
  <style>
    .navbar-dark .navbar-nav .nav-link {
      color: #5f492f;
    }
  </style>
  <div class="container my-4" style="background: #d19f67;border-radius: 8px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-0 w-100">
        <li class="nav-item w-100 text-center" style="font-size: 18px;">
          <a href="{{url('/')}}" class="nav-link" wire:navigate>
            Home
          </a>
        </li>
        @if (auth()->check() && auth()->user()->role == 'driver')

        @else
          <li class="nav-item w-100 text-center" style="font-size: 18px;">
            <a href="{{url('product')}}" wire:navigate class="nav-link" style="">Produk</a>
          </li>
          @if ((auth()->check() && auth()->user()->role != 'admin') || !auth()->check())
          <li class="nav-item w-100 text-center" style="font-size: 18px;">
            <a class="nav-link" style=""
            @if (auth()->check() && auth()->user()->role != 'driver')
            href="{{url('/cart')}}"
            wire:navigate
            @else

            {{-- @click="$('#auth-modal').modal('show')" --}}
            href="{{url('login')}}"

            @endif
            >Keranjang</a>
          </li>

          @endif
        @endif
        @auth
          @if (auth()->user()->role != 'driver')
            @if (auth()->check() && auth()->user()->role == 'admin')
            {{--
            <li class="nav-item w-100 text-center" style="font-size: 18px;">
              <a href="{{url('/outlet')}}" class="nav-link" wire:navigate>
                Outlet
              </a>
            </li>
            --}}
            @endif
            <li class="nav-item w-100 text-center" style="font-size: 18px;">
              <a href="{{url('transaction')}}" class="nav-link" style="" wire:navigate>Pemesanan</a>
            </li>
          @endif
          @if (auth()->check() && auth()->user()->role == 'driver')
          <li class="nav-item w-100 text-center" style="font-size: 18px;">
            <a href="{{url('riwayat-pengiriman')}}" class="nav-link" style="" wire:navigate>Riwayat Pengiriman</a>
          </li>
          @else
          @if (auth()->check() && auth()->user()->role == 'admin')
          <li class="nav-item w-100 text-center" style="font-size: 18px;">
            <a href="{{url('laporan')}}" class="nav-link" style="" wire:navigate>Laporan</a>
          </li>
          <li class="nav-item w-100 text-center" style="font-size: 18px;">
            <a href="{{url('user')}}" wire:navigate class="nav-link" style="">User</a>
          </li>
          @endif
          <li class="nav-item w-100 text-center" style="font-size: 18px;">
            <a href="{{url('message')}}" wire:navigate class="nav-link" style="">Kirim Pesan</a>
          </li>
          @endif
        @endauth
        <li class="nav-item w-100 text-center">
          @if(!auth()->check())

          <a href="{{url('login')}}"
          {{-- data-target="#auth-modal" data-toggle="modal"  --}}
          class="nav-link colormenu2 px-4 py-2 btn-auth" style="
          font-size: 24px;
          font-weight: bold;
          border: 2px solid #5f492f;
          margin-top: 8px;
          ">Login | Daftar</a>

          @endif

          @auth
          <div class="dropdown">
            <button class="btn dropdown-toggle"
            style="
            color: #5f492f;
            background: transparent;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid #5f492f;
            margin-top: 1px;
            "
            type="button" data-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </button>
            <div class="dropdown-menu" style="left: 23%;">
              <a class="dropdown-item" href="{{url('profile')}}" wire:navigate>Profile</a>
              <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
            </div>
          </div>
          @endauth
        </li>
      </ul>
    </div>
  </div>
</nav>
