@extends('layout')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Modifier une structure</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Structures</a></li>
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
            <input type="hidden" name="id" id="id" value="{{ $structure->id }}">
            <div class="form-group">
                <label for="inputName">*Franchise :</label>
                <select name="structure" class="form-control" id="parent">
                    @foreach($franchises as $franchise)
                        <option {{ ($franchise->id == $structure->parent) ? 'selected' : ''  }} value="{{ $franchise->id }}">{{ $franchise->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="inputName">*Nom :</label>
              <input type="text" value="{{ $structure->name }}" id="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">*Email :</label>
              <input type="email" value="{{ $structure->email }}" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">*Mot de passe :</label>
              <input type="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">*Adresse Postal :</label>
              <input type="text" value="{{ $structure->adresse }}" id="adresse" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">*Token :</label>
              <input type="text" value="{{ $structure->token }}" id="token" class="form-control">
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

    function save()
    {
      if ($('#nom').val() != '' && $('#email').val() != ''  && $('#token').val() != '' && $('#adresse').val() != ''  && $('#parent').val() != '') {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var adresse = $('#adresse').val();
            var token = $('#token').val();
            var parent = $('#parent').val();

            $('#btnSubmit').html('Veuiller patienter <i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                url: "/updateStructureAjax",
                type: "POST",
                data: {
                  id:$('#id').val(),
                  name:name,
                    email:email,
                    password:password,
                    adresse:adresse,
                    token:token,
                    parent:parent
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