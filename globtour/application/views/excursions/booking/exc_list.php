<div class="hold_exc">    
    <div class="exc">
        <div style="margin-top:6px;"></div>


        <div id="exc_list">     
            <ul>
                <? 
                    $i = 0;
                    foreach($excursions as $excursion){
                        $i++;    
                    ?>  
                    <li class="exc_one" id="#ed<?=$excursion['id']?>" <? if($i==3 || $i==6 || $i==9 || $i==12)echo 'style="margin-right:0"';?>>

                        <?
                            if(isset($excursion['g_path'])):

                                $pic_arr = explode('.',$excursion['f_name']);
                                $thumb_filename = 'thumbnail/'.$pic_arr[0].'_200x150_exacttop.'.$pic_arr[1];

                            ?>
                            <img src="<?=base_url()?>pro-gallery/<?=$excursion['g_path']?>/<?=$thumb_filename?>" alt="excursion_<?=$excursion['id']?>" width="190" />
                            <?

                                endif;
                        ?>


                        <h3 class="e_title"><?=$excursion['title']?></h3>
                        <p>
                            <?
                                $s= $excursion['description'];
                                if( strlen($s) > 78){
                                    $s =  substr($s,0, 78);
                                    $s.='...';
                                    echo $s;
                                }else  echo $s;

                            ?>
                        </p>
                        <div class="img_bottom">
                            <p class="price"><?=$langs['per_person'];?><br/>  <span class="ppp"> &euro; <?=$excursion['adultPrice']?></span></p> 
                            <div class="s_btn" style="margin-right:0; margin-top: 4px;">
                                <div class="atlas_btn" style="margin-right:0;">
                                    <a href="#ed<?=$excursion['id']?>" class="selexcfromlist" href="#"><?=$langs['check_dates'];?></a>
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
