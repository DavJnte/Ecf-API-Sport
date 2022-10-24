<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="Description" content="Connexion à la plateforme: Vous pouvez visualiser vos droits." />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Madness Fitness/ Utilisateur</title>
  <style>
    @font-face {
      font-family: Main;
      src: url('fonts/main.ttf') format('truetype');
    }

    @font-face {
      font-family: Gotham;
      src: url('fonts/GothamBold.ttf') format('truetype');
    }

    @font-face {
      font-family: Gotham_Light;
      src: url('fonts/GothamLight.ttf') format('truetype');
    }

    @font-face {
      font-family: Gotham_Book;
      src: url('fonts/GothamBook.ttf') format('truetype');
    }

    @font-face {
      font-family: Gothic;
      src: url('fonts/GOTHIC.TTF') format('truetype');
    }

    @font-face {
      font-family: Gotham_Light;
      src: url('fonts/GothamLight.ttf') format('truetype');
    }

    @font-face {
      font-family: Cocogoose;
      src: url('fonts/Cocogoose_trial.otf');
    }

    .gotham-book {
      font-family: Gotham_Book;
    }

    .gotham {
      font-family: Gotham_Light;
    }

    .bg-lemon {
      background-color: #a8cf38;
    }

    .text-lemon {
      color: #a8cf38;
    }

    a.top:hover {
      color: white !important;
    }

    .bg-light {
      background-color: white !important;
    }

    .text-black-bold {
      color: black !important;
      font-weight: bold !important
    }

    .text-white-bold {
      color: white !important;
      font-weight: bold !important
    }

    .btn-lemon {
      border: 2px solid white;
      /* border-radius: 10px!important; */
      padding: 8px 20px 8px 20px ! important;
      width: 200px
    }

    .btn-lemon-full {
      border: 2px solid transparent;
      /* border-radius: 10px!important; */
      padding: 8px 20px 8px 20px ! important;
      background-color: #a8cf38;
      color: white;
    }

    .btn-white-full {
      border: 1px solid black;
      border-radius: 10px !important;
      padding: 8px 20px 8px 20px ! important;
      background-color: white;
      color: black;
    }

    .lang.dropdown-menu.show {
      margin-top: 2rem;
      border: 1px solid black;
      border-radius: 10px !important;
      background-color: white;
      color: black;
    }

    .group.dropdown-menu.show {
      margin-top: 2rem;
      border: 1px solid black;
      border-radius: 10px !important;
      background-color: white;
      color: black;
    }

    .owl-nav {
      display: none;
    }

    .owl-dots {
      display: none;
    }

    .no-margin {
      margin-left: 0px !important;
      margin-right: 0px !important;
    }

    .text-lemon {
      color: #a8cf38;
    }

    .bg-green {
      background-color: #24A85A;
    }

    .text-lemon-bold {
      color: #a8cf38;
      font-weight: bold;
    }

    .bg-maron {
      background-color: rgb(245, 240, 240);
    }

    .no-underline {
      text-decoration: none !important;
    }

    .float-msg {
      display: flex;
      background-color: white;
      color: #a8cf38;
      border: 1px solid white;
      border-radius: 1rem;
      position: fixed;
      bottom: 3rem;
      right: 1rem;
      padding: 0 1rem 0rem 1rem;
      z-index: 99;
      font-weight: bold;
      box-shadow: 0rem 0.1rem 0.5rem 0.2rem #6c757d29;
    }

    .breath {
      padding: 0rem 3rem 0rem 3rem;
    }

    .bg-gray {
      background-color: rgb(255, 249, 249);
    }

    .zoom-effect {
      transform: scale(1);
    }

    .zoom-effect:hover {
      color: white;
      text-align: center;
      transform: scale(1.2);
      cursor: pointer;
    }

    .img-zoom {
      transform: scale(1);
    }

    .img-zoom:hover {
      transform: scale(1.2);
      cursor: pointer;
    }

    .header {
      font-size: 2.5rem !important;
      font-weight: bolder;
    }

    .nav-fixed {
      position: fixed;
      width: -webkit-fill-available;
      z-index: 99;
    }

    .tcb-input {
      height: 3.5rem;
      background-color: rgb(255, 249, 249);
      border-radius: 1rem;
      padding: 1rem 2rem 1rem 2rem;
      font-family: 'Gotham_Light';
    }

    #send {
      border-radius: 1rem;
      padding: 1rem 2.5rem 1rem 2.5rem !important;
      transform: scale(1);
    }

    #send:hover {
      color: white;
      /* transform: scale(1.5); */
      cursor: pointer;
    }

    .shadow {
      box-shadow: 0rem 0.5rem 0.1rem 0rem #6c757d29;
    }

    .login-form {
      background-color: white;
      box-shadow: 0rem 0.1rem 0.5rem 0.2rem #6c757d29;
    }

    .tcb-login-input {
      padding: 1.5rem 2rem 1.5rem 2rem;
      font-family: 'Gotham_Light';
      box-shadow: 0rem 0.1rem 0.5rem 0.2rem #6c757d29;
    }

    #tcb-login-btn {
      font-family: 'Gotham_Light';
      box-shadow: 0rem 0.1rem 0.5rem 0.2rem #6c757d29;
    }

    .full-mt {
      margin-top: 8rem !important
    }

    .new-breath {
      padding-left: 10rem !important;
      padding-right: 10rem !important;
    }

    .new-breath-top {
      padding-left: 10rem !important;
      padding-right: 8rem !important;
    }
  </style>
  <script src="https://kit.fontawesome.com/637d7774d7.js" crossorigin="anonymous" async></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" async></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
</head>

<body class="container-fluid">
  <div class="container-fluid row justify-content-center no-margin pl-5 pr-5 mt-5 full-mt">
    <main class="col-md-12 login-form p-5">
      <h4 class="login-title gotham text-black-bold">Bonjour Structure : {{session()->get('user')->name}} <span class="text-lemon"> <?php if ($users_parent) { ?>Franchise : <?php echo $users_parent[0]->name;} ?></span></h4>
      <a class="float-right mb-3" href="/logout"><i class="fa fa-power-off"></i> Deconnexion</a>
      <br>
      <hr>
      <table class="table table-light">
        <thead class="thead-light">
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Mes Permissions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ session()->get('user')->name }}</td>
            <td>{{ session()->get('user')->email }}</td>
            <td>
              @foreach ($permissions as $key => $permission)

              <li>{{ $permission->nom }}</li>
              @endforeach
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>

  <footer>
    <div class="container-fluid row justify-content-center">
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" async></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js" async></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" async></script>
</body>

</html>