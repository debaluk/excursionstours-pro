<?
    foreach($this->data['status0'] as $row): ?>
    <tr>
        <td class="dashboard_title"><?=$row['title']?></td>

        <td><?
                $format = "%d.%m.%Y";
                $time = $row['date_from'];

                echo mdate($format, $time);

        ?></td>
        <td><?=$row['noadult']?></td>
        <td><?=$row['noch']?></td>
        <!--<td style="color: red">&euro; <?=$row['totalprice'] ?></td>-->
        <td>&euro; <?=$row['totalprice'] ?></td>
       
       
        <td><?=$row['c_title'];?></td>
        <td><?=$row['firstName']." ".$row['lastName'];?></td>
        <!--<td><span style='color:green'><?=$row['c_email'];?></span></td>-->
        <td><?=$row['c_email'];?></td>

        <td style="text-align: center;">                        
            <a id="stop_<?=$row['id']?>" class="cancel_grid_exc">Cancel</a>
        </td>
    </tr>
    <? endforeach;  ?>