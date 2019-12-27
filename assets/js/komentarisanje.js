$(document).ready(function(){

$("#postujKomentar").on('click',function () {

        let id=$('#id_restorana').val();
       	let komentar = $('#komentar').val();
        // console.log(komentar);
        $.ajax({
            url: '../models/restorani/komentarisanje.php',
            method: 'GET',
            data: {
                id:id,
                komentar: komentar
            },
            success: function (data, status, xhr) {
               
    $.ajax({ 
        url: '../models/restorani/komentari.php',
        method: 'GET',
        dataType:'json',
        data:{
            id:id,

        },
        success: function(data,status, xhr){
            let html='';
            for(let i of data){
                html+=`   <div class="col-md-8 p-3 border-bottom mb-5">
       
        <h5 class="font-weight-bold mb-3">${i.ime} ${i.prezime}</h5>
        <div class="w-50 mb-3 my-auto ml-3">${i.komentar}</div>
      </div>`;
            }
            $('#comments').html(html);
           // document.getElementById('comments').innerHtml=data;

        },
        error: function(xhr, status, statusText){
            console.error('----> ERROR <----');
            console.log(xhr);
        }
    })


            },
            error: function (xhr, status, statusText) {

                console.log(status + xhr + statusText);
            }
        })
    });
    
})


