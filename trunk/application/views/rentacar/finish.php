<div class="web_txt_web_col1 finish" style="width: 897px;">

    <h1 style="margin-left: 19px; margin-bottom: 11px;"><img alt="Globtour Montenegro | Rezervacija" src="<?=$url?>assets/img/titles/rentacar.png"></h1>


    <?if(isset($car_bigger)){?>

        <!--INFO BOX-->
        <div class="info-box" style="display: block;">
            <div class="info-top">
                <h4>Upgrade for a bigger car</h4>
            </div>
            <div class="info-bot">

                <h3><a title="<?=$car_bigger[0]->name?>" href="<?=$url?>details?id=<?=$car_bigger[0]->id?>"><?=$car_bigger[0]->name?></a></h3>

                <div class="car-image">

                    <a title="<?=$car_bigger[0]->name?>" href="<?=$url?>details?id=<?=$car_bigger[0]->id?>"> 

                        <?

                            $pic_arr = explode('.',$car_bigger[0]->f_name);
                            $thumb_filename = 'thumbnail/'.$pic_arr[0].'_105x76_exacttop.'.$pic_arr[1];

                        ?>

                        <img alt="<?=$car_bigger[0]->name?>" src="<?=$info_sis_url?>pro-gallery/<?=$car_bigger[0]->g_path?>/<?=$thumb_filename?>" width="102">
                    </a>

                </div>

                <div class="car-include">
                    <ul class="clearfix pic_items">
                        <li><img alt="Seat Count" title="Seat Count" src="<?=$url?>assets/img/backgnds/parameters/seat_count.png" /></li>
                        <li><img alt="Number of doors" title="Number of doors" src="<?=$url?>assets/img/backgnds/parameters/no_doors.png" /></li>
                        <li><img alt="Luggage space capacity" title="Luggage space capacity" src="<?=$url?>assets/img/backgnds/parameters/luggage.png" /></li>
                        <li><img alt="A/T" title="A/T" src="<?=$url?>assets/img/backgnds/parameters/a_t.png" /></li>
                        <li><img alt="A/C" title="A/C" src="<?=$url?>assets/img/backgnds/parameters/a_c.png" /></li>
                        <li><img alt="Beznin" title="Beznin" src="<?=$url?>assets/img/backgnds/parameters/benzin.png" /></li>
                    </ul>

                    <ul class="clearfix pic_text">
                        <li><?=$car_bigger[0]->seat_count?></li>
                        <li><?=$car_bigger[0]->num_of_doors?></li>
                        <li><?=$car_bigger[0]->luggage_capacity?></li>

                        <?if($car_bigger[0]->auto_transmission){ $bool = 'yes'; }else{ $bool = 'no'; } ?>
                        <li <?if($bool == 'yes') echo 'class="ci-yes"';?>>                                    
                            <img src="<?=$url?>assets/img/backgnds/<?=$bool?>.png" alt="<?=$bool?>" /></li>

                        <?if($car_bigger[0]->ac){ $bool = 'yes'; }else{ $bool = 'no'; } ?>
                        <li <?if($bool == 'yes') echo 'class="ci-yes"';?>>
                            <img src="<?=$url?>assets/img/backgnds/<?=$bool?>.png" alt="<?=$bool?>" /></li>   

                        <li><?if($car_bigger[0]->diesel){ echo 'D'; }else{ echo 'B'; } ?></li>
                    </ul>
                </div>

                <div class="suplement">
                    <strong>Supplement only:</strong> <strong>
                        <?
                            $no_days = $this->session->userdata('no_days');

                            //        Car price per day - and total
                            switch($no_days){

                                case $no_days<=3:
                                    $dayprice = $car_bigger[0]->day13price;
                                    break;

                                case $no_days>=4 && $no_days<=7:
                                    $dayprice = $car_bigger[0]->day47price;
                                    break;

                                case $no_days>=8 && $no_days<=15:
                                    $dayprice = $car_bigger[0]->day815price;
                                    break;
                            }

                            //Supplement calculate
                            echo ($no_days*$dayprice)-($this->session->userdata('day_price')*$no_days);

                        ?>
                        &euro;</strong>
                </div>

                <div class="chage-details">
                    <a href="<?=$url?>step_3?id=<?=$car_bigger[0]->id?>" class="submit" id="bigger-car-btn"></a>
                </div>

            </div>
        </div>
        <!--/INFO BOX-->

        <?}else{?>
        <div class="info-box"></div>
        <?}?>

    <!--BOOKING SUMMARY -->
    <div id="summary" class="clearfix">

        <div class="f-left"></div>
        <div class="f-mid">

            <h2>Booking Summary</h2>

            <div class="f-first ">

                <div class="f-image">

                    <?

                        $pic_arr = explode('.',$car[0]->f_name);
                        $big_filename = 'thumbnail/'.$pic_arr[0].'_800x600_exacttop.'.$pic_arr[1];
                        $thumb_filename = 'thumbnail/'.$pic_arr[0].'_105x76_exacttop.'.$pic_arr[1];

                    ?>

                    <a rel="lightbox" title="<?=$car[0]->name?>" href="<?=$info_sis_url?>pro-gallery/<?=$car[0]->g_path?>/<?=$big_filename?>">
                        <img alt="<?=$car[0]->name?>" src="<?=$info_sis_url?>pro-gallery/<?=$car[0]->g_path?>/<?=$thumb_filename?>">
                    </a>   
                </div>

                <div class="f-description">
                    <h3><?=$car[0]->name?> <small>or similar </small></h3>
                    <table class="t-info">
                        <tr class="t-head">
                            <td>Pickup</td>
                            <td>Return</td>
                        </tr>
                        <tr>
                            <td><?=$this->session->userdata('pickup_loc_text')?><br /><?=$this->session->userdata('pickup_date').', '.$this->session->userdata('fullfrom');?> h</td>
                            <td><?=$this->session->userdata('return_loc_text')?><br /><?=$this->session->userdata('return_date').', '.$this->session->userdata('fullto');?> h</td>
                        </tr>
                    </table>    
                </div>

            </div>
            <div class="f-sec clearfix">
                <ul>
                    <li><a href="<?=$url?>step_2" class="submit" id="change-car-btn" title="Change car"></a></li>
                    <li><a href="javascript:" class="submit" id="optional-accessories-btn" title="Optional accessories" onclick="popup_box({url: base_url+'rentacar/show_accessories/'+'<?=$car[0]->id?>'});return false;"></a></li>
                </ul>

            </div>
            <div class="f-third">

                <div id="accessories_preview" style="display: none;">
                    <ul>
                        <?
                            $html = '';
                            if($this->session->userdata('extras')){
                                foreach($accessories as $row1){

                                    foreach($this->session->userdata('extras') as $val){

                                        if($row1->id==$val){

                                            $html.='<li><strong>'.$row1->type.'</strong> - <small>price: '.$row1->price.' &euro; / day</small></li>';                                    

                                        }

                                    }

                                }
                            }
                            echo $html;

                            if($html!='')?><script type="text/javascript">$('#accessories_preview').show();</script><?
                        ?>
                    </ul>
                </div>

                <div class="f-price">Final price: <span id="final_price"><?=$this->session->userdata('tot_price');?></span> &euro;</div>

                <p><strong>Price includes:</strong> <?=$car[0]->description?></p>

            </div>

            <div class="f-form">

                <p class="strong">Contact Information</p>

                <form id="formReservationStep3" method="post" action="<?=$url?>rentacar/process_booking">         

                    <dl>
                        <dt><label for="name"><b class="required">*</b>Name and surname</label></dt>
                        <dd><input type="text" id="name" name="name" value="" class="text" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="phone"><b class="required">*</b>Telephone</label></dt>
                        <dd><input type="text" id="phone" name="phone" value="" class="text" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="email"><b class="required">*</b>E-mail</label></dt>
                        <dd><input type="text" id="email" name="email" value="" class="text" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="hotel"><b class="required"></b>Hotel</label></dt>
                        <dd><input type="text" id="hotel" name="hotel" value="" class="text" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="roomnumber"><b class="required"></b>Room number</label></dt>
                        <dd><input type="text" id="hotel" name="roomnumber" value="" class="text" /></dd>
                    </dl>
                    <dl class="form-notice">
                        <dt><label for="notice">Note</label></dt>
                        <dd><textarea id="notice" name="notice"></textarea></dd>
                    </dl>
                    <dl class="terms">
                        <dt><label for="termsOfTradeAcceptance"><b class="required">*</b>I agree with <a onclick="popup_box({url: base_url+'rentacar/show_terms'});return false;" id="terms-link" href="javascript:">Terms and Conditions</a></label></dt>
                        <dd><input type="checkbox" class="checkbox" name="termsOfTradeAcceptance" value="1" id="qf_f2eff2"></dd>
                    </dl>

                    <div class="f-submit">

                        <input type="submit" class="submit" id="formReservationStep3Submit" name="formReservationStep3Submit" value="">

                    </div>

                    <p>Customer must present his valid driver's license and ID card or passport by the pick-up.</p>

                    <p>Please note: Globtour Montenegro will never sell, share or distribute your personal information. </p>

                    <div>
                        <span class="quick-form-required-note-asterisk">*</span>
                        <span class="quick-form-required-note-text">Required field</span>
                    </div>

                </form>    

            </div>


        </div>
        <div class="f-right"></div>



    </div>
    <!--/BOOKING SUMMARY -->

    <div style="clear: both;"></div>

