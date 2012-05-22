$(document).ready(function(){
    // on submit addcar form
    $('#addcar').live('submit',function(){
        $('#infomessage').html(' ').hide();
        $.ajax({
            url: base_url + 'car/create',
            type: 'POST',
            data: $("#addcar").serialize(),
            dataType: 'json',
            success: function(data){
                if(data.success == 'success'){
                    $('#infomessage').html('Successful add car operation.').fadeIn('fast');
                    $('#addcar').fadeOut(300,function(){
                        $('#addcar').remove();
                    });
                }else{
                    $('#infomessage').html(data.message).fadeIn('fast');
                }
            }
        });

    });
});
