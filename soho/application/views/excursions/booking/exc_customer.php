<? foreach($book_infos as $info){?>

    <input type="hidden" value="<?=$info['excid'];?>" id="exc_id">


    <div class="box" style="width: 222px; padding-top: 8px"><img alt="Globtour" src="<?=base_url()?>assets/img/logo.jpg" style="margin-left: 50px; margin-top: 42px;"></div>
    <div class="exc">
        <div class="top_spacer"></div>
        <div class="top_border"></div>

        <!--ATLAS-->
        <div class="atlas_content_title">
            <div class="atlas_content_title_inner">                

                <div class="product_price" style="width:140px; color: #FFF; margin-top: 75px;">
                    <span class="title">Current cart total</span>
                    <span>EUR</span>      <br>
                    <span class="price"><em>&euro; <?=$info['totalprice']?><span></span></em></span>
                </div>

                <div class="atlas_content_intro">
                    <h1>Customer Info</h1>                                

                    <div id="atlas_list">
                        <ul>
                            <li><span>Number of adults: <?=$info['noadult']?></span></li>
                            <li><span>Number of children: <?=$info['noch']?></span></li>
                            <li><span>Total Price for <?=$info['persons']?> Traveler<?if($info['persons']>1)echo 's';?>: EUR &euro; <?=$info['totalprice']?></span></li>
                        </ul>
                    </div>                     
                </div>        

                <br class="clearing" />

            </div>
        </div> 

        <!--CHECK OUT CUSTOMER-->
        <?
            $this->load->view('excursions/booking/exc_customer_list');
        ?>   
    </div>
    <br class="clearing">
    <?}?>