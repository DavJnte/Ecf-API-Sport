
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function login()
    {
        if ($('#username').val() != '' && $('#password').val() != '') {
            var username = $('#username').val();
            var password = $('#password').val();

            $('#btnSubmit').html('Veuiller patienter <i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                url: "/loginAjax",
                type: "POST",
                data: {
                    username: username,
                    password: password
                },
                success: function(msg) {
                    console.log(msg);
                    var val = msg.split("||");
                    if (val[0] == "true") {
                        $('#btnSubmit').html('Connexion établie');
                        toastr.success(val[1]);
                        setTimeout(() => {
                            location.href = '/home';
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
    }