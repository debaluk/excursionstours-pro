
<h2> <img src="<?=$url?>assets/img/titles/all_excursions.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Excursion name</th>
                <th>Info</th>
                <th class="center">Status</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=1;
                foreach($excursions as $excursion): ?>  

                <tr <? if($k%2==0) echo 'class="odd"'; ?>>

                    <td class="column-thumbnail">

                        <?

                            $gallery = $this->db->get_where('gallery', array('excursions_id' => $excursion['id']))->row_array();



                            if(isset($gallery['ID'])):

                                $this->db->order_by('order asc, ID asc');
                                $pictures = $this->db->get_where('pictures',array('gallery_ID'=>$gallery['ID']))->result_array();

                                //print_r($pictures);

                                if(isset($pictures[0]['filename'])){

                                    $pic_arr = explode('.',$pictures[0]['filename']);
                                    $thumb_filename = 'thumbnail/'.$pic_arr[0].'_105x79_exacttop.'.$pic_arr[1];

                                ?>
                                <img src="<?=$url?>pro-gallery/<?=$gallery['path']?>/<?=$thumb_filename?>" alt="excursion_<?=$excursion['id']?>" style="padding: 1px; border: 1px solid #f1f1f1;" />
                                <?
                                }else echo "No image";

                                endif;
                        ?>



                    </td>
                    <td ><strong><?=$excursion['title']?></strong></td>
                    <td>
                        Price fo Adult: <?=$excursion['adultPrice']?>&euro;<br />
                        Price for Children: <?=$excursion['childPrice']?>&euro;<br />
                        Capacity: <?=$excursion['capacity']?> persons
                    </td>
                    <td class="center" style="vertical-align: middle;">
                        <?
                            switch ($excursion['status']){
                                case 0:
                                ?>
                                <img src="<?=base_url()?>assets/img/backgrounds/item-closed.png" alt="Excursion closed"  />
                                <?
                                    break;
                                case 1:
                                ?>
                                <img src="<?=base_url()?>assets/img/backgrounds/item-open.png" alt="Excursion open"  /> 
                                <?
                                    break;
                            }
                        ?>
                    </td> 
                    <td class="actiontd center last" style="width:171px">
                        <a href="<?=base_url().'excursions/excursions/edit/'.$excursion['id'];?>" id="<?=$excursion['id']?>">Edit</a> 
                        <a href="javascript:;" class="delete_grid" id="ex_<?=$excursion['id']?>">Delete</a>
                        <?
                            switch ($excursion['status']){
                                case 0:
                                ?>
                                <a href="<?=base_url()?>excursions/excursions/set_status/<?=$excursion['id'];?>/1">Activate</a>    
                                <?
                                    break;
                                case 1:
                                ?>
                                <a href="<?=base_url()?>excursions/excursions/set_status/<?=$excursion['id'];?>/0">Deactivate</a>    
                                <?
                                    break;
                            }
                        ?>

                    </td>

                </tr>                                      

                <? 
                    $k++;
                    endforeach; ?>

        </tbody>
    </table>

</div>

<div class="spacer"></div>

<script type="text/javascript">
    $(document).ready(function(){


            $('.delete_grid').live('click',function(){
                    if(confirm('Are you sure?')){
                        var id = $(this).attr('id').substr(3);
                        $.ajax({
                                url : base_url+'excursions/excursions/delete',
                                type: 'post',
                                data: {id:id},
                                dataType:'json',
                                success: function(data){
                                    $('#ex_'+id).parent().parent().remove();
                                }
                        });
                    }
            });
    });
</script>