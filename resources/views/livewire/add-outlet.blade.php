<div>
  {{-- <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
  <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/> --}}
  <div data-appear-animation="fadeInDown" class="appear-animation fadeInDown appear-animation-visible">
    <div class="d-flex align-items-center justify-content-center mb-5">
      <button type="button" class="btn btn-primary btn-lg" style="width: 220px;" data-toggle="modal" data-target="#create-modal">Tambah Outlet</button>
    </div>
  </div>
  <div class="modal" wire:ignore.self id="create-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="create-modalLabel">Buat Outlet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" wire:model="name" class="form-control" placeholder="Nama Outlet" />
            @error('name')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jam Buka</label>
            <input type="text" @change="$wire.set('open_time', $event.target.value)" id="open_time" class="form-control" readonly style="background: white;" />
            @error('open_time')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jam Tutup</label>
            <input type="text" @change="$wire.set('close_time', $event.target.value)" id="close_time" class="form-control" readonly style="background: white;"  />
            @error('close_time')
            <small style="color: red;">{{ $message }}</small>
            @enderror
          </div>
          <script>
            $(document).ready(function() {
              $('#open_time').datetimepicker({
                datepicker:false,
                format:'H:i',
                onChangeDateTime:function(dp,$input){
                  $('#open_time')[0].dispatchEvent(new Event('change'))
                }
              })
              $('#close_time').datetimepicker({
                datepicker:false,
                format:'H:i',
                onChangeDateTime:function(dp,$input){
                  $('#close_time')[0].dispatchEvent(new Event('change'))
                }
              })
            })
          </script>
          <div class="form-group mb-3">
            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
            <input type="text" wire:model="address" class="form-control" />
            @error('address')
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
          <button type="button" class="btn btn-primary" wire:click="store()">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
