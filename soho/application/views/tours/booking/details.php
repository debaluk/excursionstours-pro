<script type="text/javascript">
   /* if (jQuery.browser.mozilla){
            jQuery('#atlas_tabs').css('margin-top','18px'); 
        }else if (jQuery.browser.safari){
            jQuery('#atlas_tabs').css('margin-top','17px'); 
        }else if (jQuery.browser.msie){
            jQuery('#atlas_tabs').css('margin-top','19px'); 
        }  */
</script>
<? foreach($tours as $tour){?> 
    <input type="hidden" value="<?=$tour['id']?>" id="exc_id">


    <div class="picturebox" style="padding-bottom: 0;">
    
    <?

            $gallery = $this->db->get_where('gallery', array('tours_id' => $tour['id']))->row_array();



            if(isset($gallery['ID'])):

                $this->db->order_by('order asc, ID asc');
                $pictures = $this->db->get_where('pictures',array('gallery_ID'=>$gallery['ID']))->result_array();

                //print_r($pictures);

                foreach($pictures as $picture):

                    $pic_arr = explode('.',$picture['filename']);
                    $thumb_filename = 'thumbnail/'.$pic_arr[0].'_200x150_exacttop.'.$pic_arr[1];
                    $big_filename = 'thumbnail/'.$pic_arr[0].'_800x600_exacttop.'.$pic_arr[1];                                    


                ?>

                <a rel="lightbox" title="<?=$tour['title']?>" href="<?=base_url()?>pro-gallery/<?=$gallery['path']?>/<?=$big_filename?>" >
                    <img alt="<?=$tour['title']?>" src="<?=base_url()?>pro-gallery/<?=$gallery['path']?>/<?=$thumb_filename?>">
                </a>

                <?
                    endforeach;

                endif;
        ?>
    
    </div>
    <div class="exc">
        <div class="top_spacer"></div>
        <div class="top_border"></div>

        <!--ATLAS-->
        <div class="atlas_content_title">
            <div class="atlas_content_title_inner">

                <div class="product_price">

                    <div class="bbborder_top_right">
                        <div class="bbborder_top_left">
                            <span style="float: right;"><img src="<?=base_url()?>assets/img/backgrounds/product_lowprice.gif" alt="Low Price Guarantee"></span>

                            <span style="float: left; margin-top: 9px;">From EUR</span>

                            <br class="clearing" />
                            <style>
                                 #e321 .product_price {
                                    margin-top: 50px;
                                    width: 230px;
                                }
                                 #e321 .product_price em {
                                    font-size: 24px;
                                }
                                 #e321 .price{
                                    border-right: 1px solid;
                                    padding-right: 10px;
                                    /*width: 90px;*/                                          
                                }
                            </style>
                            <span class="price" style="float: left; text-align: left;">
                                <em>
                                    <span class="ppp">&euro; <?=$tour['Cena Jednokrevetne']?></span> 
                                </em><br />single room
                            </span>
                            <span class="price" style="float: left; border: none; text-align: left; margin-left: 12px;">  
                                <em>    
                                    <span class="ppp">&euro; <?=$tour['Cena Dvokrevetne']?></span>
                                </em><br />double room

                            </span>  <br class="clearing" />

                            <span style="float: left">Per person</span>  <br class="clearing" />

                        </div>
                    </div>

                    <div class="bbborder_bot_right">
                        <div class="bbborder_bot_left">
                            &nbsp;
                        </div>
                    </div>

                </div>

                <div class="atlas_content_intro">
                    <h1><?=$tour['title']?></h1>                                

                    <div id="atlas_list">
                        <ul>
                            <li><strong>Capacity:</strong><span><?=$tour['capacity']?> persons</span></li>
                            <li><strong>Duration:</strong><span><?=$tour['nodays']?> days / <?=$tour['nonights']?> nights</span></li>
                            <li><strong>Guides:</strong><span><?=$tour['guides']?></span></li>
                        </ul>
                    </div>
                </div>          

                <div id="atlas_tabs">
                    <ul class="idTtabs">
                        <li class="on"><a href="#info_tab" id="info_a"><span>Information</span></a></li>
                        <li><a href="#pickup_tab" id="pickup_a"><span>Pickup info</span></a></li> 
                        <li><a href="#add_tab" id="add_a"><span>Itinerary details</span></a></li> 
                    </ul>
                </div>

                <br class="clearing" />

            </div>
        </div> 

        <div class="desc_main body-wrap">
            <div id="info_tab" style="display: block;">
                <div class="desc_txt"><?=$tour['tour_text']?></div>
            </div>
            <div id="pickup_tab" style="display:none;">
                <div class="desc_txt"><?=$tour['pickup_location']?></div>
            </div>
            <div id="add_tab" style="display:none;">
                <div class="desc_txt"><?=$tour['addition']?></div>
            </div>
        </div>

        <div class="side">  

            <!--BOOKING IN 2 STEPS-->
            <div id="quote" class="mk_mod quote">

                <div class="mk_head_wrap orange">
                    <div class="mk_head">
                        <span>Book in Two Easy Steps</span>
                    </div>
                </div>

                <div class="mk_body">

                    <div class="easystep_one">
                        <label for="exc_date">Select a date</label><br />
                        <p style="margin-top: 4px;">
                            <input id="exc_date" name="exc_date" disabled="disabled" class="pad_text_left" value="-- Please Select Date --" />
                        </p>

                    </div>

                    <script type="text/javascript">
                        single_room_price = '<?=$tour['Cena Jednokrevetne'];?>';
                        double_room_price = '<?=$tour['Cena Dvokrevetne'];?>';
                    </script>
                    
                    <div class="easystep_two">
                        <label>Choose room type</label><br />
                        <p style="margin-bottom: 14px;">
                            <select id="exc_room_type" name="exc_room_type" class="pad_text_left" style="width: 200px; margin-top: 5px;">
                                <option value="0" selected="selected">-- Please select --</option>
                                <option value="1">Singe room</option>
                                <option value="2">Double room</option>
                            </select>
                        </p>
                        <label>Enter total number of travelers</label><br />
                        <div class="calculator">
                            <!-- <strong><em>Calculator:</em></strong>   <br>-->
                            <div class="calc_left" >
                                <div class="adl">
                                    <label for="adults" class="pad_label">Adults:</label>
                                    <select id="adults" style="width: 40px;">
                                        <?
                                            for ($i=0;$i<10;$i++) {
                                                if($i!=1){                                                               
                                                    echo "<option value=".$i." >" . $i . "</option>";
                                                }else{ 
                                                    echo "<option value=".$i." selected=selected>" . $i . "</option>";    
                                                } 
                                            }
                                        ?>
                                    </select>

                                    <span>EUR <span id="adult-price">0</span> / person</span><br id="a_price" class="clearing" />
                                </div>
                                <div class="ch"> 
                                    <label for="children" class="pad_label">Children:</label>
                                    <select id="children" style="width: 40px;">
                                        <?
                                            for ($i=0;$i<10;$i++) {
                                                if($i!=0){                                                               
                                                    echo "<option value=".$i." >" . $i . "</option>";
                                                }else{ 
                                                    echo "<option value=".$i." selected=selected>" . $i . "</option>";    
                                                } 
                                            }
                                        ?>
                                    </select>

                                    <span>EUR <span id="children-price">0</span> / person</span><br id="c_price" class="clearing" />
                                </div> 
                            </div>
                            <div class="calc_right">Total cost: <br><span id="total-price">480</span> &euro;</div>    
                            <br class="clearing" />
                        </div>

                    </div>

                    <div class="btn_box">
                        <div style="margin: 20px 0 10px 125px;">
                            <div class="atlas_btn" style="margin-right:0;">
                                <a href="javascript:void(0)" id="confirm">Confirm Availability</a>
                            </div>
                            <br class="clearing" /> <br />
                        </div>
                    </div>

                    <div class="easystep_bottom">
                        <strong>Please note:</strong> After your purchase is confirmed we will email you a link to your voucher.                        
                    </div>


                </div>        
            </div>    

        </div> 


    </div>
    <br class="clearing">
    <?}?>      
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