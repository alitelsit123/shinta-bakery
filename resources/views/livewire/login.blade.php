<!-- partial:index.partial.html -->
<div class="box">
  <h1>Login</h1>
  <form action="{{url('login')}}" method="POST">
    @csrf
    <div class="input-box">
      <input type="text" name="emails" required />
      <label for="">Email</label>
    </div>
    <div class="input-box">
      <input type="password" name="passwords" required />
      <label for="">Password</label>
    </div>
    @if (session()->has('alert-error'))
    <div style="color: red;margin-bottom: 2rem;text-align: center;">
      {{session('alert-error')}}
    </div>
    @endif
    <div style="display: flex; align-items: center; justify-content: space-between;">
      <input type="submit" value="Submit" />
      <a href="{{url('register')}}">Belum Punya Akun ? Daftar</a>
    </div>
  </form>
</div>
<!-- partial -->
