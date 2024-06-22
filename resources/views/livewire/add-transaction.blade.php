<div>
  {{-- <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
  <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/> --}}
  <div data-appear-animation="fadeInDown" class="appear-animation fadeInDown appear-animation-visible">
    <div class="d-flex align-items-center justify-content-center mb-5">
      <button type="button" class="btn btn-primary btn-lg" style="width: 220px;" data-toggle="modal" data-target="#create-modal">Tambah Transaksi</button>
    </div>
  </div>
  <div class="modal" wire:ignore.self id="create-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create-modalLabel">Buat Transaksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Status</label>
            <select wire:model.live="status" class="form-control" id="">
              <option value="" selected></option>
              <option value="pending">Pending</option>
              <option value="waiting">Menunggu Dikonfirmasi</option>
              <option value="confirmed">Dikonfirmasi</option>
              <option value="settlement">Selesai</option>
            </select>
            @error('status')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">User</label>
            <select wire:model.live="user_id" class="form-control" id="">
              <option value="" selected></option>
              @foreach (\App\Models\User::all() as $row)
              <option value="{{$row->id}}">{{$row->name}} - {{$row->email}} - {{$row->phone}}</option>
              @endforeach
            </select>
            @error('user_id')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Produk</label>
            <input type="text" class="form-control" id="" wire:model.live="search" placeholder="Cari Produk" />
            <div class="d-flex align-items-start justify-content-start mt-2" style="column-gap: 8px;row-gap: 8px;">
              @foreach ($searchedProducts as $row)
              <div class="d-flex align-items-start p-2" style="border: 2px solid #5f492f;">
                <img src="{{url('storage/'.$row->image)}}" alt="" srcset="" style="width: 57px;height: 57px;">
                <div class="ml-2">
                  <div>{{$row->name}}</div>
                  <div>Rp. {{number_format($row->price)}}</div>
                  @if (in_array($row->id, $selectedProductIds))
                  <span>Sudah ditambahkan</span>
                  @else
                  <button class="btn btn-sm btn-primary btn-block mt-1" wire:click="addToSelectedProduct({{$row->id}})">+ Add</button>
                  @endif
                </div>
              </div>
              @endforeach
            </div>
            <div class="mt-2">
              <small>Produk Dipilih ({{sizeof($selectedProductIds)}})</small>
            </div>
            <div class="d-flex align-items-start justify-content-start mt-2" style="column-gap: 8px;row-gap: 8px;">
              @foreach ($selectedProductIds as $rowId)
              @php
              $row = \App\Models\Product::find($rowId);
              @endphp
              <div class="d-flex align-items-start p-2" style="border: 2px solid #5f492f;">
                <img src="{{url('storage/'.$row->image)}}" alt="" srcset="" style="width: 57px;height: 57px;">
                <div class="ml-2">
                  <div>{{$row->name}}</div>
                  <div>Rp. {{number_format($row->price)}}</div>
                  <input type="number" class="mt-1 form-control" @keyup="$wire.updateQuantity({{$row->id}}, $event.target.value)"  id="" />
                  <button class="btn btn-sm btn-danger btn-block mt-1" wire:click="addToSelectedProduct({{$row->id}})">- Unselect</button>
                </div>
              </div>
              @endforeach
            </div>
            <div class="form-group mb-3">
              <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
              <input type="datetime-local" wire:model.live="date_order" class="form-control" id="" />
              @error('date_order')
              <small style="color: red;">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="exampleFormControlInput1" wire:model.live="type" class="form-label">Tipe Pesanan</label>
              <select wire:model="type" class="form-control" id="">
                <option value="" selected></option>
                <option value="pickup">Diambil sendiri</option>
                <option value="delivery">Kirim</option>
              </select>
              @error('type')
              <small style="color: red;">{{ $message }}</small>
              @enderror
            </div>
          </div>
          {{-- <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea wire:model="descriptionCreate" id="" class="form-control" rows="4"></textarea>
          </div> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-modal-close" data-dismiss="modal">Close</button>
          <button disabled="disabled" class="btn btn-primary disabled" wire:loading wire:target="store">Simpan</button>
          <button type="button" class="btn btn-primary" wire:click="store()" wire:target="store" wire:loading.remove>Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
