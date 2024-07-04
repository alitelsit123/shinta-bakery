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
                    Laporan
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
  <div style="padding: 0 0 80px 0;">
    <div class="container">
      <div>
        <div class="form-group">
          <label for="">Filter Tanggal Transaksi</label>
          <div class="d-flex align-items-center justify-content-center">
            <div style="flex-shrink: 0;" class="mr-4">Tanggal Start</div>
            <input type="datetime-local" wire:model.live="startDate" class="form-control" id="" />
            <div style="flex-shrink: 0;" class="mx-4">Tanggal End</div>
            <input type="datetime-local" wire:model.live="endDate" class="form-control" id="" />
            <button class="btn btn-sm btn-danger ml-4" @click="$wire.set('startDate', '');$wire.set('endDate', '')">Reset</button>
            <button class="btn btn-sm btn-primary ml-2" wire:click="export">Export</button>
          </div>
        </div>
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nama Pemesan</th>
            <th scope="col">Produk</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Tipe Pesanan</th>
            <th scope="col">Tanggal Pengambilan / Pengiriman</th>
            <th scope="col">Driver</th>
            <th scope="col">Alamat</th>
            {{-- <th scope="col">Aksi</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $row)
          <tr>
            <th scope="row">#{{$row->id}}</th>
            <th scope="row">{{$row->user->name}}</th>
            <th scope="row">
              {{$row->detailProducts()->first()->product->name ?? ''}}<br />
              @if ($row->detailProducts()->count() > 1)
              <div>+{{$row->detailProducts()->count() - 1}} Produk</div>
              @endif
            </th>
            <td>{{\Carbon\Carbon::parse($row->date_order)->format('d, F Y H:i:s')}}</td>
            <td>Rp. {{number_format($row->total)}}</td>
            <td >
              @if ($row->status == 'settlement')
              <div class="">{{$row->status}}</div>
              @else
              <div class="">{{$row->status}}</div>
              @endif
            </td>
            <td>{{$row->type == 'pickup' ? 'Ambil Sendiri': 'Dikirim'}}</td>
            <td>{{$row->date_pickup}}</td>
            <td>
              @if ($row->courier)
              {{$row->courier->name}}
              @else
              (Belum Diassign)
              @endif
            </td>
            <td>
              <div style="width: 250px;">
                {{$row->delivery_address ? $row->delivery_address: ($row->user->address ?? '')}}
              </div>
            </td>
            {{-- <td>
              <a class="btn btn-sm btn-secondary" style="background: #5f492f;" target="_blank" href="{{url('invoice-detail/'.$row->id)}}">Lihat Detail</a>
              @if ($row->status == 'pending' && auth()->user()->role != 'admin')
              <a class="btn btn-sm btn-secondary" style="background: #5f492f;" href="{{url('invoice-detail/'.$row->id)}}" wire:navigate>Bayar</a>
              @endif
              @if (auth()->user()->role == 'admin')
              <a class="btn btn-sm btn-secondary" style="background: #5f492f;" href="#" wire:confirm wire:click="delete({{$row->id}})">Hapus</a>
              @endif
            </td> --}}
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
