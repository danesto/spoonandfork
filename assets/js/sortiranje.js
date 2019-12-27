$(document).ready(function(){

	$(".sort").click(function () {

       	let sort = $(this).val();
        console.log(sort);
        $.ajax({
            url: '../../models/restorani/sort.php',
            method: 'GET',
            data: {
                sort: sort
            },

            success: function (data, status, xhr) {
      			// $(".gradovi").hide().html(data).fadeIn();
				$(".gradovi").hide().html(data).fadeIn('fast');
            // $('.gradovi').html(data).fadeIn(slow);

            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });
})