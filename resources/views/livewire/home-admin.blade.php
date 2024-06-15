<div class="container" style="margin-top: 19px;">
  <style>
    .table .thead-dark th {
      background-color: #5f492f;
      border-color: #5f492f;
    }
  </style>
  <h1 class="text-center mb-5"
  style="
  color: #5f492f;
  "
  >Dashboard</h1>
  <hr class="mb-4" />
  <div class="d-flex align-items-start justify-content-center" style="column-gap: 1rem;">
    <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-white font-weight-bold"
      style="background: #5f492f;color: white;"
      >Order Baru</div>
      <div class="card-body text-secondary">
        <h5 class="card-title">50</h5>
        <p class="card-text">Lihat Semua</p>
      </div>
    </div>
    <div class="card mb-3" style="
      width: 18rem;
      border-color: #5f492f;
      border-width: 2px;
      ">
      <div class="card-header text-white"
      style="background: #5f492f;color: white;"
      >Pendapatan</div>
      <div class="card-body text-secondary">
        <h5 class="card-title">Rp. 50.000</h5>
        <p class="card-text">Lihat Semua</p>
      </div>
    </div>
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
      @foreach (\App\Models\Transaction::whereIn('status', ['pending','waiting','confirmed']) as $row)
      <tr>
        <th scope="row">#{{$row->id}}</th>
        <td>{{\Carbon\Carbon::parse($row->created_at)->format('d, F Y H:i:s')}}</td>
        <td>Rp. {{number_format($row->total)}}</td>
        <td>{{$row->status}}</td>
        <td>
          <button class="btn btn-sm btn-secondary" style="background: #5f492f;">Lihat Detail</button>
          @if ($row->status == 'pending')
          <a class="btn btn-sm btn-secondary" style="background: #5f492f;" href="{{url('invoice-detail/'.$row->id)}}" wire:navigate>Bayar</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
