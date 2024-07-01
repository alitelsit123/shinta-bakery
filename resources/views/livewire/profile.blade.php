<div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-md-12">
            <div style="margin: 55px 0 25px 0;" class="text-center">
              <div style="background-image: url('{{url('/base')}}/images/mkiri.png'); background-size: cover;" class="displainlinetop plepet"></div>
              <div style="background-image: url('{{url('/base')}}/images/mtengah.png');text-transform: uppercase; " class="displainlinetop productselec">
                <div class="tempatpaddingtexthome" style="text-transform: uppercase;">
                  <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation">
                    <img src="{{url('/base')}}/images/titik.png" class="titikselect">
                  </div>
                  <div data-appear-animation="fadeInDown" class="displainlinetop productselec appear-animation" style="text-transform: uppercase; font-family:veneer;  color:#ac8b58;opacity: 1;">
                    Profile
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
  <div class="container" style="padding: 0 5.75rem;">
    <div class="card">
      <div class="card-body">
        <div class="form" id="registrationForm">
          <div class="row" style="">
            <div class="col-12">
              <div class="d-flex w-100 align-items-center justify-content-center mb-4" style="flex-direction: column;">
                <img src="{{url('storage/'.\App\Models\User::find(auth()->id())->photo)}}" alt="" srcset="" class="mb-2" style="width: 100px;height: 100px;">
                <input type="file" class="form-control" wire:model.live="photo" id="" style="width: 100px;" />
                <div wire:loading wire:target="photo" style="color: green;">Uploading...</div>
              </div>
            </div>
            <div class=" col-xs-4 px-4">

                <div class="form-group">
                    <label for="first_name"><h4>Nama Lengkap</h4></label>
                    <input type="text" class="form-control" wire:model.live="name" placeholder="">
                </div>
            </div>
            <div class=" col-xs-4 px-4">

              <div class="form-group">
                  <label for="first_name"><h4>Email</h4></label>
                  <input type="text" class="form-control" placeholder="" wire:model.live="email">
              </div>
            </div>
            <div class=" col-xs-4 px-4">

              <div class="form-group">
                  <label for="first_name"><h4>Nomor HP</h4></label>
                  <input type="text" class="form-control" placeholder="" wire:model.live="phone">
              </div>
            </div>
            <div class=" col-xs-12 px-4">

              <div class="form-group">
                  <label for="first_name"><h4>Alamat</h4></label>
                  <textarea class="form-control" id="" rows="4" wire:model.live="address">{{$address}}</textarea>
              </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group text-center mt-5">
                      <button type="button" class="btn btn-lg btn-primary px-5 py-2" wire:click="updateProfile"><i class="glyphicon glyphicon-ok-sign"></i> Simpan</button>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
