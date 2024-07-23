<!-- partial:index.partial.html -->
<div class="box">
  <h1>Daftar</h1>
  <form action="{{url('register')}}" method="POST">
    @csrf
    <div class="input-box">
      <input type="text" name="name" required />
      <label for="">Nama</label>
    </div>
    <div class="input-box">
      <input type="text" name="phone" required />
      <label for="">Nomor HP</label>
    </div>
    <div class="input-box">
      <input type="email" name="email" required />
      <label for="">Email</label>
    </div>
    <div class="input-box">
      <input type="password" name="password" required />
      <label for="">Password</label>
    </div>
    @if (session()->has('alert-error'))
    <div style="color: red;margin-bottom: 2rem;text-align: center;">
      {{session('alert-error')}}
    </div>
    @endif
    <div style="display: flex; align-items: center; justify-content: space-between;">
      <input type="submit" value="Submit" />
      <a href="{{url('login')}}">Sudah Punya Akun ? Masuk</a>
    </div>
  </form>
</div>
<!-- partial -->
