<div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-md-12">
            <div style="margin: 55px 0 25px 0;" class="text-center">
              <div style="background-image: url('{{url('/base')}}/images/mkiri.png'); background-size: cover;" class="displainlinetop plepet"></div>
              <div style="background-image: url('{{url('/base')}}/images/mtengah.png');text-transform: uppercase; " class="displainlinetop productselec">
                <div class="tempatpaddingtexthome" style="text-transform: uppercase;">
                  <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation">
                    <img src="{{url('/base')}}/images/titik.png" class="titikselect">
                  </div>
                  <div data-appear-animation="fadeInDown" class="displainlinetop productselec appear-animation" style="text-transform: uppercase; font-family:veneer;  color:#ac8b58;opacity: 1;">
                    Keranjang
                  </div>
                  <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation">
                    <img src="{{url('/base')}}/images/titik.png" class="titikselect">
                  </div>
                </div>
              </div>
              <div style="background-image: url('{{url('/base')}}/images/mkanan.png'); " class="displainlinetop plepet"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin:20px 0 20px 0;">
        <div class="card text-center">
          <div class="card-header" style="color: white;background: #5f492f;">
            Informasi Pemesanan
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>Nama: </div>
                    <div>{{auth()->user()->name}}</div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>Email: </div>
                    <div>{{auth()->user()->email}}</div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>Nomor HP: </div>
                    <div>{{auth()->user()->phone}}</div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div>Alamat Pengiriman: </div>
                    <div>
                      @if (auth()->user()->address)
                      {{auth()->user()->address}}
                      @else
                      <span style="color: red;">Alamat Belum diisi silahkan tambahkan alamat terlebih dahulu.</span><br />
                      <a href="{{url('profile')}}">Edit Alamat</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Produk</th>
              <th scope="col">Outlet</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach (auth()->user()->carts as $row)
            <tr x-data>
              <th scope="row">#{{$row->id}}</th>
              <td>
                {{$row->product->name}}
              </td>
              <td>
                {{$row->product->outlet->name}}
              </td>
              <td>
                <input x-ref="quantity" class="form-control" value="{{$row->quantity}}">
              </td>
              <td>Rp. {{number_format($row->product->price)}}</td>
              <td>
                <button class="btn btn-xs btn-primary" type="button" @click="$wire.updateQuantity({{$row->id}}, $refs.quantity.value)">Update</button>
                <button class="btn btn-xs btn-danger" type="button" @click="$wire.deleteCart({{$row->id}})">Hapus</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-header" style="color: white;background: #5f492f;">
            Informasi
          </div>
          <div class="card-body">
            <div>
              <div class="d-flex align-items-center justify-content-between">
                <div>Subtotal: </div>
                @php
                $subtotal = 0;
                foreach (auth()->user()->carts as $row) {
                  $subtotal += ($row->quantity * $row->product->price);
                }
                @endphp
                <div>Rp. {{number_format($subtotal)}}</div>
              </div>
            </div>
          </div>
          <div class="card-footer font-weight-bold">
            <button type="button" class="btn btn-block btn-primary" wire:click="checkout">
              Checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
