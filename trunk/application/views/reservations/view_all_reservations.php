
<h2> <img src="<?=$url?>assets/img/titles/bookings_in_progress.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Car</th>
                <th>Date From / To</th>
                <th>Pickup Location</th>
                <th>Return Location</th>
                <th>Client</th>
                <th class="center">Status</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=1;
                foreach($all_reservations_in_progress as $reservation): ?> 

                <tr <? if($k%2==0) echo 'class="odd"'; ?>>

                    <td><strong><?=$reservation['name']?></strong></td>
                    <td class="res-from-to"><?=date('d.m - H:i',$reservation['datefrom'])?>h / <?=date('d.m - H:i',$reservation['dateto'])?>h</td>
                    <td><?=$reservation['pickup_loc']?></td>
                    <td><?=$reservation['return_loc']?></td>
                    <td><?=$reservation['firstName']." ".$reservation['lastName']?></td>
                    <td class="res-status">
                        <?
                            $now = time();
                            $days = ceil(($reservation['dateto'] - $now) / 86400);

                            if($days==0) {
                            ?> <img src="<?=base_url()?>assets/img/animated_gif/red.gif" alt="status" /> <?
                            }else if ($days<=1) {
                                ?> <img src="<?=base_url()?>assets/img/animated_gif/orange.gif" alt="status" /> <?
                                }else {
                                ?> <img src="<?=base_url()?>assets/img/animated_gif/green.gif" alt="status" /> <?
                            }
                        ?>
                    </td>
                    <td class="actiontd center last">
                        <input type="hidden" id="from_date_hid_<?=$reservation['id']?>" value="<?=mdate("%d.%m.%Y ", $reservation['datefrom'])?>" />
                        <input type="hidden" id="from_time_hid_<?=$reservation['id']?>" value="<?=mdate("%H:%i", $reservation['datefrom'])?>" />
                        <input type="hidden" id="to_date_hid_<?=$reservation['id']?>" value="<?=mdate("%d.%m.%Y ", $reservation['dateto'])?>" />
                        <input type="hidden" id="to_time_hid_<?=$reservation['id']?>" value="<?=mdate("%H:%i", $reservation['dateto'])?>" />
                        <a href="<?=$url?>reservation/reservation_details/<?=$reservation['id']?>" class="details">Details</a>
                        <a href="javascript:" id="promjeni_<?=$reservation['id']?>" class="changebooking">Change</a>
                        <a href="javascript:" class="end" id="end_<?=$reservation['id']?>">Finish</a>
                    </td>

                </tr>                                      

                <? 
                    $k++;                
                    endforeach; ?>

        </tbody>
    </table>

</div>

<div class="spacer"></div>

<h2> <img src="<?=$url?>assets/img/titles/bookings_on_hold.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Car</th>
                <th>Date From / To</th>
                <th>Pickup Location</th>
                <th>Return Location</th>
                <th>Client</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=1;
                foreach($all_reservations_on_hold as $reservation): ?> 

                <tr <? if($k%2==0) echo 'class="odd"'; ?>>

                    <td><strong><?=$reservation['name']?></strong></td>
                    <td class="res-from-to"><?=date('d.m - H:i',$reservation['datefrom'])?>h / <?=date('d.m - H:i',$reservation['dateto'])?>h</td>
                    <td><?=$reservation['pickup_loc']?></td>
                    <td><?=$reservation['return_loc']?></td>
                    <td><?=$reservation['firstName']." ".$reservation['lastName']?></td>
                    <td class="actiontd center last">
                        <input type="hidden" id="from_date_hid_<?=$reservation['id']?>" value="<?=mdate("%d.%m.%Y ", $reservation['datefrom'])?>" />
                        <input type="hidden" id="from_time_hid_<?=$reservation['id']?>" value="<?=mdate("%H:%i", $reservation['datefrom'])?>" />
                        <input type="hidden" id="to_date_hid_<?=$reservation['id']?>" value="<?=mdate("%d.%m.%Y ", $reservation['dateto'])?>" />
                        <input type="hidden" id="to_time_hid_<?=$reservation['id']?>" value="<?=mdate("%H:%i", $reservation['dateto'])?>" />
                        <a href="<?=$url?>reservation/reservation_details/<?=$reservation['id']?>" class="details">Details</a>
                        <a href="javascript:" id="promjeni_<?=$reservation['id']?>" class="changebooking">Change</a>
                        <a href="javascript:" class="stopbooking" id="stop_<?=$reservation['id']?>">Cancel</a>
                    </td>

                </tr>                                      

                <? 
                    $k++;
                    endforeach; ?>

        </tbody>
    </table>

</div>

<div class="spacer"></div>

<?
    $html2 = makefull('fullto',15,'id="fullto"');
?>

<script type="text/javascript">
    html2 = '<?=$html2?>';
</script>