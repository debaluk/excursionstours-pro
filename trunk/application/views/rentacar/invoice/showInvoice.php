
<?
    $td = 'border-bottom:1px solid #DEDEDE; padding:4px 6px; font-size:12px;';
    $td2 = 'border-bottom:1px solid #DEDEDE; padding:4px 0; font-size:12px;';
    $tr_title = 'background-color: #666666; color:#FFFFFF; border:0px; font-size:12px;';
?>

<table width="550" cellspacing="0" cellpadding="0" style="margin:0;padding:0;color:#848484; font-family:Tahoma; font-size:11px; line-height:16px; text-align:left; text-decoration:none; margin: 0 auto; margin-top: 20px; width: 550px; border: 1px solid #DEDEDE; border-bottom: none; background: none repeat scroll 0 0 #FFFFFF">

    <thead>
        <tr valign="middle" style="height: 100px;">
            <td colspan="2" style="<? echo $td; ?>">
                <img alt="Globtour" src="http://www.informacionisistem.com/excursionstours/assets/img/logo.jpg">
            </td>
            <td colspan="2" align="right" style="padding-right: 20px; <? echo $td; ?> padding: 4px 16px">
                <h1 style="font-size: 21px;">Invoice</h1>
                number: <b style="font-size: 18px"><?php echo $invoice_no;?></b><br>
                <? echo  date("d.m.Y") ;?>
            </td> 

        </tr>
        <tr valign="middle" style="height: 100px; ">
            <td colspan="2" style="font-weight: bold; border-right: 1px solid #DEDEDE; width: 275px; <? echo $td; ?> padding: 8px 10px;">
                Globtour Montenegro 85 310 Budva, Dositejeva 4    <br>
                Mail: info@globtour.me                       <br>
                <a href="http://www.globtourmontenegro.com" target="_blank" style="color: #848484; text-decoration: none;">www.globtour.me</a>            <br>
                Tel: + 382 33 451-020, 455-683                    <br>
                Fax: +382 33 452-827                              <br>
                Mob: +382 69 069 316             <br>
            </td>
            <td colspan="2" align="left" style="padding: 10px; <? echo $td; ?>">
                <h1 style="font-size: 18px;">Client</h1><br> 
                <b>
                    <?php echo $cust_firstName;?>       <br>
                    <?php echo $cust_email;?>           <br>
                    <?php echo $cust_phone;?>           <br>
                </b>              
            </td>

        </tr>
        <tr>
            <td style="font-weight: bold;<? echo $td.$tr_title; ?>">Title</td>
            <td style="font-weight: bold;<? echo  $td.$tr_title; ?>">Description</td>
            <td style="text-align: center; font-weight: bold;<? echo  $td.$tr_title; ?>">Price</td>
            <td style="text-align: center; font-weight: bold;<? echo  $td.$tr_title; ?>">Sub-Total</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4" style="<? echo $td; ?>">
                <b><?php echo $invoice_title;?></b>
            </td>                                           
        </tr>
        <?
            for($i=0;$i<count($titles);$i++){
            ?>
            <tr>
                <td style="<? echo $td; ?>">
                    <?php echo $titles[$i];?> 
                </td>
                <td <?if(!isset($prices)){?> colspan="3" <?}?> style="<? echo $td2 ?>">
                    <?php echo $datas[$i];?> 
                </td>
                
                <?if(isset($prices)){?>
                
                    <td style="text-align: center;<? echo $td; ?>">&euro; <?=number_format($prices[$i], 2, '.', '');?></td>
                    <td style="text-align: center;<? echo $td; ?>">&euro; <?=number_format($prices[$i], 2, '.', '')?></td>
                
                <?}?>
            </tr>
            <?
            }
        ?>
        <tr>
            <td style="<? echo $td; ?>"><?php echo $price_title;?> </td>
            <td style="<? echo $td2; ?>"><?php echo $price_desc;?> </td>            
            <td style="text-align: center;<? echo $td; ?>">&euro; <?php echo number_format($price_day_price, 2, '.', '');?>  </td>
            <td style="text-align: center;<? echo $td; ?>">&euro; <?php echo number_format($price_total_price, 2, '.', '');?>  </td>  

        </tr>       

        <?
            if(isset($accesories)){
                foreach($accesories as $ac){
                ?>
                <tr>
                <td style="<? echo $td; ?>">Accessories: </td>
                <td style="<? echo $td2; ?>"><?=$ac->type;?> - <?=$cb_numofdays;?> day(s)</td>            
                <td style="text-align: center;<? echo $td; ?>">&euro; <?=number_format($ac->price, 2, '.', '');?></td>
                <td style="text-align: center;<? echo $td; ?>">&euro; <?=number_format($ac->price*$cb_numofdays, 2, '.', '')?></td>  
                <?    
                }
            } 
        ?>

        <tr>
            <td colspan="2" style="<? echo $td; ?> border-bottom: 0">&nbsp;</td>
            <td style="text-align: center;<? echo $td; ?> border-left: 1px solid #DEDEDE;"><b>Total:</b></td>
            <td style="text-align: center;<? echo $td; ?>"><b>&euro; <?php echo number_format($total_price, 2, '.', '');?>  </b></td>
        </tr>
        <tr>
            <td colspan="2" style="<? echo $td; ?> ">&nbsp;</td>
            <td style="text-align: center;<? echo $td; ?> border-left: 1px solid #DEDEDE;"><b>Paid:</b></td>
            <td style="text-align: center;<? echo $td; ?>"><b>&euro; <?php echo number_format($total_price, 2, '.', '');?>  </b></td>
        </tr>        
        <tr>
            <td colspan="4" style="padding: 8px 10px; border-bottom: 1px solid #DEDEDE;">
                <b>
                    Information about cancellation should <br />
                    be sent to Globtour Montenegro by fax<br /> 
                    or e-Mail, referring to the number of <br />
                    invoice: <?=$invoice_no?></b></td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 8px 10px; border-bottom: 1px solid #DEDEDE;"><b>REMARK:</b></td>
            <td colspan="2" width="300px" style="padding:6px; border-bottom: 1px solid #DEDEDE;">Cancellation fees: 20% of a whole amount. <br />Regarding any cancellations, please contact Globtour Montenegro.</td>
        </tr>
        <tr>
            <td colspan="4" align="center" style="padding: 40px;<? echo $td; ?>">
                <table style="border: none; margin:0;padding:0;color:#848484; font-family:Tahoma; font-size:12px; line-height:16px; text-decoration:none;" >
                    <tr align="center">
                        <td colspan="2" style="border: none"><span>Thank You for your business!</span></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" style="border: none"><h2 style="margin-top: 5px;">Sincerely</h2></td>

                    </tr>
                    <tr align="center">
                        <td style="border: none;"><img alt="Globtour" src="http://www.informacionisistem.com/excursionstours/assets/img/globtour.png"></td>
                        <td style="border: none"><p style="font-style: italic;" >Globtour Montenegro</p></td>
                    </tr>
                </table>                

            </td>
        </tr>
    </tbody>
</table>
