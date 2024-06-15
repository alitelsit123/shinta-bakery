<div style="padding: 0 0 80px 0;margin-top: 52px;">
  <div class="container">
      <div style="margin: 30px 0 45px 0;" class="text-center">

        <div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mkiri.png); background-size: cover;" class="text-center displainlinetop plepet appear-animation fadeInDown appear-animation-visible"></div><div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mtengah.png);text-transform: uppercase; " class="displainlinetop productselec appear-animation fadeInDown appear-animation-visible">
            <div data-appear-animation="fadeInDown" class="tempatpaddingtext appear-animation fadeInDown appear-animation-visible" style="text-transform: uppercase;">
                <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation fadeInDown appear-animation-visible">
                    <img src="{{url('base')}}/images/titik.png" class="titikselect">
                </div>
                <div data-appear-animation="fadeInDown" class="displainlinetop productselec appear-animation fadeInDown appear-animation-visible" style="text-transform: uppercase; font-family:veneer;  color:#ac8b58;">
                  PRODUK
                </div>
                <div class="displainlinetop">
                    <img data-appear-animation="fadeInDown" src="{{url('base')}}/images/titik.png" class="titikselect appear-animation fadeInDown appear-animation-visible">
                </div>
            </div>
        </div>
        <div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mkanan.png); margin-left:-1px;" class="displainlinetop plepet appear-animation fadeInDown appear-animation-visible"></div>
      </div>
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
