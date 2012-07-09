
<?
    $td = 'border-bottom:1px solid #DEDEDE; padding:4px 6px; font-size:12px;';
    $td2 = 'border-bottom:1px solid #DEDEDE; padding:4px 0; font-size:12px;';
    $tr_title = 'background-color: #666666; color:#FFFFFF; border:0px; font-size:12px;';
?>

<table width="550" cellspacing="0" cellpadding="0" style="margin:0;padding:0;color:#848484; font-family:Tahoma; font-size:11px; line-height:16px; text-align:left; text-decoration:none; margin: 0 auto; margin-top: 20px; width: 550px; border: 1px solid #DEDEDE; border-bottom: none; background: none repeat scroll 0 0 #FFFFFF">

    <thead>
        <tr valign="middle" style="height: 100px;">
            <td colspan="2" style="<? echo $td; ?>">
                <img alt="Sohotravel" src="http://www.it-montenegro.com/sohotravel.me/assets/img/logo_small_invoice.png" />
            </td>
            <td colspan="2" align="right" style="padding-right: 20px; <? echo $td; ?> padding: 4px 16px">
                <h1 style="font-size: 21px;">Payment Link</h1>
            </td> 

        </tr>
        <tr valign="middle" style="height: 100px; ">
            <td colspan="2" style="font-weight: bold; border-right: 1px solid #DEDEDE; width: 275px; <? echo $td; ?> padding: 8px 10px;">
                Sohotravel Montenegro 85000 Bar,                                                                    <br>
                Bulevar Revolucija G12                                                                              <br />
                Mail: <a style="color: #333;" href="mailto:info@sohotravel.me">info@sohotravel.me</a>               <br />
                Web: http://www.sohotravel.me                                                                       <br />
                Tel: +382 30 311 481                                                                                <br />
                Fax: +382 30 303 569                                                                                <br />
                Mob-tel: + 382 69 474 474, 63 210 211                                                               <br />
            </td>
            <td colspan="2" align="left" style="padding: 10px; <? echo $td; ?>">
                <h1 style="font-size: 18px;">Client</h1><br> 
                <b>
                    <?php echo $_POST['email'];?>       <br>

                </b>              
            </td>

        </tr>
        
    </thead>
     <tbody>
        <tr>
            <td colspan="2" style="padding: 9px 13px; border-bottom:1px solid #DEDEDE;">
                <a style="color: #000; font-size: 11px;" href="http://www.it-montenegro.com/payservice/service/test_pay/<?=$ID?>/avio">click to pay by credit card</a>
            </td>
            <td colspan="2" style="padding: 9px 13px; border-bottom:1px solid #DEDEDE;">
                <img src="http://www.it-montenegro.com/excursionstours-pro/assets/img/credit_cards.png" alt="" />
            </td>                                            
        </tr>
     </table>
