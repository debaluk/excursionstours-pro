<?
    foreach($this->data['status0'] as $row): 
        $k=1; 
    ?>
    <tr <? if($k%2==0) echo 'class="odd"'; ?>> 
        <td><?=$row['title']?></td>
        <td><?=mdate("%d.%m.%Y", $row['date_from']);?></td>
        <td><?=$row['noadult']+$row['noch']?></td>
        <td>&euro; <?=$row['totalprice'] ?></td>       
        <td><?=$row['c_title']." ".$row['firstName']." ".$row['lastName'];?></td>
        <td><?=$row['c_email'];?></td>
        <td><?=$row['c_phone'];?></td>
        <td style="font-size: 10px"><?=$row['pickup_location'];?></td>

        <td class="center last actiontd" style="width: 80px;">                        
            <a id="stop_<?=$row['id']?>" class="cancel_grid_exc">Cancel</a>
        </td>
    </tr>
    <? 
        $k++;
        endforeach;  ?>
