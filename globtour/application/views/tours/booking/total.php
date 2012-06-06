<style type="text/css">
    #content li {
        color: #848484;
    }
</style>
<input type="hidden" value="<?=$tb_newid;?>" id="book_id">
<div class="box">
    <img alt="Globtour" src="<?=base_url()?>assets/img/logo.jpg" style="margin-left: 50px; margin-top: 50px;">
</div>
<div class="exc">
    <div id="total_t">
        <div style="font-weight: normal; line-height: 30px;" class="excbookingSection">
            <?=$langs['booking_number'];?>: <b><?php echo $tb_newid;?></b>.
        </div>
        <h2><?=$langs['booking_is_accepted'];?></h2>


        <table width="100%" cellspacing="0" cellpadding="0" class="excbookingTable">
            <thead>
                <tr>
                    <td style="font-weight: bold; width: 150px"><?=$langs['title'];?></td>
                    <td style="font-weight: bold;"><?=$langs['description'];?></td>
                    <td style="text-align: center; font-weight: bold;"><?=$langs['price'];?></td>
                    <td style="text-align: center; font-weight: bold;"><?=$langs['sub_total'];?></td>
                </tr>
            </thead>
            <tbody id="tablebody">
                <tr>
                    <td>
                        <?=$langs['tour'];?>
                    </td>
                    <td colspan="3">
                        <?php echo $t_title ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?=$langs['duration'];?>
                    </td>
                    <td colspan="3">
                        <?php echo $t_nodays; ?> / <?php echo $t_nonights; ?> 
                    </td>

                </tr>
                <tr>
                    <td>
                        <?=$langs['pickup_location'];?>
                    </td>
                    <td colspan="3">
                        <?php echo $t_pickup_location; ?>
                    </td>

                </tr>
                <tr>
                    <td>
                        <?=$langs['traveler'];?> (<?=$langs['adult'];?>)
                    </td>
                    <td>
                        <?php echo $tb_noadult; ?>     
                    </td>
                    <td style="text-align: center;">&euro;<?php echo $tb_adultprice;  ?></td>
                    <td style="text-align: center;">&euro;<?php echo $tb_adultprice_sub;  ?>.00</td>
                </tr>
                <tr>
                    <td>
                         <?=$langs['traveler'];?> (<?=$langs['child'];?>)
                    </td>
                    <td>
                        <?php echo $tb_noch; ?>  
                    </td>
                    <td style="text-align: center;">&euro;<?php echo $tb_chprice;  ?></td>
                    <td style="text-align: center;">&euro;<?php echo $tb_chprice_sub;  ?>.00</td>

                </tr>        
                <tr>
                    <td colspan="2" style="border-bottom: none">
                        <?if($tb_status==0){?>
                            <?=$langs['booking_is_valid_pay_by_credit_card'];?>  
                            <?}else echo '&nbsp;'?>
                    </td>
                    <td style="text-align: center;"><b>Total:</b></td>
                    <td style="text-align: center;"><b>&euro;<?php echo $tb_totalprice;  ?></b></td>
                </tr>
            </tbody>
        </table>
        <? 
            $sys_url = "http://www.informacionisistem.com/payservice/"; 
            $booking_id = $tb_newid;
        ?>
        <!--PAY BY CREDIT CARD-->
        <?if($tb_status==0){?>
            <div style="float: right; margin: 20px 0 0 0">
                <div class="atlas_btn" style="margin-right:0;">
                    <a href="<?=$sys_url?>service/pay/<?=$booking_id?>/tour/<?=$language?>" id="pay_by_credit_card" style="padding: 7px 6px 7px 0;"><?=$langs['pay_by_credit_card'];?></a>
                </div>
                <br class="clearing" /> 
            </div>
            <br class="clearing" />
            <?}?>

    </div>
    <br class="clearing" />
</div>
<br class="clearing" />