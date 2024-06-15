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
                    Transaksi
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
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Produk</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Driver</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $row)
          <tr>
            <th scope="row">#{{$row->id}}</th>
            <th scope="row">
              {{$row->detailProducts()->first()->product->name}}<br />
              @if ($row->detailProducts()->count() > 1)
              <div>+{{$row->detailProducts()->count() - 1}} Produk</div>
              @endif
            </th>
            <td>{{\Carbon\Carbon::parse($row->created_at)->format('d, F Y H:i:s')}}</td>
            <td>Rp. {{number_format($row->total)}}</td>
            <td >
              @if (auth()->user()->role == 'admin')
              <select id="" @change="$wire.changeStatus({{$row->id}}, $event.target.value)">
                <option @if($row->status == 'pending') selected @endif value="pending">Pending</option>
                <option @if($row->status == 'waiting') selected @endif value="waiting">Waiting</option>
                <option @if($row->status == 'confirmed') selected @endif value="confirmed">Confirmed</option>
                <option @if($row->status == 'settlement') selected @endif value="settlement">Settlement</option>
              </select>
              @else
                @if ($row->status == 'settlement')
                <div class="badge badge-success">{{$row->status}}</div>
                @else
                <div class="badge badge-info">{{$row->status}}</div>
                @endif
              @endif
            </td>
            <td>
              @if (auth()->user()->role == 'admin')
              <select id="" @change="$wire.changeCourier({{$row->id}}, $event.target.value)">
                <option value="" disabled selected>-- Pilih Kurir --</option>
                @foreach (\App\Models\User::whereRole('driver')->get() as $rowCourier)
                <option value="{{$rowCourier->id}}" @if($row->courier_id == $rowCourier->id) selected @endif>{{$rowCourier->name}}</option>
                @endforeach
              </select>
              @else
                @if ($row->courier)
                {{$row->courier->name}}
                @else
                (Belum Diassign)
                @endif
              @endif
            </td>
            <td>
              <div style="width: 250px;">
                {{$row->user->address}}
              </div>
            </td>
            <td>
              <a class="btn btn-sm btn-secondary" style="background: #5f492f;" target="_blank" href="{{url('invoice-detail/'.$row->id)}}">Lihat Detail</a>
              @if ($row->status == 'pending' && auth()->user()->role != 'admin')
              <a class="btn btn-sm btn-secondary" style="background: #5f492f;" href="{{url('invoice-detail/'.$row->id)}}" wire:navigate>Bayar</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
