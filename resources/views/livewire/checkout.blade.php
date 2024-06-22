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
                    Checkout Pesanan
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
        <div class="card text-center">
          <div class="card-header" style="color: white;background: #5f492f;">
            Informasi Pemesanan
          </div>
          <div class="card-body">
            <div class="form-group mb-3 text-left">
              <label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
              <input type="text" class="form-control" value="{{auth()->user()->name}}" id="" disabled>
            </div>
            <div class="form-group mb-3 text-left">
              <label for="exampleFormControlInput1" class="form-label">Nomor HP</label>
              <input type="text" class="form-control" value="{{auth()->user()->phone}}" id="" disabled>
            </div>
            <div class="form-group mb-3 text-left">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="text" class="form-control" value="{{auth()->user()->email}}" id="" disabled>
            </div>
            <hr />
            <div class="form-group mb-3 text-left">
              <label for="exampleFormControlInput1" class="form-label">Tanggal Pemesanan</label>
              <input type="datetime-local" wire:model.live="date_order" class="form-control" id="" />
            </div>
            <div class="form-group mb-3 text-left">
              <label for="exampleFormControlInput1" wire:model.live="type" class="form-label">Tipe Pesanan</label>
              <select wire:model.live="type" class="form-control" id="">
                <option value="" selected></option>
                <option value="pickup">Diambil sendiri</option>
                <option value="delivery">Kirim</option>
              </select>
            </div>
            @if ($type == 'pickup')
            <div class="form-group mb-3 text-left">
              <label for="exampleFormControlInput1" class="form-label">Tanggal Pengambilan</label>
              <input type="datetime-local" wire:model.live="date_pickup" class="form-control" id="" />
            </div>
            @endif
            <div class="form-group mb-3 text-left">
              <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
              <textarea class="form-control" id="" wire:model.live="address" rows="5"></textarea>
            </div>
            @if ($type == 'delivery')
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="text-align: left">Driver</th>
                  <th scope="col">#</th>
                </tr>
              </thead>
              <tbody>
                @foreach (\App\Models\User::whereRole('driver')->get() as $row)
                <tr x-data>
                  <th scope="row" style="width: 100%;">
                    <div class="d-flex align-items-center">
                      <img src="{{$row->photo ? url('storage/'.$row->photo): 'https://d168wuuhrgvlrj.cloudfront.net/cloudfront/images/avatar/noimage.jpg'}}" alt="" srcset="" style="width: 34px;height: 34px;" />
                      <div class="ml-2">{{$row->name}}</div>
                    </div>
                  </th>
                  <td>
                    @if ($driver_id == $row->id)
                    <span class="badge badge-success">Selected</span>
                    @else
                    <button class="btn btn-xs btn-primary" type="button" @click="$wire.selectDriver({{$row->id}})">Pilih Driver</button>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-header" style="color: white;background: #5f492f;">
            Informasi Produk
          </div>
          <div class="card-body">
            <div>
              @foreach (auth()->user()->carts as $row)
              <div class="d-flex align-items-center justify-content-between">
                <div>{{$row->product->name}} (x{{$row->quantity}})</div>
                <div>Rp. {{number_format($row->product->price * $row->quantity)}}</div>
              </div>
              @endforeach
              <hr />
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
            <button type="button" class="
            btn btn-block btn-primary
            @if(!$type)
            disabled
            @endif
            "
            @if ($type)
            wire:click="checkout"
            @endif
            >
              Checkout
            </button>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
