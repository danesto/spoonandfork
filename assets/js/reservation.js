$(document).ready(function(){
        
$("#reserve").click(function () {
        let date = $("#date").val();
        let time = $("#time").val();
        let people = $("#people").val();
        let restoran = $("#restoran_id").val();
        if(!date, !time){
            alert("Morate izabrati datum i vreme");
        }

        else{


        $.ajax({
            url: '../models/restorani/reservation.php',
            method: 'GET',
            data: {
                date: date,
                time: time,
                people: people,
                restoran: restoran
            },

            success: function (data, status, xhr) {
               let html='';
               html+='<div class="alert alert-success">Vas zahtev je uspesno poslat! Bicete kontaktirani kako bi ste potvrdili rezervaciju!</div>';
            $("#alert").append(html);
            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    }
    });

$(".deleteRez").click(function () {
        let data=$(this).data("id");
        var row = $(this).parent().parent();
        $.ajax({
            url: '../models/admin/deleteRez.php',
            method: 'GET',
            data: {
               data:data
            },

            success: function (data, status, xhr) {
                row.fadeOut().remove();
            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });
})

