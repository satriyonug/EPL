<!--Navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/home"><span>Kursus Mengemudi</span> Sie Bersaudara</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#feature">Features</a></li>
        <li><a href="#organisations">Organisations</a></li>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#pricing">Pricing</a></li> -->
        @if(Auth::check())
        <li><a>Halo, {{ Auth::user()->nama }}</a></li>
        <li class="btn-trial"><a href="/logout">Logout</a></li>
        @else
        <li><a href="#" data-target="#login" data-toggle="modal">Masuk</a></li>
        <li class="btn-trial"><a href="/register">Daftar</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<!--/ Navigation bar-->
<!--Modal box-->
<div class="modal fade" id="login" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content no 1-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center form-title">Masuk</h4>
      </div>
      <div class="modal-body padtrbl">

        <div class="login-box-body">
          <p class="login-box-msg">Masuk untuk peserta kursus</p>
          <div class="form-group">
            <form name="" id="loginForm" method="POST" action="/login">
              <div class="form-group has-feedback">
                {{ csrf_field() }}
                <!----- email -------------->
                <input class="form-control" type="email" name="email" placeholder="E-mail" id="loginid" autocomplete="off" value="{{ old('email') }}" required autofocus/>
                <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                <!---Alredy exists  ! -->
                @if ($errors->has('email'))
                <span class="glyphicon glyphicon-user form-control-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group has-feedback">
                <!----- password -------------->
                <input class="form-control" placeholder="Password" id="loginpsw" name="password" type="password" autocomplete="off" required/>
                <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                <!---Alredy exists  ! -->
                @if ($errors->has('password'))
                <span class="glyphicon glyphicon-lock form-control-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" id="loginrem" {{ old('remember') ? 'checked' : '' }}> Ingat saya
                    </label>
                  </div>
                </div>
                <div class="col-xs-12">
                  <button type="submit" class="btn btn-green btn-block btn-flat">Masuk</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!--/ Modal box-->
