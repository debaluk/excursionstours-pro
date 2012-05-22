$(document).ready(function(){
    $('#editcar').live('submit',function(){
        $('#infomessage').hide();
        $.ajax({
            url: base_url+'car/update',
            dataType: 'json',
            type:   'POST',
            data:   $('#editcar').serialize(),
            success: function(data){
                if(data.success == 'success'){

                    $('#infomessage').html('Successful edit car operation.').fadeIn('slow');
                    $('#editcar').fadeOut(300,function(){
                        $('#editcar').remove();
                    });

                }else{
                    $('#infomessage').html(data.message).fadeIn(100);
                }
            }
        });

    });

});