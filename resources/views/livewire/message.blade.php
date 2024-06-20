<div class="container">
  @if (auth()->check() && auth()->user()->role == 'member')
  <style>
    .contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
  </style>
  <div class="container contact-form">
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
    </div>
    <form method="post">
        <h3 style="color: #5f492f;">Kritik Saran</h3>
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" wire:model.live="name" placeholder="Your Name *" />
                    @error('name') <small style="color: red;">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" wire:model.live="email" placeholder="Your Email *" />
                    @error('email') <small style="color: red;">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" wire:model.live="phone" placeholder="Your Phone Number *" />
                    @error('phone') <small style="color: red;">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-primary" wire:click="store">Kirim</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea class="form-control" wire:model.live="message" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    @error('message') <small style="color: red;">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
    </form>
  </div>
  @elseif(auth()->check() && auth()->user()->role == 'admin')
  <div style="margin: 30px 0 45px 0;" class="text-center">

    <div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mkiri.png); background-size: cover;" class="text-center displainlinetop plepet appear-animation fadeInDown appear-animation-visible"></div><div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mtengah.png);text-transform: uppercase; " class="displainlinetop productselec appear-animation fadeInDown appear-animation-visible">
        <div data-appear-animation="fadeInDown" class="tempatpaddingtext appear-animation fadeInDown appear-animation-visible" style="text-transform: uppercase;">
            <div data-appear-animation="fadeInDown" class="displainlinetop appear-animation fadeInDown appear-animation-visible">
                <img src="{{url('base')}}/images/titik.png" class="titikselect">
            </div>
            <div data-appear-animation="fadeInDown" class="displainlinetop productselec appear-animation fadeInDown appear-animation-visible" style="text-transform: uppercase; font-family:veneer;  color:#ac8b58;">
              KRITIK & SARAN
            </div>
            <div class="displainlinetop">
                <img data-appear-animation="fadeInDown" src="{{url('base')}}/images/titik.png" class="titikselect appear-animation fadeInDown appear-animation-visible">
            </div>
        </div>
    </div>
    <div data-appear-animation="fadeInDown" style="background-image: url({{url('base')}}/images/mkanan.png); margin-left:-1px;" class="displainlinetop plepet appear-animation fadeInDown appear-animation-visible"></div>
  </div>
  <div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Nomor HP</th>
          <th scope="col">Pesan</th>
        </tr>
      </thead>
      <tbody>
        @foreach (\App\Models\Message::latest()->get() as $row)
        <tr>
          <td>{{$row->name}}</td>
          <td>{{$row->email}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->message}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>
