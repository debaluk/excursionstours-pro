<?
    foreach ( $this->data['status0'] as $row ):
        $k = 1;
        ?>
        <tr <? if ( $k % 2 == 0 ) echo 'class="odd"'; ?>> 
            <td><?= $row['title'] ?></td>
            <td><?= mdate ( "%d.%m.%Y", $row['date_from'] ); ?></td>
            <td><?= $row['noadult'] + $row['noch'] ?></td>
            <td>&euro; <?= $row['totalprice'] ?></td>       
            <td style="padding: 0; border-right: 0">

                <table width="100%">
                    <tr>
                        <td style="width:60px; border-right: 0"><b>Name:</b></td>
                        <td><?= $row['c_title'] . " " . $row['firstName'] . " " . $row['lastName']; ?></td>
                    </tr>
                    <tr>
                        <td style="border-right: 0"><b>Email:</b></td>
                        <td><?= $row['c_email'] ?></td>
                    </tr>
                    <tr>
                        <td style="border-right: 0"><b>Phone:</b></td>
                        <td><?= $row['c_phone'] ?></td>
                    </tr>
                    <tr>
                        <td style=" border-bottom: 0; border-right: 0"><b>Address:</b></td>
                        <td style="line-height: 18px; padding-bottom: 5px; display: block; border-bottom: 0">
                            <?= $row['address1'] ?><br>
                            <?= $row['zip_code'] . ' ' . $row['town_city'] ?><br>
                            <?= $row['country'] ?>
                        </td>
                    </tr>
                </table>
            </td>

            <td style="font-size: 10px"><?= $row['pickup_location']; ?></td>

            <td class="center last actiontd" style="width: 80px;">                        
                <a id="stop_<?= $row['id'] ?>" class="cancel_grid_exc">Cancel</a>
            </td>
        </tr>
        <?
        $k++;
    endforeach;
?>
