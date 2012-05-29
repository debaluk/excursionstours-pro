<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>Welcome - Please Login</title>
        <style type="text/css">
            * {
                margin: 0px;
                padding: 0px;outline: none;
            }

            body {
                background: #FBFBFB;
            }

            form {
                /*border: 10px solid #F0F0F0; */
                width: 290px;
                /*background: url('<?=base_url()?>assets/img/backgnds/login-bg.png') no-repeat center center;*/
                margin:50px auto;
                /*padding: 0;
                border-radius: 11px 11px 11px 11px;  */



                background: none repeat scroll 0 0 #FFFFFF;
                border: 1px solid #E5E5E5;
                box-shadow: 0 4px 10px -1px rgba(200, 200, 200, 0.7);
                font-weight: normal;

                padding: 26px 24px 46px;


            }
            .content{
                padding:20px;
                width: 250px;
            }

            label {
                color: #777777;
                cursor: pointer;
                display: block;
                font-family: arial,sans-serif;
                font-size: 14px;
                list-style-type: none;
                margin-bottom: 3px;
            }

            input.text {
                background: none repeat scroll 0 0 #FBFBFB;
                border: 1px solid #E5E5E5;
                box-shadow: 1px 1px 2px rgba(200, 200, 200, 0.2) inset;
                font-size: 24px;
                font-weight: 200;
                line-height: 1;
                margin-bottom: 16px;
                margin-right: 6px;
                margin-top: 2px;
                outline: medium none;
                padding: 3px;
                width: 243px;
            }

            input.button-primary {
                -moz-box-sizing: content-box;
                background: none repeat scroll 0 0 #414141;
                border-color: #414141;
                border-radius: 11px 11px 11px 11px;
                border-style: solid;
                border-width: 1px;
                color: #FFFFFF;
                cursor: pointer;
                font-size: 13px !important;
                font-weight: bold;

                min-width: 80px;
                padding: 3px 8px;
                text-align: center;
                text-decoration: none;
                margin-top: 10px;
                float: right;
                line-height: 19px; 
            }

            .errors{
                font-size: 12px;
                font-family: arial, sans-serif;
                color: #333;                
                background-color: #FFEBE8;
                border-color: #CC0000;
                margin: 0 0 16px 0;
                padding: 12px;
                border-radius: 3px 3px 3px 3px;
                border-style: solid;
                border-width: 1px;
            }

        </style>
    </head>

    <body>

        <form method="POST" action="<?=base_url()?>login/loginuser" id="login_form">

            <div><img src="<?=base_url()?>assets/img/backgnds/login.png" /></div>

            <div class="content">

                <div class="errors" <? if(validation_errors()=='' && !isset($logerror))echo'style="display:none;"';?>><?php echo validation_errors(); ?><?php if(isset($logerror))echo $logerror; ?></div>

                <label for="email">Username:</label>
                <input type="text" name="email"  value="<?php echo set_value('email'); ?>" class="text"  />    

                <label for="password">Password:</label>
                <input type="password" name="password" class="text"  />

                <input type="submit" value="Login" name="submit" class="button-primary" />
            </div>

        </form>    

    </body>

</html>