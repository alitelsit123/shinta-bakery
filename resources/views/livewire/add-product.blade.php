<div>
  <div data-appear-animation="fadeInDown" class="appear-animation fadeInDown appear-animation-visible">
    <div class="d-flex align-items-center justify-content-center mb-5">
      <button type="button" class="btn btn-primary btn-lg" style="width: 220px;" data-toggle="modal" data-target="#create-modal">Tambah Produk</button>
    </div>
  </div>
  <div class="modal" wire:ignore.self id="create-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create-modalLabel">Buat Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" wire:model="name" class="form-control" placeholder="Nama produk" />
            @error('name')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Outlet</label>
            <select wire:model="outlet_id" class="form-control" id="">
              <option value="" selected></option>
              @foreach (\App\Models\Outlet::all() as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
            @error('outlet_id')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="number" wire:model="price" class="form-control" placeholder="Harga" />
            @error('price')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          {{-- <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea wire:model="descriptionCreate" id="" class="form-control" rows="4"></textarea>
          </div> --}}
          <div class="form-group mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" wire:model="image" class="form-control" />
            <div wire:loading wire:target="image">Uploading...</div>
            @error('image')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          @if ($image)
          <div class="form-group">
            <label for="" class="form-label">Preview</label>
            <div>
              <img src="{{$image->temporaryUrl()}}"
              alt="" srcset="" style="width: 100px;height: 100px; object-position: center; object-fit: contain;" />
            </div>
          </div>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-modal-close" data-dismiss="modal">Close</button>
          <button disabled="disabled" class="btn btn-primary disabled" wire:loading wire:target="image">Simpan</button>
          <button type="button" class="btn btn-primary" wire:click="store()" wire:target="image" wire:loading.remove>Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
