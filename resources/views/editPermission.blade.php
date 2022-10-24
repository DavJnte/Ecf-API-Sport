@extends('layout')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Modifier une permission</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Permissions</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Formulaire</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <input type="hidden" id="id" value="{{ $permission->id }}">


            <div class="form-group">
              <label for="inputName">*Nom :</label>
              <input type="text" value="{{ $permission->nom }}" id="nom" class="form-control">
            </div>
            <div class="row">
              <div class="col-12">
                <button id="btnSubmit" onclick="save()" class="btn btn-success float-left">Enregistrer</button>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </div>
</section>

@endsection
@section('script')
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function save() {
    if ($('#nom').val() != '') {
      var nom = $('#nom').val();
      var code = $('#code').val();
      $('#btnSubmit').html('Veuiller patienter <i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
        url: "/updatePermissionAjax",
        type: "POST",
        data: {
          id: $('#id').val(),
          nom: nom,
        },
        success: function(msg) {
          console.log(msg);
          var val = msg.split("||");
          if (val[0] == "true") {
            toastr.success(val[1]);
            setTimeout(() => {
              location.reload();
            }, 600);
          } else if (val[0] == "false") {
            toastr.error(val[1]);
            $('#btnSubmit').html('Enregistrer');
          }
        }
      });
    } else {
      toastr.error('Tous les champs avec * sont requis');
    }
  }
</script>
@endsection