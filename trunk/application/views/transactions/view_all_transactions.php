
<h2> <img src="<?=$url?>assets/img/titles/all_transactions.png" /> </h2>

<div class="demo_jui">

    <table cellpadding="0" cellspacing="0" border="0" class="display wp-list-table widefat fixed posts" id="example">
        <thead>
            <tr>
                <th>Date / Time</th>
                <th>Total</th>
                <th>Client IP</th>
                <th>Description</th>
                <th>Result</th>
                <th>Code</th>
                <th class="center">DMS</th>
                <th class="center last">Reverse</th>
            </tr>
        </thead>
        <tbody>

            <?  
                $k=1;
                foreach($transactions as $transaction): 

                    if($transaction['result_code'] == '000'){
                        $color = "#b0f0b0";

                    }elseif($transaction['result_code'] == '400' OR $transaction['result'] == 'AUTOREVERSED' OR $transaction['result'] == 'REVERSED'){      
                        $color = "#B2D1F0";

                    }elseif($transaction['result_code'] == '???' OR $transaction['result'] == 'CREATED' OR $transaction['result'] == 'TIMEOUT' OR $transaction['result'] == 'PENDING'){
                        $color = "#f3f3f3"; 

                    }else{
                        $color = "#ffbaba"; 
                    }

                    if($transaction['dms_ok'] == 'NO' AND $transaction['result_code'] == '000'){
                        $makedmstrans = "<td><a class='edit' href=".base_url()."transactions/confirm_dms/".$transaction['id'].">Make DMS</a></td>";
                    }elseif($transaction['dms_ok'] == 'YES'){
                        $makedmstrans = '<td style="color: gray;">DMS done; amount='.($transaction['makeDMS_amount']/100).',00</td>';
                    }else{
                        $makedmstrans = '<td>---</td>'; 
                    }

                    if($transaction['result_code']=='000' AND $transaction['result'] =='OK'){
                        $reverse = "<td><a class='edit' href=".base_url()."transactions/confirm_reverse/".$transaction['id'].">Reverse</a></td>";

                    }elseif($transaction['result']=='REVERSED' AND $transaction['reversal_amount'] == '0'){
                        $reverse = '<td style="color: gray;">Autoreversal</td>';

                    }elseif($transaction['result_code']=='400' OR $transaction['result']=='REVERSED'){
                        $reverse = '<td style="color: gray;">Reversed; amount='.($transaction['reversal_amount']/100).',00</td>';

                    }else{
                        $reverse = '<td style="color: gray;">---</td>';
                    }

                    $update = " <td><a href='?action=update&id=". $transaction['id'] ."'>Update</a></td>";

                ?>



                <tr <? if($k%2==0) echo 'class="odd"'; ?>>

                    <td class="res-from-to"><?=date('d.m.Y G:i', strtotime( $transaction['t_date']))?> h</td>

                    <td><strong><? if($transaction['currency']=="978") echo "&euro; ";?><?=$transaction['amount']/100?>,00</strong></td>

                    <td><?=$transaction['client_ip_addr']?></td>

                    <td><?=$transaction['description']?></td>

                    <td style="background-color:<?=$color?> ;"><?=$transaction['result']?></td>

                    <td><?=$transaction['result_code']?></td>

                    <?=$makedmstrans?>

                    <?=$reverse?>

                </tr>                                      

                <? 
                    $k++;                
                    endforeach; ?>

        </tbody>
    </table>

</div>

<div class="spacer"></div>
