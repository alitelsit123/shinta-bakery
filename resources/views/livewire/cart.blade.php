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
      <div class="col-md-8">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Produk</th>
              {{-- <th scope="col">Outlet</th> --}}
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
              {{-- <td>
                {{$row->product->outlet->name}}
              </td> --}}
              <td>
                <input x-ref="quantity" type="number" class="form-control" value="{{$row->quantity}}">
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
        <div class="card">
          <div class="card-header" style="color: white;background: #5f492f;">
            Catatan
          </div>
          <div class="card-body">
            <textarea id="" wire:model.live="note" rows="4" class="form-control">{{$note}}</textarea>
          </div>
        </div>
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
          @if (auth()->check() && auth()->user()->carts()->count() > 0)
          <div class="card-footer font-weight-bold">
            <a href="{{url('checkout')}}" class="btn btn-block btn-primary" wire:navigate>
              Checkout
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
