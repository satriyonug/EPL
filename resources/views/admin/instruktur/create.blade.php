@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Data instruktur baru</div>
      <div class="card-body">
        <form method="POST" action="/admin/instruktur">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Nama</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nama">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Jenis Kelamin</label>
                <div class="radio-inline">
                <label class="radio-inline" style="margin-right: 2em;"><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label>
                <label class="radio-inline"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>No KTP</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="no_ktp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">No SIM</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="no_sim">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>No Telepon</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nomor_telepon">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Alamat</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="alamat">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Email</label>
                <input class="form-control" id="exampleInputLastName" type="email" aria-describedby="nameHelp" name="email">
              </div>
              <div class="col-md-6">
                <label>Password</label>
                <input class="form-control" id="password" type="password" aria-describedby="nameHelp" name="password">
                <div class="checkbox">
                  <label><input type="checkbox" onclick="myFunction()"> Show Password</label>
                </div>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" value="Simpan" type="submit">
        </form>
      </div>
    </div>
  </div>
  <script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</body>
@endsection