</div>

<style>
    #content321 .f-form form textarea {
        min-height: 240px;
        width: 240px;
    }
</style>

<script type="text/javascript">

    // Override default error message
    jQuery.validator.messages.required = "";

    // Override generation of error label
    $("#formReservationStep3").validate({
            rules: {
                name: "required",
                phone: "required",
                email: {
                    required: true,
                    email: true
                }
            },
            submitHandler: function(form) {
                if ($("#qf_f2eff2").is(":checked")){

                    var that = jQuery('#formReservationStep3Submit').busy({ position : 'right', hide : false });
                    $('#formReservationStep3Submit').attr('disabled','disabled');
                    var form = $("#formReservationStep3");
                    var form_data = form.serialize();
                    //alert(form_data);
                    $.ajax({
                            url: form.attr('action'),
                            dataType: 'json',
                            type: "POST",
                            data: form_data,
                            success: function (data, textStatus, xhr) {

                                if(data.response){
                                    var id = data.json[0]['id'];
                                    location.href = base_url+'show_order?id='+id;
                                }else{
                                    alert(data.msg);                            
                                }
                                $('#formReservationStep3Submit').removeAttr('disabled');
                                that.busy("hide");
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                alert('Error ocured...\n Server not found.');
                                $('#formReservationStep3Submit').removeAttr('disabled');
                                that.busy("hide");
                            }
                    });

                }else{
                    alert("Please correct the following information:\n\n- The field 'I agree with Terms and Conditions' is mandatory.\n\nThen re-submit the form.");
                }

            },
            errorPlacement: function(error, element){}
    });

    $('#formReservationStep3Submit').removeAttr('disabled');

</script>

<script type="text/javascript">
    $(function() {

            $('a[rel=lightbox]').lightBox({
                    overlayBgColor: '#000',
                    overlayOpacity: 0.6,
                    imageLoading: base_url+'assets/img/lightbox/loading.gif',
                    imageBtnClose: base_url+'assets/img/lightbox/close.gif',
                    imageBtnPrev: base_url+'assets/img/lightbox/prev.gif',
                    imageBtnNext: base_url+'assets/img/lightbox/next.gif',
                    imageBlank : base_url+'assets/img/lightbox/blank.gif',
                    containerResizeSpeed: 350,
                    txtImage: 'Image',
                    txtOf: 'of'
            });
    });
</script>
