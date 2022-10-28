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
  <link rel="stylesheet" href="/public/dist/css/style.css">
  <script src="https://kit.fontawesome.com/637d7774d7.js" crossorigin="anonymous" async></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" async></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
</head>

<body class="container-fluid">
  <div class="container-fluid row justify-content-center no-margin pl-5 pr-5 mt-5 full-mt">
    <main class="col-md-12 login-form p-5">
      <h4 class="login-title gotham text-black-bold"> Bonjour : {{session()->get('user')->name}} 
        <span class="text-lemon">
          <?php if ($users_parent) { ?>
           <br> Franchise : <?php echo $users_parent[0]->name;
          } ?>
          </span>
        </h4>
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

  <footer></footer>
</body>

</html>