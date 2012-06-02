accesories_url = base_url+'rentacar/set_accessories';

var accesories = function (){
    $('#ajax_loader').show();

    data = $('#car_accasories').serialize();
    $.ajax({
        dataType: 'JSON',
        type: 'POST',
        data: data,
        url: accesories_url,
        onerror: null,
        success: function(data){
            
            if(data.action==true){
                $('#ajax_loader').hide();
                $('#accessories_preview').show();
                popc();

                $('#accessories_preview ul').html(data.html);
                $('#final_price').html(data.tot_price);

            }else{
                $('#ajax_loader').hide();
                alert('Error ocured while adding extras.')
            }            

        }
    });
}