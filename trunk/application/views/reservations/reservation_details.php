<?
    $sourcestyle = "font-size:10px; color:#666666; font-style:italic;";
    $carstyle = "font-weight: bold";
    $datestyle = "font-size:10px;"
?>
<style>
    table tbody td {
        font-size:11px !important;
        padding: 3px 7px;
    }
    .title_det{
        font-size:11px !important;
        font-weight: bold !important;
    }
</style>
<? foreach($status0 as $row): ?>
    <div id="main">
        <div id="status-1">

            <div style="float: left; width: 400px;">

                <h2> <img src="<?=$url?>assets/img/titles/reservation_details.png" /> </h2>
                <table cellspacing="0" cellpadding="0" border="0" id="example" class="display wp-list-table widefat fixed posts">
                    <tr>
                        <td class="title_det">Order ID</td>
                        <td class="title_det last"><?=$row['id']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Car</td>
                        <td class="last"><?=$row['name']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Date/time</td>
                        <td  class="last">
                            <?
                                $format = "%d.%m - %H:%i".' h';
                                $time = $row['datefrom'];

                                echo mdate($format, $time);
                            ?> / <?
                                $time = $row['dateto'];

                                echo mdate($format, $time);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="title_det">Pickup location</td>
                        <td  class="last"><?=$row['pickup_loc']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Return location</td>
                        <td class="last"><?=$row['return_loc']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Client Name</td>
                        <td  class="last"><?=$row['firstName']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Client Email</td>
                        <td  class="last"><?=$row['email']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Client Phone</td>
                        <td class="last"><?=$row['phone']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Source info</td>
                        <td  class="last" style="font-size:10px; color:#666666; font-style:italic;"><?=$row['source_info']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Days</td>
                        <td class="last"><?=$row['numofdays']?></td>
                    </tr>
                    <tr>
                        <td class="title_det">Day Price</td>
                        <td class="last"><?=$row['dayprice']?> &euro;</td>
                    </tr>
                    <tr>
                        <td class="title_det">Total Price</td>
                        <td class="last"><?=$row['totalprice']?> &euro;</td>
                    </tr>
                    <tr>
                        <td class="title_det">Booking Note</td>
                        <td class="last"><? if ($row['note']==''){echo 'Empty';}else echo $row['note'];?> </td>
                    </tr>
                    <tr>
                        <td class="title_det">Hotel</td>
                        <td class="last"><? if ($row['hotel']==''){echo 'Empty';}else echo $row['hotel'];?> </td>
                    </tr> 
                    <tr>
                        <td class="title_det">Room number</td>
                        <td class="last"><? if ($row['roomnumber']==''){echo 'Empty';}else echo $row['roomnumber'];?> </td>
                    </tr>
                </table>

            </div>


            <div style="float: left; width: 400px; margin-left: 23px;">

                <h2> <img src="<?=$url?>assets/img/titles/optional_accessories.png" /> </h2>

                <table cellspacing="0" cellpadding="0" border="0" id="example" class="display wp-list-table widefat fixed posts">

                    <?

                        if(count($status0_ac)>0){
                            foreach ($status0_ac as $value) {?>
                            <tr>
                                <td class="title_det" style="width: 70px; vertical-align: top;"><?=$value['type']?></td>
                                <td><?=$value['description']?></td>
                                <td class="last" style="width: 50px; vertical-align: top"><?=$value['price']?> &euro; / day</td>
                            </tr>
                            <?}}else echo '<tr><td class="title_det last">Empty<td><tr>'
                    ?>

                </table>

            </div>

            <div style="clear: both; height: 23px;"></div>

            <a style="margin: 0 0 0 33px;" href="<?=base_url()?>" class="details">Back</a>

        </div>
    </div>
    <? endforeach;  ?>
