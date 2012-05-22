<div class="web_txt_web_col1">
    <h1 style="margin-left: 19px;"><img src="<?=base_url();?>assets/img/content/h1/online-booking.gif" alt="Online Booking"/></h1>
    <div id="content" class="content">
        <div class="web-content">
            <div id="content-top" style="min-height: 300px;">
                <script type="text/javascript" charset="utf-8" src="<?=base_url()?>assets/js/book.result.js"></script>     
                <div id="rent_div_" style="margin-left: 22px; margin-right: 0px;">
                    <p>
                        Dear Sir or Madam, <br /><br />

                        Thank You for shopping with <b>globtourmontenegro.com.</b><br />
                        Your reservation is successfully recorded and confirmed by the agency.<br /><br /> 

                        <!-- Result from informacionisistem.com -->
                        <div class="booking_result" style="width: 600px; min-height: 60px;">
                            <table width="100%" cellpadding="0" cellspacing="0" class="finish-table">
                                <thead>
                                    <tr>
                                        <td>Title</td>
                                        <td style="text-align: center;">Price</td>
                                        <td style="text-align: center;">Sub-Total</td>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    <tr>                                         
                                        <td><?=$title?></td>
                                        <td style="text-align: center;">&euro;<?=number_format($order[0]->dayprice, 2, '.', '')?></td>
                                        <td style="text-align: center;">&euro;<?=number_format($order[0]->dayprice*$order[0]->numofdays, 2, '.', '')?></td>
                                    </tr>
                                    <?
                                        if(isset($order_extras))
                                            foreach($order_extras as $ac){
                                            ?>
                                            <tr>
                                                <td style="width: 400px;">Accessories - <?=$ac->type;?> - <?=$order[0]->numofdays;?> day(s)</td>
                                                <td style="text-align:center;">&euro; <?=$ac->price;?></td>
                                                <td style="text-align: center;">&euro; <?=number_format($ac->price*$order[0]->numofdays, 2, '.', '')?></td>
                                            </tr>
                                            <?    
                                        }
                                    ?>

                                    <tr>
                                        <td style="width: 400px;">Pickup: <?=$order[0]->pickup_loc;?></td>
                                        <td style="text-align:center;">&euro; <?=$order[0]->pickup_loc_price;?></td>
                                        <td style="text-align: center;">&euro; <?=number_format($order[0]->pickup_loc_price, 2, '.', '')?></td>
                                    </tr>

                                    <tr>
                                        <td style="width: 400px;">Return: <?=$order[0]->return_loc;?></td>
                                        <td style="text-align:center;">&euro; <?=$order[0]->return_loc_price;?></td>
                                        <td style="text-align: center;">&euro; <?=number_format($order[0]->return_loc_price, 2, '.', '')?></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td style="text-align:center;"><b>Total:</b></td>
                                        <td style="text-align: center;"><b>&euro;<?=number_format($order[0]->totalprice, 2, '.', '')?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br /> <br /> 
                        Information about cancellation should be sent to Globtour Montenegro by fax or e-Mail, <br />
                        referring to the number of registration: <b><?=$order[0]->id;?></b> <br /><br /> 
                        Cancellation fees: 20% of a whole amount. <br /><br /> 
                        Regarding any cancellations, please contact Globtour Montenegro.<br /> <br /> 
                    </p>
                    <p>
                        Globtour Montenegro 85 310 Budva, Dositejeva 4 <br />
                        Mail: info@globtour.me                         <br />
                        Web: http://www.globtourmontenegro.com         <br />
                        Tel: + 382 33 451-020, 455-683                 <br />
                        Fax: +382 33 452-827                           <br />
                        Mob-tel: + 382 69 322 226; 69 333 564          <br />
                    </p>

                </div>
                <div style="height: 150px;"></div>
            </div>
        </div>
    </div>
</div>