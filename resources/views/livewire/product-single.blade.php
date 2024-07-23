<div class="displainlinetop lebargambarproduct" style="
border-radius: 8px;
margin: 5px;
text-align: center;
background: white;
box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
" x-data="{alert: '', message: ''}">
  <div data-appear-animation="fadeInDown" class="appear-animation fadeInDown appear-animation-visible">
    <div class=" position-relative">
      <a class="fancybox" href="{{url('storage/'.$item->image)}}" data-fancybox-group="gallery" title="">
        <div data-appear-animation="fadeInDown" style="border-radius: 8px;width: 100%; background-repeat: no-repeat; background-size:cover; background-position: center center; height: 361px; background-image:url({{url('storage/'.$item->image)}});" class="appear-animation fadeInDown appear-animation-visible"></div>
      </a>
      @if (auth()->user() && auth()->user()->role == 'admin')
      <button class="btn position-absolute btn-dark" style="border-radius:9999px;top: 1rem;right: 5rem;width: 40px;height:40px;" type="button" @click="$('.input-image-{{$item->id}}').click()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px;height:24px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
      </button>
      <button class="btn position-absolute btn-danger" style="border-radius:9999px;top: 1rem;right: 1rem;width: 40px;height:40px;" type="button" wire:confirm wire:click="delete({{$item->id}})">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
        </svg>
      </button>
      <input type="file" id="" class="input-image-{{$item->id}} d-none" wire:model.live.debounce.200ms="image">
      @endif
    </div>
    @if (auth()->user() && auth()->user()->role == 'admin')
    {{-- <div class="mt-4 p-3">
      <label for="">Outlet</label>
      <select class="form-control" wire:model.live.debounce.250s="outlet_id">
        <option value="" disabled>-- Pilih Outlet --</option>
        @foreach (\App\Models\Outlet::all() as $row)
        <option value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
      </select>
    </div> --}}
    <div class="mt-4 p-3">
      <label for="">Status</label>
      <select class="form-control" wire:model.live.debounce.250s="status">
        <option value="" disabled>-- Pilih Status --</option>
        <option value="enabled">Tersedia</option>
        <option value="disabled">Tidak Tersedia</option>
      </select>
    </div>
    @else
      @if ($item->status == 'enabled')
      <button type="button" class="btn btn-success mt-4">Tersedia</button>
      @else
      <button type="button" class="btn btn-danger mt-4">Tidak Tersedia</button>
      @endif
    @endif
  </div>
  <div data-appear-animation="fadeInDown" class="appear-animation fadeInDown appear-animation-visible px-3 pb-3">
    @if (auth()->user() && auth()->user()->role == 'admin')
    <div class="mt-4">
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" id="" aria-describedby="" wire:model.live.debounce.250s="name">
        {{-- <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
      </div>
      <div class="form-group">
        <label for="">Harga</label>
        <input type="number" class="form-control" id="" aria-describedby="" wire:model.live.debounce.250s="price">
        {{-- <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
      </div>
      <div class="form-group">
        <label for="">Stok</label>
        <input type="number" class="form-control" id="" aria-describedby="" wire:model.live.debounce.250s="stock">
      </div>
      <div class="form-group">
        <label for="">Deskripsi</label>
        <textarea id="" class="form-control" rows="3" wire:model.live.debounce.250s="description"></textarea>
      </div>
    </div>
    <div class="mt-4" style="color: green;display:none;" wire:loading wire:target="image">Sedang mengupload ...</div>
    <div class="mt-4" style="color: green;display:none;" x-show="alert == 'success'" x-text="message" @message-success.window="
      if($event.detail.id == '{{$item->id}}') {
        alert = 'success';
        message = $event.detail.message;
        setTimeout(() => {alert = ''}, 5000);
      }
    "></div>
    <div class="mt-4" style="color: red;display:none;" x-show="alert == 'error'" x-text="message" @message-error.window="
      if($event.detail.id == '{{$item->id}}') {
        alert = 'error';
        message = $event.detail.message;
        setTimeout(() => {alert = ''}, 5000);
      }
    ">Data gagal diubah!</div>
    <button class="btn btn-primary btn-block mt-2" type="button" wire:click="updateAction()">Update</button>
    @else
      <div class="flex align-items-center" style="font-weight:bold; font-size:18px; color:#606064; padding:10px 0 0 0;">
        {{$item->name}}
      </div>
      {{-- <div style="font-family:brandon_medium; font-size:19px ; color:#605f64; padding: 10px 0 0 0;">
        Outlet {{$item->outlet->name}}
      </div> --}}
      <div style="font-family:brandon_medium; font-size:19px ; color:#605f64; padding: 10px 0 0 0;">
        Rp. {{number_format($item->price)}}
      </div>
      <div style="font-family:playfair_bold; color:#606064; padding:10px 0 0 0;">
        {{$item->description}}
      </div>
      @if ($item->status == 'enabled')
        <div class="d-flex align-items-center justify-content-center" style="column-gap: 1rem;padding-top: 10px;">
          @if (auth()->user() && auth()->user()->carts()->whereProduct_id($item->id)->first())
          <div>Sudah dimasukkan keranjang</div>
          @else
          <input type="number" id="" class="form-control" placeholder="Jumlah pesanan" min="1" max="{{$item->stock}}" style="height: 20.13px;" x-ref="inputcart">

          <button class="btn btn-sm btn-primary" type="button"

          @if (auth()->check())

          @click="$wire.addToCart({{$item->id}},$refs.inputcart.value)"

          @else

          {{-- @click="$('#auth-modal').modal('show')" --}}
          @click="document.location.href='{{url('login')}}'"

          @endif

          >+Keranjang</button>
          @endif
        </div>
      @endif
    @endif
  </div>
</div>
