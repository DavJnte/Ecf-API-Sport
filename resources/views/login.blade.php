<!DOCTYPE html>
<html lang="fr">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Madness Fitness</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/637d7774d7.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/" class="text-uppercase"><b></b>connexion</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Renseigner vos identifiants</p>

      <form>
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-start">
          <!-- /.col -->
          <div class="col-12">
            <button type="button" id="btnSubmit" onclick="login()" class="btn btn-primary btn-block text-bozart">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-2 mb-1">
        <a href="/admin">Espace administrateur ?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>
</html>
<script> 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function login()
    {
        if ($('#email').val() != '' && $('#password').val() != '') {
            var email = $('#email').val();
            var password = $('#password').val();

            $('#btnSubmit').html('Veuiller patienter <i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                url: "/loginAjax",
                type: "POST",
                data: {
                    email: email,
                    password: password
                },
                success: function(msg) {
                    console.log(msg);
                    var val = msg.split("||");
                    if (val[0] == "true") {
                        $('#btnSubmit').html('Connexion établie');
                        toastr.success(val[1]);
                        setTimeout(() => {
                            location.href = '/home-user';
                        }, 600);
                    } else if (val[0] == "false") {
                        toastr.error(val[1]);
                        $('#btnSubmit').html('Se connecter');
                    }
                }
            });
        } else if ($('#username').val() != '') {
          toastr.error('Veuillez saisir le Mot de passe');

        }
        else if ($('#password').val() != '') {
          toastr.error('Veuillez saisir le Nom Administrateur');

        }else{
          toastr.error('Veuillez remplir les champs');
        }
    }</script>