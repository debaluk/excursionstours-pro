<style type="text/css">
#content li {
    color: #848484;
}
</style>
<input type="hidden" value="<?=$eb_newid;?>" id="book_id">
<div class="box">
    <img alt="Globtour" src="<?=base_url()?>assets/img/logo.jpg" style="margin-left: 50px; margin-top: 50px;">
</div>
<div class="exc">
    <div id="total_t">
        <div style="font-weight: normal; line-height: 30px;" class="excbookingSection">
            Booking number: <b><?php echo $eb_newid;?></b>.
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
                        Excursion
                    </td>
                    <td colspan="3">
                        <?php echo $exc_title ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Start day
                    </td>
                    <td colspan="3">
                        <?php echo $exc_startWeekDay; ?>
                    </td>

                </tr>
                <tr>
                    <td>
                        Addition
                    </td>
                    <td colspan="3">
                        <?php echo $exc_addition; ?>
                    </td>

                </tr>
                <tr>
                    <td>
                        Traveler (Adult)
                    </td>
                    <td>
                        <?php echo $eb_noadult; ?>     
                    </td>
                    <td style="text-align: center;">&euro;<?php echo $eb_adultprice;  ?></td>
                    <td style="text-align: center;">&euro;<?php echo $eb_adultprice_sub;  ?>.00</td>
                </tr>
                <tr>
                    <td>
                        Traveler (Child)
                    </td>
                    <td>
                        <?php echo $eb_noch; ?>  
                    </td>
                    <td style="text-align: center;">&euro;<?php echo $eb_chprice;  ?></td>
                    <td style="text-align: center;">&euro;<?php echo $eb_chprice_sub;  ?>.00</td>

                </tr>        
                <tr>
                    <td>
                        Transportation type
                    </td>
                    <td colspan="3">
                        <?php echo $tra_title; ?>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="border-bottom: none">
                        <?if($eb_status==0){?>
                            Booking is valid only if you pay by credit card! 
                            <?}else echo '&nbsp;'?>
                    </td>
                    <td style="text-align: center;"><b>Total:</b></td>
                    <td style="text-align: center;"><b>&euro;<?php echo $eb_totalprice;  ?></b></td>
                </tr>
            </tbody>
        </table>

        <? 
            $sys_url = "http://www.informacionisistem.com/payservice/";
            $booking_id = $eb_newid;
        ?>



        <?if($eb_status==0){?>
            <!--PAY BY CREDIT CARD-->
            <div style="float: right; margin: 20px 0 0 0">
                <div class="atlas_btn" style="margin-right:0;">
                    <a href="<?=$sys_url?>service/pay/<?=$booking_id?>/excursion/<?=$language?>" id="pay_by_credit_card" style="padding: 7px 6px 7px 0;">PAY BY CREDIT CARD</a>
                </div>
                <br class="clearing" /> 
            </div>
            <br class="clearing" />

            <?}?>



    </div>
    <br class="clearing" />
</div>
<br class="clearing" />