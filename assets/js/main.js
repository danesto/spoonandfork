$(document).ready(function () {
  

    //ajax requests
    $("#register").click(function () {
        let email = $("#email").val();
        let brojTelefona = $("#brojTelefona").val();
        let sifra = $("#sifra").val();
        let ime = $("#ime").val();
        let prezime = $("#prezime").val();
        $.ajax({
            url: '../models/korisnici/register.php',
            method: 'POST',
            data: {
                email: email,
                brojTelefona: brojTelefona,
                sifra: sifra,
                ime: ime,
                prezime:prezime
        
            },

            success: function (data, status, xhr) {
               $('.show').html(data);
            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });



})