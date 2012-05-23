
<div class="hold_exc">    
    <div class="exc">
        <div style="margin-top:6px;"></div>
        <div id="exc_list">     
            <ul>
                <? 
                    $i = 0; 
                    foreach($tours as $tour){
                    $i++;                         
                        ?>  
                    <li class="exc_one" id="#ed<?=$tour['id']?>" <? if($i==3 || $i==6 || $i==9 || $i==12)echo 'style="margin-right:0"';?>>
                        
                         <?
                            if(isset($tour['g_path'])):

                                $pic_arr = explode('.',$tour['f_name']);
                                $thumb_filename = 'thumbnail/'.$pic_arr[0].'_200x150_exacttop.'.$pic_arr[1];

                            ?>
                            <img src="<?=base_url()?>pro-gallery/<?=$tour['g_path']?>/<?=$thumb_filename?>" alt="excursion_<?=$tour['id']?>" style="padding: 1px; border: 1px solid #f1f1f1;" />
                            <?

                                endif;
                        ?>
                        
                        <h3 class="e_title"><?=$tour['title']?></h3>
                        <p>
                            <?
                                $s= $tour['description'];
                                echo $s;
                                /*if( strlen($s) > 78){
                                    $s =  substr($s,0, 78);
                                    $s.='...';
                                    echo $s;
                                }else  echo $s;*/

                            ?>
                        </p>
                        <style>
                            #e321 .exc_one h3{
                                letter-spacing: -0.3px;
                                letter-spacing: -1.2px;
                            }
                             #e321 .exc_one .price {
                                line-height: 16px;
                            }
                             #e321 .exc_one .ppp{
                                font-size: 18px;
                                line-height: 16px;
                            }
                        </style>
                        <div class="img_bottom">
                            <p class="price" style="width:180px;">per person<br />
                                <div class="room_price"><span class="ppp">&euro; <?=$tour['Cena Jednokrevetne']?></span><br /> single room</div><br />
                                <div class="room_price"><span class="ppp">&euro; <?=$tour['Cena Dvokrevetne']?></span><br /> double room</div>
                            </p> 
                            <div class="s_btn" style="margin-right:0; margin-top: 8px;">
                                <div class="atlas_btn" style="margin-right:0;">
                                    <a href="#ed<?=$tour['id']?>" class="selexcfromlist" href="#">Check Dates</a>
                                </div>
                            </div> 

                            <br style="clear: both;" />
                        </div>
                    </li> 
                    <?
                        if($i==3 || $i==6 || $i==9 || $i==12)echo '<br style="clear: both;" />';
                }?>
            </ul>
            <br style="clear: both;" />  
        </div>
    </div>
    <br class="clearing">
</div>
