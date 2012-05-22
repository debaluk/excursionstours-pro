<?
    foreach($this->data['status0'] as $row): 
        $k=1; 
    ?>
    <tr <? if($k%2==0) echo 'class="odd"'; ?>> 
        <td><?=$row['title']?></td>
        <td><?=mdate("%d.%m.%Y", $row['date_from']);?></td>
        <td><?=$row['noadult']?></td>
        <td><?=$row['noch']?></td>
        <td>&euro; <?=$row['totalprice'] ?></td>       
        <td><?=$row['c_title'];?></td>
        <td><?=$row['firstName']." ".$row['lastName'];?></td>
        <td><?=$row['c_email'];?></td>

        <td class="center last actiontd">                        
            <a id="stop_<?=$row['id']?>" class="cancel_grid_exc">Cancel</a>
        </td>
    </tr>
    <? 
        $k++;
        endforeach;  ?>
