window.onload=function(){

$("#search").keyup(function () {

       	let pretraga = $(this).val();
        console.log(pretraga);
        $.ajax({
            url: '../../models/restorani/pretraga.php',
            method: 'GET',
            data: {
                pretraga: pretraga
            },

            success: function (data, status, xhr) {
      			$(".gradovi").hide().html(data).fadeIn('fast');
            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });
}