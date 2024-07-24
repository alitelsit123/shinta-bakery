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
            <input type="date" wire:model.live="startDate" class="form-control" id="" />
            <div style="flex-shrink: 0;" class="mx-4">Tanggal End</div>
            <input type="date" wire:model.live="endDate" class="form-control" id="" />
            <button class="btn btn-sm btn-danger ml-4" @click="$wire.set('startDate', null);$wire.set('endDate', null)">Reset</button>
            <button class="btn btn-sm btn-primary ml-2" wire:click="export">Export</button>
          </div>
        </div>
      </div>
      <hr />
      <div class="d-flex align-items-center justify-content-center w-100" style="column-gap: 1rem;">
        <h4 class="text-center p-2" style="border: 2px solid #003063;">Total Transaksi Rp. {{number_format($list->sum('total'))}}</h4>
        @php
        $productsIds = [];
        $total = 0;
        foreach ($list as $row) {
          foreach ($row->detailProducts as $rowDetail) {
            if (isset($productsIds[$rowDetail->product_id])) {
              $productsIds[$rowDetail->product_id] = $productsIds[$rowDetail->product_id] + $rowDetail->quantity;
            } else {
              $productsIds[$rowDetail->product_id] = $rowDetail->quantity;
            }
            $total = $total + $rowDetail->quantity;
          }
        }
        // foreach ($productIds as $row) {
        //   $product = \App\Models\Product::find($row);
        //   if ($product) {
        //     echo '<h4 class="text-center">Total Transaksi Rp. </h4>';
        //   }
        // }
        @endphp
        <h4 class="text-center p-2" style="border: 2px solid #003063;">Total Terjual Rp. {{number_format($total)}} Item</h4>
        <h4 class="text-center p-2" style="border: 2px solid #003063;">Total Stock Rp. {{number_format($total + \App\Models\Product::query()->sum('stock'))}} Item</h4>
        <h4 class="text-center p-2" style="border: 2px solid #003063;">Stock Tersisa Rp. {{number_format(\App\Models\Product::query()->sum('stock'))}} Item</h4>
      </div>
      <hr />
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nama Pemesan</th>
            <th scope="col">Produk</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Pembayaran</th>
            {{-- <th scope="col">Aksi</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $row)
          <tr>
            <th scope="row">#{{$row->id}}</th>
            <th scope="row">{{$row->user->name ?? ''}}</th>
            <th scope="row">
              {{$row->detailProducts()->first()->product->name ?? ''}}<br />
              @if ($row->detailProducts()->count() > 1)
              <div>+{{$row->detailProducts()->count() - 1}} Produk</div>
              @endif
            </th>
            <td>{{\Carbon\Carbon::parse($row->date_order)->format('d, F Y H:i:s')}}</td>
            <td>Rp. {{number_format($row->total)}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
