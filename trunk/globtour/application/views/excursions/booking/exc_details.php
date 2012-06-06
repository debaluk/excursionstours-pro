
<style type="text/css">
    #e321 .desc_main {
        line-height: 16px;
        margin-bottom: 43px;
        width: 300px !important;
    }
    #e321 .exc {
        width: 637px !important;
    }
</style>

<? foreach($excursions as $excursion){?> 
    <input type="hidden" value="<?=$excursion['id']?>" id="exc_id">
    <script type="text/javascript">
        <?  

            $disabled_days = array();
            $days = explode(',',$excursion['startWeekDay']);


            if(is_numeric(array_search('Sunday', $days))){
                array_push($disabled_days, 0);
            }
            if(is_numeric(array_search('Monday', $days))){
                array_push($disabled_days, 1);
            }
            if(is_numeric(array_search('Tuesday', $days))){
                array_push($disabled_days, 2);
            }
            if(is_numeric(array_search('Wednesday', $days))){
                array_push($disabled_days, 3);
            }
            if(is_numeric(array_search('Thursday', $days))){
                array_push($disabled_days, 4);
            }
            if(is_numeric(array_search('Friday', $days))){
                array_push($disabled_days, 5);
            }
            if(is_numeric(array_search('Saturday', $days))){
                array_push($disabled_days, 6);
            }


            /*$this->firephp->log($days);
            $this->firephp->log($disabled_days); */

            foreach($disabled_days as $key => $value){?>

            cur_days['<?=$key?>'] = '<?=$value?>';

            <?} 

        ?>  


    </script>
    <?
        /*if($this->session->userdata('lgu_user_name')){
        echo 'system-user';
        }*/
    ?>
    <div class="picturebox" style="padding-bottom: 0;">


        <?

            $gallery = $this->db->get_where('gallery', array('excursions_id' => $excursion['id']))->row_array();



            if(isset($gallery['ID'])):

                $this->db->order_by('order asc, ID asc');
                $pictures = $this->db->get_where('pictures',array('gallery_ID'=>$gallery['ID']))->result_array();

                //print_r($pictures);

                foreach($pictures as $picture):

                    $pic_arr = explode('.',$picture['filename']);
                    $thumb_filename = 'thumbnail/'.$pic_arr[0].'_200x150_exacttop.'.$pic_arr[1];
                    $big_filename = 'thumbnail/'.$pic_arr[0].'_800x600_exacttop.'.$pic_arr[1];                                    


                ?>

                <a rel="lightbox" title="<?=$excursion['title']?>" href="<?=base_url()?>pro-gallery/<?=$gallery['path']?>/<?=$big_filename?>" >
                    <img alt="<?=$excursion['title']?>" src="<?=base_url()?>pro-gallery/<?=$gallery['path']?>/<?=$thumb_filename?>" />
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
                            <span style="float: right;"><img src="<?=base_url()?>assets/img/backgrounds/product_lowprice_<?=$local_lang?>.gif" /></span>

                            <span style="float: left; margin-top: 9px;"><?=$langs['from_eur'];?></span>

                            <br class="clearing" />

                            <span class="price" style="float: left"><em><span>&euro;  </span><?=$excursion['adultPrice']?></em></span>  <br class="clearing" /> 
                            <span style="float: left"><?=$langs['per_person'];?></span>  <br class="clearing" />

                        </div>
                    </div>

                    <div class="bbborder_bot_right">
                        <div class="bbborder_bot_left">
                            &nbsp;
                        </div>
                    </div>

                </div>

                <div class="atlas_content_intro">
                    <h1><?=$excursion['title']?></h1>                                

                    <div id="atlas_list">
                        <ul>
                            <li><strong><?=$langs['start_day'];?>:</strong><span>
                            
                            <?
                            
                            $excursion['startWeekDay'] = str_replace('Monday', $langs['week_days'][0], $excursion['startWeekDay']);
                            $excursion['startWeekDay'] = str_replace('Tuesday', $langs['week_days'][1], $excursion['startWeekDay']);
                            $excursion['startWeekDay'] = str_replace('Wednesday', $langs['week_days'][2], $excursion['startWeekDay']);
                            $excursion['startWeekDay'] = str_replace('Thursday', $langs['week_days'][3], $excursion['startWeekDay']);
                            $excursion['startWeekDay'] = str_replace('Friday', $langs['week_days'][4], $excursion['startWeekDay']);
                            $excursion['startWeekDay'] = str_replace('Saturday', $langs['week_days'][5], $excursion['startWeekDay']);
                            $excursion['startWeekDay'] = str_replace('Sunday', $langs['week_days'][6], $excursion['startWeekDay']);
                            
                            echo $excursion['startWeekDay'];
                            
                            ?>
                            
                            </span></li>
                            <li><strong><?=$langs['duration'];?>:</strong><span>1 <?=$langs['day'];?></span></li>
                            <li><strong><?=$langs['guides'];?>:</strong><span><?=$excursion['guides']?></span></li>
                        </ul>
                    </div>

                </div>          

                <div id="atlas_tabs">
                    <ul class="idTtabs">
                        <li class="on"><a href="#info_tab" id="info_a"><span><?=$langs['information'];?></span></a></li>
                        <li><a href="#pickup_tab" id="pickup_a"><span><?=$langs['pickup_info'];?></span></a></li> 
                        <li><a href="#add_tab" id="add_a"><span><?=$langs['itinerary_details'];?></span></a></li> 
                    </ul>
                </div>

                <br class="clearing" />

            </div>
        </div> 

        <div class="desc_main body-wrap">
            <div id="info_tab" style="display: block;">
                <div class="desc_txt"><?=$excursion['excursion_text']?></div>
            </div>
            <div id="pickup_tab" style="display:none;">
                <div class="desc_txt"><?=$excursion['pickup_location']?></div>
            </div>
            <div id="add_tab" style="display:none;">
                <div class="desc_txt"><?=$excursion['addition']?></div>
            </div>
        </div>

        <div class="side">  

            <!--BOOKING IN 2 STEPS-->
            <div id="quote" class="mk_mod quote">

                <div class="mk_head_wrap orange">
                    <div class="mk_head">
                        <span><?=$langs['book_in_two_easy_steps'];?></span>
                    </div>
                </div>

                <div class="mk_body">

                    <div class="easystep_one">
                        <label for="exc_date"><?=$langs['select_a_date'];?></label><br />
                        <p style="margin-top: 4px;">
                            <input id="exc_date" name="exc_date" disabled="disabled" class="pad_text_left" />
                        </p>

                    </div>

                    <div class="easystep_two">
                        <label><?=$langs['enter_total_number_of_travelers'];?></label><br />
                        <div class="calculator">
                            <!-- <strong><em>Calculator:</em></strong>   <br>-->
                            <div class="calc_left" >
                                <div class="adl">
                                    <label for="adults" class="pad_label"><?=$langs['adults'];?>:</label>
                                    <select id="adults" style="width: 40px;">
                                        <?
                                            for ($i=0;$i<10;$i++) {
                                                if($i!=2){                                                               
                                                    echo "<option value=".$i." >" . $i . "</option>";
                                                }else{ 
                                                    echo "<option value=".$i." selected=selected>" . $i . "</option>";    
                                                } 
                                            }
                                        ?>
                                    </select>

                                    <span>EUR <span id="adult-price"><?=$excursion['adultPrice']?></span> / <?=$langs['person'];?></span><br id="a_price" class="clearing" />
                                </div>
                                <div class="ch"> 
                                    <label for="children" class="pad_label"><?=$langs['children'];?>:</label>
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

                                    <span>EUR <span id="children-price"><?=$excursion['childPrice']?></span> / <?=$langs['person'];?></span><br id="c_price" class="clearing" />
                                </div> 
                            </div>
                            <div class="calc_right"><?=$langs['total_cost'];?>: <br><span id="total-price">480</span> &euro;</div>    
                            <br class="clearing" />
                        </div>

                    </div>

                    <div class="btn_box">
                        <div style="margin: 20px 0 10px 125px;">
                            <div class="atlas_btn" style="margin-right:0;">
                                <a href="javascript:void(0)" id="confirm"><?=$langs['confirm_availability'];?></a>
                            </div>
                            <br class="clearing" /> <br />
                        </div>
                    </div>

                    <div class="easystep_bottom">
                        <strong><?=$langs['please_note'];?>:</strong> <?=$langs['we_will_email_you_a_voucher'];?>                        
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