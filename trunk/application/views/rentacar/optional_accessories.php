<div class="ptitle">
    <p style=" font-size: 15px; margin: 0 0 0 10px; color: #333; line-height: 37px;">Optional accessories</p>
</div>

<form method="POST" onsubmit="accesories();return false;" id="car_accasories">

    <table cellpadding="0" cellspacing="0">
        <tbody>
            <?foreach($accessories as $row):?>
                <tr>
                    <td style="padding-left: 23px;">

                        <?
                            $checked = '';
                            if($this->session->userdata('extras')){
                                foreach($this->session->userdata('extras') as $id){
                                    if($row->accessoryId == $id){
                                        $checked = 'checked="checked"';
                                    }
                                }
                            }
                        ?>

                        <input type="checkbox" value="1" name="extras[<?=$row->accessoryId;?>]" id="extra-<?=$row->accessoryId;?>" <?=$checked?>>
                        <b><?=$row->type;?></b>, <?=$row->description;?> (<?=$row->price;?> &euro; / day)
                    </td>
                </tr>
                <?
                    $checked = '';
                    endforeach;?>
        </tbody>
    </table>

    <div style="width: 240px;">
        <div style="float: right; margin-top:9px"><img src="<?=base_url()?>assets/img/loader/ajax-loader.gif" id="ajax_loader" style="display: none;"></div>
        <input type="submit" value="Set selected accessories" name="formExtras" id="formExtras" class="submit" style="margin: 23px;">
    </div>
</form>
<style>
   #car_accasories .submit {
        background: none #333;
        font-size: 16px;
        height: 35px;
        line-height: 35px;
        padding: 0 10px;
        width: auto;
        cursor: pointer;
        color: white;
        font-weight: normal;
    }
</style>