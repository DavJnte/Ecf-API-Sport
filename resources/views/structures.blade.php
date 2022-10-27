@extends('layout')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Gérer les structures</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Structures</a></li>
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
              <h3 class="card-title">Liste des structures</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <a href="/addStructure/" type="button" id="ajout" class="btn btn-primary" style="width:100px;">Ajouter</a>

                  <!-- La barre de recherche devrait etre ici -->

                <tr style="text-align:center;">
                  <th>De la Franchise :</th>
                  <th>Nom :</th>
                  <th>Email :</th>
                  <th>Adresse :</th>
                  <th>Email Vérifié :</th>
                  <th>Status :</th>
                  <th>Permissions :</th>
                  <th>Actions :</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($structures as $key=>$structure)
                        <tr>
                            <td style="text-align:center ;">{{ $structure->parentName }}</td>
                            <td style="text-align:center ;">{{ $structure->name }}</td>
                            <td style="text-align:center ;">{{ $structure->email }}</td>
                            <td style="text-align:center ;">{{ $structure->adresse }}</td>
                            <td>{{ ($structure->verified) ? 'Vérifiée' : 'Non vérifiée' }}</td>
                            <td style="text-align:center ;"> <?php if($structure->deleted==0){
                              echo'Activé';
                            }
                              else{echo 'Désactivé';} ?>
                            </td>
            
                            <td>
                              <ul>    
                                  @foreach ($franchises_permissions[$structure->parentId] as $permission)
                                      <li>{{ $permission->nom }}</li>
                                  @endforeach
                              </ul>
                            </td>
                            <td style="text-align:center">
                            <?php if($structure->deleted==0){ ?>
                              <a onclick="return confirm('Etes-vous sûr de vouloir désactiver la structure ?');" href="/status_update/{{ $structure->id }}" type="button" class="btn btn-info">Désactiver</a>
                           <?php }
                              else{?> 
                              <a onclick="return confirm('Etes-vous sûr de vouloir réactiver la structure ?');" href="/status_update/{{ $structure->id }}" type="button" class="btn btn-light">Réactiver</a> 
                            <?php }?>

                            <a href="/editStructure/{{ $structure->id }}" type="button" class="btn btn-warning">Modifier</a>
                            <a class="btn btn-danger" onclick="return confirm('Supprimer cette structure ?');" href="/deleteStructure/{{ $structure->id }}">Supprimer</a>
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