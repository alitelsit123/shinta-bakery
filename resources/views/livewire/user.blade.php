<div class="container">
  <div style="margin: 30px 0 45px 0;" class="text-center">

    <div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mkiri.png); background-size: cover;" class="text-center displainlinetop plepet appear-animation fadeInDown appear-animation-visible"></div><div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mtengah.png);text-transform: uppercase; " class="displainlinetop productselec appear-animation fadeInDown appear-animation-visible">
        <div data-appear-animation="fadeInDown" class="tempatpaddingtext appear-animation fadeInDown appear-animation-visible" style="text-transform: uppercase;">
            <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation fadeInDown appear-animation-visible">
                <img src="{{url('base')}}/images/titik.png" class="titikselect">
            </div>
            <div data-appear-animation="fadeInDown" class="displainlinetop productselec appear-animation fadeInDown appear-animation-visible" style="text-transform: uppercase; font-family:veneer;  color:#ac8b58;">
              PENGGUNA
            </div>
            <div class="displainlinetop">
                <img data-appear-animation="fadeInDown" src="{{url('base')}}/images/titik.png" class="titikselect appear-animation fadeInDown appear-animation-visible">
            </div>
        </div>
    </div>
    <div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mkanan.png); margin-left:-1px;" class="displainlinetop plepet appear-animation fadeInDown appear-animation-visible"></div>
  </div>
  <div>
    <livewire:add-user>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Foto</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Nomor HP</th>
          <th scope="col">Role</th>
          <th scope="col">Alamat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach (\App\Models\User::latest()->get() as $row)
        <tr>
          <td>
            @if ($row->photo)
            <img src="{{url('storage/'.$row->photo)}}" style="width: 50px; height: 50px;" alt="" srcset="">
            @endif
          </td>
          <td>{{$row->name}}</td>
          <td>{{$row->email}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->role}}</td>
          <td>{{$row->address}}</td>
          <td>
            <button type="button" class="btn btn-primary" data-target="#update-create-modal" data-toggle="modal" @click="$wire.set('id', '{{$row->id}}')">Ubah</button>
            <button type="button" class="btn btn-danger"
            wire:click="delete({{$row->id}})"
            wire:confirm.prompt="Yakin hapus?\n\nKetik 'HAPUS' untuk melanjutkan|HAPUS"
            >Hapus</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="modal" wire:ignore.self id="update-create-modal">
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
          <button type="button" class="btn btn-primary" wire:click="update()" wire:target="image" wire:loading.remove>Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
