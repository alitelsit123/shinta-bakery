<div>
  <div data-appear-animation="fadeInDown" class="appear-animation fadeInDown appear-animation-visible">
    <div class="d-flex align-items-center justify-content-center mb-5">
      <button type="button" class="btn btn-primary btn-lg" style="width: 220px;" data-toggle="modal" data-target="#create-modal">Tambah User</button>
    </div>
  </div>
  <div class="modal" wire:ignore.self id="create-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create-modalLabel">Buat user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" wire:model="name" class="form-control" placeholder="Nama user" />
            @error('name')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" wire:model="email" class="form-control" placeholder="" />
            @error('email')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nomor HP</label>
            <input type="text" wire:model="phone" class="form-control" placeholder="" />
            @error('phone')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Role</label>
            <select wire:model="role" class="form-control" id="">
              <option value="" selected></option>
              <option value="member">Member</option>
              <option value="driver">Driver</option>
              <option value="admin">Admin</option>
            </select>
            @error('role')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="text" wire:model="password" class="form-control" placeholder="" />
            @error('password')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
            <textarea wire:model="address" id="" class="form-control" rows="4"></textarea>
            @error('address')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
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
