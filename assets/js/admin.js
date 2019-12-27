$(document).ready(function(){
	$(".deleteRes").click(function () {
        let data=$(this).data("id");
        var row = $(this).parent().parent();
        $.ajax({
            url: '../models/admin/deleteRestoran.php',
            method: 'GET',
            data: {
               data:data
            },

            success: function (data, status, xhr) {
            	console.log(data);
                row.fadeOut().remove();
            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });

    $("#edit").click(function () {
        let email=$("#email").val();
        let broj_telefona=$("#broj_telefona").val();
        let ime=$("#ime").val();
        let prezime=$("#prezime").val();
        let sifra=$("#sifra").val();
        let uloga=$("#uloga").val();

        $.ajax({
            url: '../models/admin/userupdate.php',
            method: 'POST',
            data: {
               email:email,
               broj_telefona:broj_telefona,
               ime:ime,
               prezime:prezime,
               sifra:sifra,
               uloga:uloga
            },

            success: function (data, status, xhr) {
                let html='';
                html+=`<div class="alert alert-success mx-auto">Vaše izmene su uspešno poslate! Ponovo se ulogujte kako bi ih sačuvali!</div>`;
                $('#ispis').html(html);
            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });




})