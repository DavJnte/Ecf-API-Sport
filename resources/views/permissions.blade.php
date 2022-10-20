@extends('layout')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Gérer les permissions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Permissions</a></li>
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
              <h3 class="card-title">Liste des permissions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Intitulé</th>
                  <th>Page</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key=>$permission)
                        <tr>
                            <td>{{ $permission->nom }}</td>
                            <td>{{ $permission->code }}</td>
                            <td align="center">
                                <a class="m-1" href="/editPermission/{{ $permission->id }}"><i class="fa fa-pen"></i></a>
                                <a class="m-1" onclick="return confirm('Supprimer cette permission ?');" href="/deletePermission/{{ $permission->id }}"><i class=" text-danger fa fa-trash"></i></a>
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