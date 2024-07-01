<div class="displainlinetop lebarpeta" style="margin: 0 4px 0 4px;">
  <div data-appear-animation="fadeInDown" style="height:329px; border:4px solid #fff;" class="appear-animation fadeInDown appear-animation-visible">
    <div style="width: 100%;height: 300px;background: url('{{url('storage/'.$item->image)}}');background-position: center; background-size: contain;"></div>
  </div>
  <div data-appear-animation="fadeInDown" style="font-family:nexarust_shadow; font-size:24px; color:#ad8d5b;  padding: 20px 0 5px 0; text-transform: uppercase;" class="text-center appear-animation fadeInDown appear-animation-visible">
    {{$item->name}}
  </div>
  <div data-appear-animation="fadeInDown" style="font-family:lato; font-size:19px ; color:#373737;" class="appear-animation fadeInDown appear-animation-visible text-center">
    {{$item->address}}
  </div>

  <div style="padding: 5px 14px 9px 14px; background-color:#ffffff; margin: 17px 0 45px 0; border-radius:8px; display: flex; color:#646464; flex-direction: column; align-items: center; justify-content: center;">
      <div>
          <div data-appear-animation="fadeInDown" class="displainlinemiddle appear-animation fadeInDown appear-animation-visible">
              <img src="{{url('base')}}/images/bintang.png" style=" margin-top:-1px;">
          </div>
          <div data-appear-animation="fadeInDown" class="displainlinemiddle appear-animation fadeInDown appear-animation-visible" style="font-family:brandon_medium ; padding: 3px 6px 0 6px; font-size:12px;">
              OPENING HOURS
          </div>
          <div data-appear-animation="fadeInDown" class="displainlinemiddle appear-animation fadeInDown appear-animation-visible">
              <img src="{{url('base')}}/images/bintang.png" style=" margin-top:-1px;">
          </div>
      </div>
      <div data-appear-animation="fadeInDown" style="font-family:brandon_medium; font-size:19px; line-height:19px;" class="appear-animation fadeInDown appear-animation-visible">
          {{$item->open_time}} - {{$item->close_time}}
      </div>
  </div>
</div>
