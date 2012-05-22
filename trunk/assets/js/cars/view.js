$(document).ready(function(){

    // code goes here
    $('.deletecar').bind('click',function(){
        if(confirm('Are you sure?')){
            var id = $(this).attr('id');
            var me = $(this);
            $.ajax({
                url: base_url + 'car/delete',
                type: 'POST',
                data: ({id:id}),
                dataType: 'json',
                success: function(data){
                    if(data.success == 'success'){
                        $('#infomessage').html('Successful delete car operation.').fadeIn('normal');
                        $(me).parent().parent().remove();
                    }else{
                        alert('Error!');
                    }
                }
            });
        }
    });

});