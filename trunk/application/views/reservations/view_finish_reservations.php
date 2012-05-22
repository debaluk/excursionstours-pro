
<h2> <img src="<?=$url?>assets/img/titles/bookings_completed.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Car</th>
                <th>Date From / To</th>
                <th>Client</th>
                <th>Booking Source</th>
                <th>Duration</th>
                <th class="th-action center last">Action</th>
            </tr>
        </thead>
        <tbody>

            <?  
            $k=1;
            foreach($all_finish_reservations as $reservation): ?> 

                 <tr <? if($k%2==0) echo 'class="odd"'; ?>>

                    <td><strong><?=$reservation['name']?></strong></td>
                    <td class="res-from-to"><?=date('d.m - H:i',$reservation['datefrom'])?>h / <?=date('d.m - H:i',$reservation['dateto'])?>h</td>
                    <td><?=$reservation['firstName']." ".$reservation['lastName']?></td>
                    <td><? if($reservation['source_info']=='') {echo '&nbsp;';} else echo $reservation['source_info'];?></td>
                    <td><?=$reservation['numofdays']?></td>
                    <td class="actiontd center last">
                        <a href="<?=$url?>reservation/reservation_details/<?=$reservation['id']?>" class="details">Details</a>
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