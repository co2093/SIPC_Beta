<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPC UES</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


</head>

<body class="custom-class">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
            <img src="{{URL::asset('img/ues.png')}}" class="img-fluid">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear cuenta</h1>
              </div>



              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control-ues form-control-user" id="name" placeholder="Nombre"
                    class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                    required autocomplete="off" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">


                  <input type="email" class="form-control-ues form-control-user" id="email" placeholder="Correo"
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    required autocomplete="off">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">


                    <input type="password" class="form-control-ues form-control-user" id="password"
                      placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="off">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror



                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control-ues form-control-user" id="password-confirm"
                      placeholder="Repetir contraseña" class="form-control" name="password_confirmation" required
                      autocomplete="off">
                  </div>
                </div>

                <button type="submit" class="btn btn-danger btn-user btn-block">
                  {{ __('Register') }}
                </button>

                <hr>

              </form>

              <hr>

              <div class="text-center">
                <a class="small text-gray-900" href="{{ route('login') }}">Ya tengo cuenta</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>