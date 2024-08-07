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
                    Pesanan Berjalan
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
    @forelse (\App\Models\Transaction::whereCourier_id(auth()->id())->whereIn('status', ['confirmed','waiting'])->get() as $transaction)
    <!-- Row start -->
    <div class="card">
      <div class="card-body">
        <div class="row gutters">
          <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="invoice-details d-flex justify-content-between p-4">
              <address style="font-size: 18px;">
                Nama: {{$transaction->user->name ?? ''}}<br>
                Email: {{$transaction->user->email ?? ''}}<br>
                Nomor HP: {{$transaction->user->phone ?? ''}}<br>
                Alamat: {{$transaction->delivery_address}}
                Catatan: {{$transaction->note}}
              </address>
              @if (in_array($transaction->status, ['pending','waiting']))
                <div style="font-weight: bold;">
                  @if ($transaction->status == 'pending')
                  PESANAN DIBUAT PADA
                  <span style="font-size: 24px; color: red;display: block;">
                    {{\Carbon\Carbon::parse($transaction->created_at)->format('d, F Y H:i:s')}}
                  </span>
                  @else
                  MENUNGGU DIKONFIRMASI ADMIN
                  {{-- <span style="font-size: 24px; color: red;display: block;">
                    {{\Carbon\Carbon::parse($transaction->created_at)->format('d, F Y H:i:s')}}
                  </span> --}}
                  @endif
                </div>
              @elseif (!in_array($transaction->status, ['pending','waiting']))
                <div style="font-weight: bold;">
                  @if ($transaction->status == 'confirmed')
                  {{-- PERKIRAAN TIBA
                  <span style="font-size: 24px; color: red;display: block;">
                    @if ($transaction->estimation && $transaction->estimation_type == 'minute')
                    {{\Carbon\Carbon::parse($transaction->created_at)->addMinutes($transaction->estimation)->format('d, F Y H:i:s')}}
                    @else
                    {{\Carbon\Carbon::parse($transaction->created_at)->addHours($transaction->estimation)->format('d, F Y H:i:s')}}
                    @endif
                  </span> --}}
                    <div class="mb-2">Pesanan dikonfirmasi</div>
                    <div class="mb-2">Pesanan akan dikirim segera.</div>
                    @if ($transaction->courier)
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center">
                          <img src="{{$transaction->courier->photo}}" alt="" srcset="" style="width: 50px;height: 50px; border-radius: 999px;" />
                          <div class="ml-2">
                            <div>{{$transaction->courier->name}}</div>
                            <div>{{$transaction->courier->phone}}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @else
                    <div class="badge badge-danger">(Kurir belum di input)</div>
                    @endif
                  @else
                  Diterima Pada
                  <span style="font-size: 24px; color: green;display: block;">
                    {{\Carbon\Carbon::parse($transaction->updated_at)->format('d, F Y H:i:s')}}
                  </span>
                  <hr />
                  Pesanan Selesai
                  @endif
                </div>
              @endif
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="invoice-details" style="font-size: 18px;">
              <div class="invoice-num">
                <div style="font-size: 14px;">Invoice - #{{$transaction->id}}</div>
                <div style="font-size: 14px;">Tanggal Pemesanan {{$transaction->created_at->format('d, F Y H:i:s')}}</div>
                <div style="font-size: 14px;">Tanggal Pengiriman {{\Carbon\Carbon::parse($transaction->date_pickup)->format('d, F Y H:i:s')}}</div>
                <hr />
                <div style="font-size: 14px;" class="
                badge
                @if(in_array($transaction->status, ['pending','waiting']))
                badge-warning
                @else
                badge-success
                @endif
                ">{{$transaction->status}}</div>
                <div style="line-height: 100%;">
                  @if ($transaction->status == 'pending')
                  <small style="line-height: 0;color: red;">Transaksi pending, silahkan bayar terlebih dahulu.</small>
                  @elseif($transaction->status == 'waiting')
                  <small style="color: green;">Pembayaran berhasil, silahkan tunggu pesanan dikonfirmasi.</small>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 px-5">
            @if ($transaction->status == 'settlement')
            <div class="alert alert-success">Pesanan sudah diterima, terimakasih</div>
            @else
            <h4>Diterima Oleh ?</h4>
            <textarea id="" rows="3" wire:model.live="deliveredto" class="form-control"></textarea>
            <button class="btn btn-success btn-block mt-2" wire:click="finishConfirmation({{$transaction->id}})">Tandai Sudah Diterima Pelanggan</button>
            @endif
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="invoice-body">
          <!-- Row start -->
          <div class="row gutters">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="table-responsive">
                <table class="table custom-table m-0">
                  <thead>
                    <tr>
                      <th>Gambar</th>
                      <th style="width: 60%;">Nama</th>
                      {{-- <th>Outlet</th> --}}
                      <th>Jumlah</th>
                      <th>Sub Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($transaction->detailProducts as $row)
                    <tr>
                      <td>
                        <img src="{{url('storage/'.$row->product->image)}}" alt="" srcset="" style="width: 40px; height: 40px;" />
                      </td>
                      <td>

                        <p class="m-0 text-muted">
                          {{$row->product->name}}
                        </p>
                      </td>
                      {{-- <td>{{$row->product->outlet->name}}</td> --}}
                      <td>{{$row->quantity}}</td>
                      <td>{{number_format($row->quantity * $row->price)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="4">
                        <div class="d-flex align-items-end justify-content-end">
                          <div class=" p-2">
                            <p>
                              Sub Total<br>
                            </p>
                            <h5 class=""><strong>Total</strong></h5>
                          </div>
                          <div class=" p-2">
                            <p class=""><strong>Rp. {{number_format($transaction->subtotal)}}</strong></p>
                            <h5 class=""><strong>Rp. {{number_format($transaction->total)}}</strong></h5>
                          </div>
                        </div>
                        @if ($transaction->status != 'pending')
                        <div class="d-flex justify-content-end">
                          <button class="btn btn-default" style="font-weight: bold;color: #28a745;">SUDAH DIBAYAR</button>
                        </div>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Row end -->
        </div>
      </div>
    </div>
    <!-- Row end -->
    @empty
    <h2 style="text-align: center;">Belum ada pesanan.</h2>
    @endforelse
  </div>
</div>
