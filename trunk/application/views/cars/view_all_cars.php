
<h2> <img src="<?=$url?>assets/img/titles/all_cars.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Car & Prices</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=1;
                foreach($all_cars as $car): ?> 

                <tr <? if($k%2==0) echo 'class="odd"'; ?>>

                    <td class="va-middle" style="width: 105px;">

                        <?

                            $gallery = $this->db->get_where('gallery', array('posts_ID'=>$car['id']))->row_array();
                            
                            
                            
                            if(isset($gallery['ID'])):
                            
                            $this->db->order_by('order asc, ID asc');
                            $pictures = $this->db->get_where('pictures',array('gallery_ID'=>$gallery['ID']))->result_array();

                            //print_r($pictures);
                            
                            if(isset($pictures[0]['filename'])){

                                $pic_arr = explode('.',$pictures[0]['filename']);
                                $thumb_filename = 'thumbnail/'.$pic_arr[0].'_105x76_exacttop.'.$pic_arr[1];

                            ?>
                            <img src="<?=$url?>pro-gallery/<?=$gallery['path']?>/<?=$thumb_filename?>" alt="car_<?=$car['id']?>" style="padding: 1px; border: 1px solid #f1f1f1;" />
                            <?
                            }else echo "No image";
                            
                            endif;
                        ?>
                    </td>
                    <td>
                        <strong><?=$car['name']?></strong><br />
                        Proce 1-3 days : <b><?=number_format($car['day13price'], 2, '.', '')  ?>&euro;</b><br />
                        Proce 4-7 days : <b><?=number_format($car['day47price'], 2, '.', '')  ?>&euro;</b><br />
                        Proce 8-15 days : <b><?=number_format($car['day815price'], 2, '.', '') ?>&euro;</b>

                    </td>
                    <td class="actiontd center last">
                        <a href="<?=$url.'car/edit/'.$car['id'];?>" class="edit" id="<?=$car['id']?>">Edit</a>
                        <a href="javascript:" class="deletecar" id="<?=$car['id']?>">Delete</a>
                    </td>

                </tr>                                      

                <? 
                    $k++;
                    endforeach; ?>

        </tbody>
    </table>

</div>

<div class="spacer"></div>
