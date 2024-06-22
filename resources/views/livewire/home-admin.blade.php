<div class="container" style="margin-top: 19px;">
  <style>
    .table .thead-dark th {
      background-color: #5f492f;
      border-color: #5f492f;
    }
  </style>
  <div class="" style="margin: 30px 0 45px 0;">
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
                    Dashboard
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
  <hr class="mb-4" />
  <div class="d-flex align-items-stretch justify-content-center" style="column-gap: 1rem;">
    <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-center font-weight-bold"
      style="
      color: #5f492f;
      background: white!important;
      font-size: 18px;
      "
      >Welcome</div>
      <div class="card-body text-secondary text-center"
      style="
      display: flex;
      flex-direction: column;
      justify-content: center;
      "
      >
        <h5 class="card-title text-center">{{auth()->user()->name}}</h5>
        <p class="card-text text-center">Update Profile</p>
      </div>
    </div>
    <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-center font-weight-bold"
      style="
      color: #5f492f;
      background: white!important;
      font-size: 18px;
      "
      >{{\App\Models\Product::count()}}</div>
      <div class="card-body text-secondary text-center"
      style="
      display: flex;
      flex-direction: column;
      justify-content: center;
      "
      >
        <h5 class="card-title text-center">Total Produk</h5>
        <a class="card-text text-center" href="{{url('product')}}" wire:navigate>View Produk</a>
      </div>
    </div>
    <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-center font-weight-bold"
      style="
      color: #5f492f;
      background: white!important;
      font-size: 18px;
      "
      >{{\App\Models\Transaction::whereIn('status',['pending','confirmed','waiting'])->count()}}</div>
      <div class="card-body text-secondary text-center">
        <h5 class="card-title text-center">Total Pesanan</h5>
        <a class="card-text text-center" href="{{url('transaction')}}" wire:navigate>View Pesanan</a>
      </div>
    </div>
  </div>
  <div class="d-flex align-items-stretch justify-content-center" style="column-gap: 1rem;">
    <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-center font-weight-bold"
      style="
      color: #5f492f;
      background: white!important;
      font-size: 18px;
      "
      >{{\App\Models\User::count()}}</div>
      <div class="card-body text-secondary text-center"
      style="
      display: flex;
      flex-direction: column;
      justify-content: center;
      "
      >
        <h5 class="card-title text-center">Total User</h5>
        <a class="card-text text-center" href="{{url('user')}}" wire:navigate>View User</a>
      </div>
    </div>
    <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-center font-weight-bold"
      style="
      color: #5f492f;
      background: white!important;
      font-size: 18px;
      "
      >{{\App\Models\Message::count()}}</div>
      <div class="card-body text-secondary text-center"
      style="
      display: flex;
      flex-direction: column;
      justify-content: center;
      "
      >
        <h5 class="card-title text-center">Total Pesan</h5>
        <a class="card-text text-center" href="{{url('message')}}" wire:navigate>View Pesan</a>
      </div>
    </div>
    {{-- <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-center font-weight-bold"
      style="
      color: #5f492f;
      background: white!important;
      font-size: 18px;
      "
      >{{\App\Models\Transaction::whereIn('status',['pending','confirmed','waiting'])->count()}}</div>
      <div class="card-body text-secondary text-center">
        <h5 class="card-title text-center">Total Pesanan</h5>
        <p class="card-text text-center">View Pesanan</p>
      </div>
    </div> --}}
  </div>
  <hr class="mb-4" />
  <h1 class="mb-5 text-center"
  style="
  color: #5f492f;
  ">Pesanan Berlangsung</h1>
  <table class="table mx-auto"
  style="
  max-width: 962px;
  "
  >
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Total Pembayaran</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach (\App\Models\Transaction::whereIn('status', ['pending','waiting','confirmed'])->get() as $row)
      <tr>
        <th scope="row">#{{$row->id}}</th>
        <td>{{\Carbon\Carbon::parse($row->created_at)->format('d, F Y H:i:s')}}</td>
        <td>Rp. {{number_format($row->total)}}</td>
        <td>{{$row->status}}</td>
        <td>
          <a href="{{url('transaction')}}" class="btn btn-sm btn-secondary" style="background: #5f492f;" wire:navigate>Lihat Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
