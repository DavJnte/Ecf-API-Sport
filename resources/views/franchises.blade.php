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
                <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Token</th>
                  <th>Statut</th>
                  <th>Permissions</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($franchises as $key=>$franchise)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $franchise->name }}</td>
                            <td>{{ $franchise->email }}</td>
                            <td>{{ $franchise->token }}</td>
                            <td>{{ ($franchise->verified) ? 'Vérifiée' : 'Non vérifiée' }}</td>
                            <td>
                              <ul>    
                                  @foreach ($franchises_permissions[$franchise->id] as $permission)
                                      <li>{{ $permission->nom.'( '.$permission->code.')' }}</li>
                                  @endforeach
                              </ul>
                            </td>
                            <td align="center">
                                <a class="m-1" href="/editFranchise/{{ $franchise->id }}"><i class="fa fa-pen"></i></a>
                                <a class="m-1" onclick="return confirm('Supprimer cette franchise ?');" href="/deleteFranchise/{{ $franchise->id }}"><i class="text-danger fa fa-trash"></i></a>
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