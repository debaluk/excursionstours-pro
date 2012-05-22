<div class="web_txt_web_col1 order" style="width: 897px;">

    <h1 style="margin-left: 19px; margin-bottom: 11px;"><img alt="Globtour Montenegro | Rezervacija" src="<?=$url?>assets/img/titles/rentacar.png"></h1>

    <!--BOX ANIM HOLDER-->
    <div class="box-anim-holder">
    </div>
    <!--BOX ANIM HOLDER-->

    <!--BOOKING SUMMARY -->
    <div id="summary" class="clearfix">

        <div class="f-left"></div>
        <div class="f-mid">

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

            <h2><?=$car[0]->name?></h2>

            <div class="f-description">
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

            <div style="clear: both;"></div>

            <div class="c-info">
                <table class="t-info">
                    <tr>
                        <td style="width:450px">
                            <h2>Contact Information</h2>
                            <strong>Name</strong>: <?=$order[0]->firstName?><br>
                            <strong>E-mail</strong>: <?=$order[0]->email?><br>
                            <strong>Telephone</strong>: <?=$order[0]->phone?><br>
                            <strong>Note</strong>: 
                            <?if($order[0]->note){
                                    echo $order[0]->note;
                                }else echo '- empty -'?>
                            <br>
                            <strong>I agree with Terms and Conditions</strong>: yes<br>

                            <?if(isset($order_extras)){?>
                                <br>
                                <h2>Accessories</h2>
                                <ul>
                                    <?foreach($order_extras as $row):?>
                                        <li><?=$row->type.' ('.$row->description.') ('.$row->price.'&euro; / day)'?></li>
                                        <?endforeach;?>
                                </ul>
                                <?}?>

                        </td>
                        <td style="width:105px; text-align: center;">
                            <h2 style="padding-bottom:5px">Price</h2>
                            <b><?=$order[0]->totalprice;?>,- &euro;</b>
                        </td>

                    </tr>
                </table>
            </div>

            <div class="p-info">
                <h2>Thank you! <!--Please make payment with credit card.--></h2>
                <!--<p>Reservation is valid only if you pay by credit card!</p>-->    
            </div>
            <!--
            <div class="p-button">
            <?
                $url = 'www.informacionisistem.com';
                //$url = 'localhost/infosis';
            ?>
            <a id="pay-by-card" class="submit" href="http://<?=$url?>/rentacar/rentacar/payservice/do_pay/<?=$order[0]->id?>/rentacar"></a>
            </div> -->



        </div>
        <div class="f-right"></div>



    </div>
    <!--/BOOKING SUMMARY -->

</div>

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