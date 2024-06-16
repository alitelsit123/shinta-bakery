<div class="navbar-meta navbar navbar-static-top font-cond nav-lg-hidden" role="navigation"
@if (auth()->check() && auth()->user()->role != 'driver')
wire:poll.keep-alive
@endif
>
  <div class="container-fluid" style="text-align:center;">
      <div class="nav navbar-nav">
          <a href="home.html" class="logotengahmuncul jarakataslogo" style="text-transform: uppercase; vertical-align: middle; color: #000; border:0px solid red;">
              <img src="{{url('/base')}}/images/logo.png" style="position: absolute; top: -30px; left: 0; right: 0; margin: auto;" class="logopaskecil"/>
          </a>

          <div class="nav-actions" style="border:0px solid; position:absolute; top:0px; right:0px;">
              <div class="btn-group dropleft">
                <button type="button" class="toggle-menu visible-xs-inline-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{url('/base')}}/images/menu.png">
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{url('/')}}" class="colormenu2" wire:navigate>
                    Home
                  </a>
                  <a class="dropdown-item" href="{{url('product')}}" wire:navigate class="colormenu2" style="">Product</a>
                  @if ((auth()->check() && auth()->user()->role != 'admin') || !auth()->check())
                  <a class="dropdown-item" class="colormenu2" style=""
                  @if (auth()->check())
                  href="{{url('/cart')}}"
                  wire:navigate
                  @else

                  @click="$('#auth-modal').modal('show')"
                  href="#"

                  @endif
                  >Keranjang</a>
                  @endif
                  @if (auth()->check() && auth()->user()->role == 'admin')
                  <a class="dropdown-item" href="{{url('/outlet')}}" class="colormenu2" wire:navigate>
                    Outlet
                  </a>
                  @endif
                  <a class="dropdown-item" href="{{url('transaction')}}" class="colormenu2" style="" wire:navigate>Transaksi</a>
                  @guest
                  <a class="dropdown-item" href="#" data-target="#auth-modal" data-toggle="modal" class="colormenu2 px-4 py-2 btn-auth" style="
                  font-size: 24px;
                  font-weight: bold;
                  border: 2px solid #5f492f;
                  ">Masuk | Daftar</a>
                  @endguest
                  @auth
                  <a class="dropdown-item" href="{{url('profile')}}" wire:navigate>Profile</a>
                  <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                  @endauth
                </div>
              </div>
          </div>

      </div>
      <div class="navbar-nav navbar-left nav-tagline hidden-xs">
      </div>
  </div>
</div>
