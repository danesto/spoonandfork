$(document).ready(function () {

    $("#gradovi").change(function () {

        let grad = $(this).val();
        console.log(grad);
        $.ajax({
            url: '../../models/restorani/filter.php',
            method: 'GET',
            data: {
                grad: grad
            },

            success: function (data, status, xhr) {

                $(".gradovi").hide().html(data).fadeIn('fast');


            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });

    $(".filterChbox").change(function(){
        if($(this).is(':checked')){
       
        let Chbox=$(this).val();
        console.log(Chbox);

        $.ajax({
            url: '../../models/chboxFilter.php',
            method: 'GET',
            dataType:'json',
            data:{
                Chbox:Chbox
            },
            success: function(data, status, xhr){
                let html='';
                for(let x of data){
                    html+=`<li>${x.grad}</li>`;
                }
                $('.grad').html(html);
            },
            error: function(xhr, status, statusText){
                console.log(status + xhr + statusText);
            }
        })
             
        }
    })
})