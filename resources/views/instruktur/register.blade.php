<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Register Instruktur</div>
      <div class="card-body">
        <form action="{{url('/register-instruktur/create')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="email" name="email" type="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input class="form-control" id="jenis_kelamin" name="jenis_kelamin" type="text"  placeholder="Jenis Kelamin">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No SIM A</label>
            <input class="form-control" id="sim" name="no_sim" type="text"  placeholder="No SIM A">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No KTP</label>
            <input class="form-control" id="ktp" name="no_ktp" type="text"  placeholder="No KTP">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input class="form-control" id="alamat" name="alamat" type="text" aria-describedby="alamatHelp"  placeholder="Alamat">
            <small id="alamatHelp" class="form-text text-muted">Sesuai alamat KTP</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No Telepon</label>
            <input class="form-control" id="no_telepon" name="nomor_telepon" type="text"  placeholder="No Telepon">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Foto</label>
            <input id="foto" name="foto_instruktur" type="file" aria-describedby="Help">
            <small id="Help" class="form-text text-muted">Selfie foto wajah dengan memegang KTP</small>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Submit</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{'/instruktur'}}">Login</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
