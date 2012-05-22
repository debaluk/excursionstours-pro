<style>
    table td{
        font-size: 11px;
        color: #666666;
    }
</style>
<form method="POST" action="<?=base_url()?>login/newuser" id="newuser_form">    
    <table align="center">
        <tr><td colspan="2"><h2>Unos novog korisnika</h2></td></tr>     
        <tr>
            <td colspan="2" style="width: 200px">&nbsp;<?php echo validation_errors(); ?><?php if(isset($logerror))echo $logerror; ?></td>
        </tr>
        <tr>
            <td> Nicename:</td>
            <td> <input type="text" name="nicename" size="15" value="<?php echo set_value('lastname'); ?>" /> </td>
        </tr>
        <tr>
            <td> Email:</td>
            <td> <input type="text" name="email" size="15" value="<?php echo set_value('email'); ?>" /> </td>
        </tr>
        <tr>
            <td> Password:</td>
            <td> <input type="password" name="password_one" size="15" /> </td>
        </tr>
        <tr>
            <td> Password again:</td>
            <td> <input type="password" name="password_two" size="15" /> </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <a href="javascript:" class="btn" style="float: right; margin-top: 7px;" id="submit_form">Kreiraj korisnika</a>
            </td>
        </tr>
    </table>
</form>


<script type="text/javascript" 
    src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
    // You may specify partial version numbers, such as "1" or "1.3",
    //  with the same result. Doing so will automatically load the 
    //  latest version matching that partial revision pattern 
    //  (e.g. 1.3 would load 1.3.2 today and 1 would load 1.5.1).
    google.load("jquery", "1.5.1");

    google.setOnLoadCallback(function() {
        // Place init code here instead of $(document).ready()
        $(document).ready(function(){  
            $('#actionclose').live('click',function(){
                $('#actioninfo').html('Clear');
            })
            
            $('#submit_form').live('click',function(){
                $('#newuser_form').trigger('submit');
            })
        });
    });
</script>