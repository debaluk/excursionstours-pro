<input type="hidden" value="<?=$tb_newid;?>" id="book_id">
<div class="box">
    <img alt="Globtour" src="<?=base_url()?>assets/img/logo.jpg" style="margin-left: 50px; margin-top: 50px;">
</div>
<div class="exc">
    <div id="total_t">
        <div style="font-weight: normal; line-height: 30px;" class="excbookingSection">
            Booking number: <b><?php echo $tb_newid;?></b>.
        </div>
        <h2>Booking is accepted</h2>


        <table width="100%" cellspacing="0" cellpadding="0" class="excbookingTable">
            <thead>
                <tr>
                    <td style="font-weight: bold;">Title</td>
                    <td style="font-weight: bold;">Description</td>
                    <td style="text-align: center; font-weight: bold;">Price</td>
                    <td style="text-align: center; font-weight: bold;">Sub-Total</td>
                </tr>
            </thead>
            <tbody id="tablebody">
                <tr>
                    <td>
                        Tour
                    </td>
                    <td colspan="3">
                        <?php echo $t_title ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Duration
                    </td>
                    <td colspan="3">
                        <?php echo $t_nodays; ?> / <?php echo $t_nonights; ?> 
                    </td>

                </tr>
                <tr>
                    <td>
                        Pickup Location
                    </td>
                    <td colspan="3">
                        <?php echo $t_pickup_location; ?>
                    </td>

                </tr>
                <tr>
                    <td>
                        Traveler (Adult)
                    </td>
                    <td>
                        <?php echo $tb_noadult; ?>     
                    </td>
                    <td style="text-align: center;">&euro;<?php echo $tb_adultprice;  ?></td>
                    <td style="text-align: center;">&euro;<?php echo $tb_adultprice_sub;  ?>.00</td>
                </tr>
                <tr>
                    <td>
                        Traveler (Child)
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
                            Booking is valid only if you pay by credit card! 
                            <?}else echo '&nbsp;'?>
                    </td>
                    <td style="text-align: center;"><b>Total:</b></td>
                    <td style="text-align: center;"><b>&euro;<?php echo $tb_totalprice;  ?></b></td>
                </tr>
            </tbody>
        </table>
        <? 
            $sys_url = "http://www.it-montenegro.com/payservice/"; 
            $booking_id = $tb_newid;
        ?>
        <!--PAY BY CREDIT CARD-->
        <?if($tb_status==0){?>
        <div style="float: right; margin: 20px 0 0 0">
            <div class="atlas_btn" style="margin-right:0;">
                <a href="<?=$sys_url?>service/pay/<?=$booking_id?>/tour/<?=$language?>" id="pay_by_credit_card" style="padding: 7px 6px 7px 0;">PAY BY CREDIT CARD</a>
            </div>
            <br class="clearing" /> 
        </div>
        <br class="clearing" />
        <?}?>

    </div>
    <br class="clearing" />
</div>
<br class="clearing" />