@extends('layout')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Gérer les franchises</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Franchises</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des franchises</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <a href="/addFranchise/" type="button" id="ajout" class="btn btn-primary" style="width:100px;">Ajouter</a>
                <tr style="text-align:center;">
                  <th>Nom :</th>
                  <th>Email :</th>
                  <th>Token :</th>
                  <th>Statut :</th>
                  <th>Permissions :</th>
                  <th>Actions :</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($franchises as $key=>$franchise)
                        <tr>
                            <td style="text-align:center ;">{{ $franchise->name }}</td>
                            <td style="text-align:center ;">{{ $franchise->email }}</td>
                            <td style="text-align:center ;">{{ $franchise->token }}</td>
                            <td style="text-align:center ;">{{ ($franchise->verified) ? 'Vérifiée' : 'Non vérifiée' }}</td>
                            <td style="text-align:center ;"> <?php if($franchise->deleted==0){
                              echo'Activé';
                            }
                              else{echo 'Désactivé';} ?>
                            </td>
                            <td>
                              <ul>    
                                  @foreach ($franchises_permissions[$franchise->id] as $permission)
                                      <li>{{ $permission->nom }}</li>
                                  @endforeach
                              </ul>
                            </td>
                            <td style="text-align:center">
                            <?php if($franchise->deleted==0){ ?>
                              <a onclick="return confirm('Etes-vous sûr de vouloir désactiver la Franchise ?');" href="/status_updatef/{{ $franchise->id }}" type="button" class="btn btn-info">Désactiver</a>
                           <?php }
                              else{?> 
                              <a onclick="return confirm('Etes-vous sûr de vouloir réactiver la Franchise ?');" href="/status_updatef/{{ $franchise->id }}" type="button" class="btn btn-light">Réactiver</a> 
                            <?php }?>
                            <a href="/editFranchise/{{ $franchise->id }}" type="button" class="btn btn-warning">Modifier</a>
                            <a class="btn btn-danger" onclick="return confirm('Supprimer cette franchise ?');" href="/deleteFranchise/{{ $franchise->id }}">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection