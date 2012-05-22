
<h2> <img src="<?=$url?>assets/img/titles/all_tourss.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Tour name</th>
                <th>Info</th>
                <th class="center">Status</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=1;
                foreach($tours as $tour): ?>  

                <tr <? if($k%2==0) echo 'class="odd"'; ?>>

                    <td class="column-thumbnail">
                        <?
                            $image = $this->db->get_where('tourimg',array('tours_id' => $tour['id']))->result_array();
                            if(isset($image[0]['url'])){
                            ?>
                            <img src="<?=base_url()?>assets/img/tours/<?=$image[0]['url']?>.jpg" alt="tour_<?=$tour['id']?>" style="padding: 1px; border: 1px solid #f1f1f1; width: 82px;" />
                            <?
                            }else echo "No image";
                        ?>
                    </td>
                    <td ><strong><?=$tour['title']?></strong></td>
                    <td>
                        Price per person in 1/2 room : <?=$tour['Cena Dvokrevetne']?>&euro;<br />
                        Price per person in 1/1 room : <?=$tour['Cena Jednokrevetne']?>&euro;<br />
                        Capacity: <?=$tour['capacity']?> persons
                    </td>
                    <td class="center" style="vertical-align: middle;">
                        <?
                            switch ($tour['status']){
                                case 0:
                                ?>
                                <img src="<?=base_url()?>assets/img/backgrounds/item-closed.png" alt="Tour closed"  />
                                <?
                                    break;
                                case 1:
                                ?>
                                <img src="<?=base_url()?>assets/img/backgrounds/item-open.png" alt="Tour open"  /> 
                                <?
                                    break;
                            }
                        ?>
                    </td> 
                    <td class="actiontd center last" style="width:171px">
                        <a href="<?=base_url().'tours/tours/edit/'.$tour['id'];?>" id="<?=$tour['id']?>">Edit</a> 
                        <a href="javascript:;" class="delete_grid" id="ex_<?=$tour['id']?>">Delete</a>
                        <?
                            switch ($tour['status']){
                                case 0:
                                ?>
                                <a href="<?=base_url()?>tours/tours/set_status/<?=$tour['id'];?>/1">Activate</a>    
                                <?
                                    break;
                                case 1:
                                ?>
                                <a href="<?=base_url()?>tours/tours/set_status/<?=$tour['id'];?>/0">Deactivate</a>    
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
                    url : base_url+'tours/tours/delete',
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
