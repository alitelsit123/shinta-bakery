<div style="padding: 0 0 80px 0;margin-top: 52px;">
  <div class="container">
      @if (auth()->check() && auth()->user()->role == 'admin')
      <livewire:add-product>
      @endif
      <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                  @foreach ($list as $row)
                  <livewire:product-single :id="$row->id" :key="$row->id">
                  @endforeach
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
