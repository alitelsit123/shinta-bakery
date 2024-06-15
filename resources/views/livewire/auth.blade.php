<div>
  <!-- Modal -->
  <div class="modal " id="auth-modal" tabindex="-1" aria-labelledby="authLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="authLabel">Masuk / Daftar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#" data-toggle="tab" data-target="#nav-login">Masuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#nav-register">Daftar</a>
            </li>
          </ul>
          <hr />
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
              <form action="{{url('login')}}" method="post">
                @csrf
                <div>
                  <div class="form-group text-left mb-4">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group text-left">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                  </div>
                </div>
                @if (session('alert-error'))
                <div style="color: red;">{{session('alert-error')}}</div>
                @endif
                <hr />
                <div class="d-flex align-items-center justify-content-end">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary ml-3">Masuk</button>
                </div>
              </form>
            </div>
            <div class="tab-pane" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
              <form action="{{url('register')}}" method="post">
                <div>
                  <div class="form-group text-left mb-4">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="form-group text-left mb-4">
                    <label for="">Nomor HP</label>
                    <input type="text" name="phone" class="form-control">
                  </div>
                  <div class="form-group text-left mb-4">
                    <label for="">Email address</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="form-group text-left">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  @if (session('alert-error'))
                  <div style="color: red;">{{session('alert-error')}}</div>
                  @endif
                </div>
                <hr />
                <div class="d-flex align-items-center justify-content-end">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary ml-3">Daftar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if (session('alert-error'))
  <script>
    $(document).ready(function() {
      $('#auth-modal').modal('show')
    })
  </script>
  @endif
</div>
