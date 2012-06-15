<?
    foreach($this->data['status1'] as $row): ?>
    <tr>
         <td><?=$row['title']?></td>
        <td><?=mdate("%d.%m.%Y", $row['date_from']);?></td>
        <td><?=$row['noadult']?></td>
        <td><?=$row['noch']?></td>
        <td>&euro; <?=$row['totalprice'] ?></td>       
        <td><?=$row['c_title'];?></td>
        <td><?=$row['firstName']." ".$row['lastName'];?></td>
        <td><?=$row['c_email'];?></td>
        <td><?=$row['phone'];?></td>
        <td><?=$row['otherDetails'];?></td>

        <td class="center last actiontd">                        
            <a id="stop_<?=$row['id']?>" class="cancel_grid_tr">Cancel</a>
        </td>
    </tr>
    <? endforeach;  ?>