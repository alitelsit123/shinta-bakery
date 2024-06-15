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
                Nama: {{$transaction->user->name}}<br>
                Email: {{$transaction->user->email}}<br>
                Nomor HP: {{$transaction->user->phone}}<br>
                Alamat: {{$transaction->user->address}}
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
                <div>Invoice - #{{$transaction->id}}</div>
                <div>{{$transaction->created_at->format('d, F Y H:i:s')}}</div>
                <div class="
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
          <div class="col-12">
            @if ($transaction->status == 'settlement')
            <div class="alert alert-success">Pesanan sudah diterima, terimakasih</div>
            @else
            <button class="btn btn-success btn-block mt-2">Tandai Sudah Diterima Pelanggan</button>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Row end -->
    @empty
    <h2 style="text-align: center;">Belum ada pesanan.</h2>
    @endforelse
  </div>
</div>
