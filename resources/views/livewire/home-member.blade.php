<div>
  <center>
    <div class="location-selector" style="opacity: 1; display: block;">
      <div class="container" style="width: 100%; padding: 0; margin: 0;">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="sliderContainer fullWidth clearfix" style="position: relative; z-index: 0;">
                    <div id="full-width-slider" class="royalSlider heroSlider rsMinW  rsHor rsWithBullets" style="padding: 0px; top: 0px; height: 412.688px;">
                      <div class="rsOverflow grab-cursor" style="width: 915px; height: 413px;">
                        <div class="rsContainer" style="transition-duration: 600ms; transform: translate3d(-2769px, 0px, 0px); transition-timing-function: cubic-bezier(0.445, 0.05, 0.55, 0.95);">
                          <div style="left: 1846px;" class="rsSlide ">
                            <div class="rsContent">
                              <div style="position: relative; text-align: center;">
                                <img class="rsImg rsMainSlideImage" src="{{url('/base')}}/data/banner/10.jpg" style="margin-left: -1px; margin-top: 0px; width: 916px; height: 413px;">
                              </div>
                            </div>
                          </div>
                          <div style="left: 2769px;" class="rsSlide ">
                            <div class="rsContent">
                              <div style="position: relative; text-align: center;">
                                <img class="rsImg rsMainSlideImage" src="{{url('/base')}}/data/banner/13.jpg" style="margin-left: -1px; margin-top: 0px; width: 916px; height: 413px;">
                              </div>
                            </div>
                          </div>
                          <div style="left: 3692px;" class="rsSlide ">
                            <div class="rsContent" style="visibility: visible; opacity: 1; transition: opacity 400ms ease-in-out 0s;">
                              <div style="position: relative; text-align: center;">
                                <img class="rsImg rsMainSlideImage" src="{{url('/base')}}/data/banner/16.jpg" style="margin-left: -1px; margin-top: 0px; width: 916px; height: 413px;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="rsNav rsBullets">
                        <div class="rsNavItem rsBullet"><span></span></div>
                        <div class="rsNavItem rsBullet"><span></span></div>
                        <div class="rsNavItem rsBullet"><span></span></div>
                        <div class="rsNavItem rsBullet rsNavSelected"><span></span></div>
                      </div>
                      <div class="rsArrow rsArrowLeft" style="display: block;">
                        <div class="rsArrowIcn"></div>
                      </div>
                      <div class="rsArrow rsArrowRight" style="display: block;">
                        <div class="rsArrowIcn"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Bagian panah bawah-->
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-12">
                <div style="padding: 10px 0 0 0;">
                  <img src="{{url('/base')}}/images/panah.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Bagian Text-->
      <div class="container mt-5">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div data-appear-animation="fadeInDown" class="kampungrotihome appear-animation" style="color:#59585d; font-family:coolvetica; line-height: 32px;">
                    Kampoeng Roti menyediakan berbagai macam jenis roti dengan varian rasa dan harga yang sangat terjangkau sehingga semua orang dapat menikmati setiap dari produk kami. Kampoeng Roti telah memiliki lebih dari 17 cabang yang tersebar diSurabaya dan Sidoarjo, Gresik, Madura dan Malang.
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--panah-->
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-12">
                <div style="margin: 55px 0 25px 0;">
                  <div style="background-image: url('{{url('/base')}}/images/mkiri.png'); background-size: cover;" class="displainlinetop plepet"></div>
                  <div style="background-image: url('{{url('/base')}}/images/mtengah.png');text-transform: uppercase; " class="displainlinetop productselec">
                    <div class="tempatpaddingtexthome" style="text-transform: uppercase;">
                      <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation">
                        <img src="{{url('/base')}}/images/titik.png" class="titikselect">
                      </div>
                      <div data-appear-animation="fadeInDown" class="displainlinetop productselec appear-animation" style="text-transform: uppercase; font-family:veneer;  color:#ac8b58;">
                        Product Selection
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
      <!--//Slider-->
      <div class="container" style="padding:0 0 0 0;margin:0px 0 20px 0;">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-12" style="margin:40px 0 30px 0;">
                <div style="opacity: 1; display: block;">
                  <div>
                    <div class="row">
                      @foreach (\App\Models\Product::has('outlet')->take(6)->latest()->get() as $row)
                      <div class="col-4">
                        <div class="item" style="text-align:center;">
                          <livewire:product-single :id="$row->id" :key="$row->id">
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  {{-- <div class="owl-controls clickable">
                    <div class="owl-pagination">
                      <div class="owl-page active"><span class=""></span></div>
                      <div class="owl-page"><span class=""></span></div>
                      <div class="owl-page"><span class=""></span></div>
                      <div class="owl-page"><span class=""></span></div>
                    </div>
                  </div> --}}
                </div>
              </div>
              <div class="prev panahkiri" style="cursor: pointer; width:62px;height:62px;background-image:url({{url('/base')}}/images/tmblowlkiri.png);position:absolute;background-repeat: no-repeat;">
              </div>
              <div class="next panahkanan" style=" cursor: pointer; width:62px;height:62px;background-image:url({{url('/base')}}/images/tmblowlkanan.png);position:absolute;background-repeat: no-repeat;">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Bagian backgorund 2-->
      {{-- <div style="background-image: url('{{url('/base')}}/images/back.png'); width:100%;margin: 0; background-repeat: repeat; padding: 63px 0 90px 0;">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-md-12" style="padding: 0;">
                  <!--Bagian panah-->
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4" style="border:0px solid red;">
                    <div style="margin:0 0 0 0;">
                      <div style="background-image: url('{{url('/base')}}/images/mkiric.png'); background-size: cover;" class="displainlinetop plepetcoklat"></div>
                      <div style="background-image: url('{{url('/base')}}/images/mtengahc.png');text-transform: uppercase; " class="displainlinetop productseleccoklat">
                        <div class="tempatpaddingtext" style="text-transform: uppercase;">
                          <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation">
                            <img src="{{url('/base')}}/images/titikputih.png" class="titikselect">
                          </div>
                          <div data-appear-animation="fadeInDown" class="displainlinetop productseleccoklat appear-animation" style="text-transform: uppercase; font-family:veneer;  color:#efefef; line-height:75px;">
                            NEW bakery
                          </div>
                          <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation">
                            <img src="{{url('/base')}}/images/titikputih.png" class="titikselect">
                          </div>
                        </div>
                      </div>
                      <div style="background-image: url('{{url('/base')}}/images/mkananc.png'); " class="displainlinetop plepetcoklat"></div>
                    </div>
                  </div>
                  <div class="col-md-4" style="border:0px solid red;">
                    <div style="padding: 18px 0 0 0; ">
                      <a href="product.html">
                        <div data-appear-animation="fadeInDown" class="displainlinemiddle appear-animation" style="font-family:kg_solid; padding: 0 12px 0 12px ; font-size:18px;color:#ae8e5d;">
                          View All Product
                        </div>
                        <div data-appear-animation="fadeInDown" class="displainlinemiddle appear-animation">
                          <img src="{{url('/base')}}/images/panahkecil.png" alt="">
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <!--ROTI-->
                <div class="col-md-12" style="margin: 60px 0 0 0 ; text-align: center;">
                  <center>
                    <div class="col-md-3" style="padding-left:5px; padding-right: 5px;">
                      <div style="width:100%; background-image:url({{url('/base')}}/data/product/163.jpg); height:333px; background-repeat: no-repeat; background-size: cover; background-position: center center;">
                      </div>
                      <div data-appear-animation="fadeInDown" style="font-size:28px; line-height: 31px; color:#59585d;  font-family: coolvetica; padding: 20px 0 23px 0;" class="appear-animation">
                        Roti tawar susu kampoeng
                      </div>
                    </div>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!--Bagian Footer-->
      {{-- <div class="parallax-window" data-parallax="scroll" data-image-src="{{url('/base')}}/data/foter/1.jpg" style="width:100%; padding: 30px 0 50px 0; margin: 0; display: inline-block; vertical-align: middle;">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-md-12">
                  <div>
                    <div data-appear-animation="fadeInDown" class="hubungikami appear-animation" style="color:#fff; font-family:kg_shadow;text-shadow: 4px 4px #524435; margin: 0 0 30px 0;">
                      Hubungi Kami !
                    </div>
                    <div data-appear-animation="fadeInDown" class="kecililang appear-animation">
                      <table border="2" style="border-collapse: collapse; border:2px solid #fff;" cellpadding="8">
                        <tbody>
                          <tr>
                            <td style="color:#fff; font-family:roboto_medium; border-right: 2px solid #fff; font-size:20px; text-transform: uppercase; padding: 10px 30px 10px 30px;">
                              <a href="../www.facebook.com/Kampoeng-Roti-251755754904017/indexc9fa.html?fref=ts" style="color: #fff;" target="_blank"><img data-appear-animation="fadeInDown" src="{{url('/base')}}/images/facebook.png" style="padding: 0 10px 0 0;" alt="" class="appear-animation"> Facebook</a>
                            </td>
                            <td style="color:#fff; font-family:roboto_medium; border-right: 2px solid #fff; font-size:20px; text-transform: uppercase; padding: 10px 30px 10px 30px;">
                              <img data-appear-animation="fadeInDown" src="{{url('/base')}}/images/email.png" style="padding: 0 10px 0 0;" alt="" class="appear-animation"> info@kampoengroti.com
                            </td>
                            <td style="color:#fff; font-family:roboto_medium; font-size:20px; text-transform: uppercase; padding: 10px 30px 10px 30px;">
                              <a href="../www.instagram.com/kampoengroti/index.html" style="color: #fff;" target="_blank"><img data-appear-animation="fadeInDown" src="{{url('/base')}}/images/instagram.png" style="padding: 0 10px 0 0;" alt="" class="appear-animation"> instagram</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <a href="outlets.html">
                      <div style="margin: 30px 0 12px 0;">
                        <img data-appear-animation="fadeInDown" src="{{url('/base')}}/images/petunjuk.png" alt="" class="appear-animation">
                      </div>
                      <div data-appear-animation="fadeInDown" style="font-family: roboto_medium; font-size: 20px; color:#fff ; text-shadow: 4px 4px #524435; padding: 0 0  0 0;" class="appear-animation">
                        Outlet Kami
                      </div>
                    </a>
                    <div data-appear-animation="fadeInDown" class="garislurus appear-animation" style="border-bottom:1px solid #fff; margin: 10px 0 10px 0;"></div>
                    <div data-appear-animation="fadeInDown" style="font-family: lato; font-size: 16px; color:#fff ;padding: 0 0  0 0;" class="appear-animation">
                      Kampoeng Roti - Roti Enak Harga Rakyat
                    </div>
                    <div style="font-family: lato; font-size: 16px; color:#fff ;padding: 0 0  0 0;">
                      <img src="{{url('/base')}}/images/2012.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-md-12">
                <div style="width: 100%; letter-spacing:3px; padding:15px 0 15px 0; font-family: roboto_medium; font-size: 14px; color:#292929 ;">
                  Kampoeng Roti. All right Reserved @2024. By <a href="../kibocreative.com/index.html" target="_blank" style="color:#292929;">Kibo Creative</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Libs -->
      <!--<script src="animation/jquery.min.js"></script>-->
      <script src="{{url('/base')}}/css/animation/plugins.js"></script>
      <script src="{{url('/base')}}/css/animation/jquery.appear.js"></script>
      <script src="{{url('/base')}}/css/animation/jquery.validate.js"></script>
      <script src="{{url('/base')}}/css/animation/theme.js"></script>
    </div>
  </center>
</div>
