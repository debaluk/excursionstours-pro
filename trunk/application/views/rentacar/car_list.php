<div class="web_txt_web_col1" style="width: 897px;">

    <h1 style="margin-left: 19px; margin-bottom: 11px;"><img alt="Globtour Montenegro | Rezervacija" src="<?=$url?>assets/img/titles/rentacar.png"></h1>

    <!--BOX ANIM HOLDER-->
    <div class="box-anim-holder">

        <? if(!isset($browse_fleet)){ ?>



            <!--INFO BOX-->
            <div class="info-box" style="display: block;">
                <div class="info-top">
                    <h4>Your details</h4>
                </div>
                <div class="info-bot">
                    <table class="t-info">
                        <tr class="t-head">
                            <td>Pickup</td>
                            <td>Return</td>
                        </tr>
                        <tr>
                            <td><?=$this->session->userdata('pickup_loc_text')?><br /><?=$this->session->userdata('pickup_date').', '.$this->session->userdata('fullfrom');?> h</td>
                            <td><?=$this->session->userdata('return_loc_text')?><br /><?=$this->session->userdata('return_date').', '.$this->session->userdata('fullto');?> h</td>
                        </tr>
                    </table>

                    <div class="c-details"><a href="javascript:" id="change-details" onclick=" $('.info-box').slideUp({duration:500,easing:'easeOutSine', complete:function(){  $('.change-box').slideDown({duration:500,easing:'easeOutSine',complete:function(){$('.change-box .basic-data-2').slideDown({duration:500,easing:'easeOutSine',complete:function(){$('.change-box .basic-data-3').slideDown({duration:500,easing:'easeOutSine',complete:function(){ }}) }}) }}) } });">Change details</a></div>
                </div>
            </div>
            <!--/INFO BOX-->

            <!--CHANGE BOX-->    
            <div class="change-box" style="display: none;">

                <div class="info-top">
                    <h4>Reservation details</h4>
                </div>

                <div class="info-bot"> 

                    <div class="m-form">

                        <form id="formReservationBasicData" method="post" action="<?=$url?>step_2">

                            <!--BASIC DATA 1-->                                    
                            <div class="basic-data-1" style="display: block;">
                                <dl>
                                    <dt><label for="fromBranch" class="element">Pick up:</label> </dt>
                                    <dd>                         
                                        <select id="pickup_loc_id" name="pickup_loc_id">
                                            <optgroup label="Budva">
                                                <option selected="selected" value="1">Globtour Office</option>
                                                <option value="2">Hotel Avala</option>
                                                <option value="3">Hotel Slovenska Plaza</option>
                                                <option value="4">Hotel Mediteran</option>
                                                <option value="5">Hotel Iberostar</option>
                                            </optgroup>
                                            <optgroup label="Tivat">
                                                <option value="6">Airport +15€</option>
                                                <option value="7">Hotel Palma +15€</option>
                                            </optgroup>
                                            <optgroup label="Bar">
                                                <option value="8">Hotel Princess +15€</option>
                                            </optgroup>
                                            <optgroup label="Ulcinj">
                                                <option value="9">Hotel Otrant +15€</option>
                                                <option value="10">Hotel Ada Bojana +15€</option>
                                            </optgroup>
                                            <optgroup label="Podgorica">
                                                <option value="11">Airport +15€</option>
                                                <option value="12">Hotel Crna Gora +15€</option>
                                                <option value="13">Hotel Podgorica +15€</option>
                                            </optgroup>
                                        </select>

                                    </dd>
                                </dl>

                                <dl class="cbox-dl-left w143">
                                    <dt><label class="element">From:</label> </dt>
                                    <dd class="clearfix">
                                        <div class="dp-input">
                                            <input type="text" name="datefrom" id="datefrom" size="29" disabled="disabled"/>
                                        </div>
                                    </dd>

                                </dl>

                                <dl class="cbox-dl-left">
                                    <dt><label class="element">Time:</label> </dt>
                                    <dd>
                                        <!-- make full -->
                                        <? echo makefull('fullfrom',15,'id="fullfrom" class="dd"'); ?>

                                    </dd>

                                </dl>

                                <div style="clear: both;"></div>
                            </div>

                            <!--/BASIC DATA 1-->

                            <!--BASIC DATA 2-->                                    
                            <div class="basic-data-2" style="display: none;">

                                <dl>
                                    <dt><label for="return_loc_id" class="element">Return:</label> </dt>
                                    <dd>                         
                                        <select id="return_loc_id" name="return_loc_id">
                                            <optgroup label="Budva">
                                                <option selected="selected" value="1">Globtour Office</option>
                                                <option value="2">Hotel Avala</option>
                                                <option value="3">Hotel Slovenska Plaza</option>
                                                <option value="4">Hotel Mediteran</option>
                                                <option value="5">Hotel Iberostar</option>
                                            </optgroup>
                                            <optgroup label="Tivat">
                                                <option value="6">Airport +15€</option>
                                                <option value="7">Hotel Palma +15€</option>
                                            </optgroup>
                                            <optgroup label="Bar">
                                                <option value="8">Hotel Princess +15€</option>
                                            </optgroup>
                                            <optgroup label="Ulcinj">
                                                <option value="9">Hotel Otrant +15€</option>
                                                <option value="10">Hotel Ada Bojana +15€</option>
                                            </optgroup>
                                            <optgroup label="Podgorica">
                                                <option value="11">Airport +15€</option>
                                                <option value="12">Hotel Crna Gora +15€</option>
                                                <option value="13">Hotel Podgorica +15€</option>
                                            </optgroup>
                                        </select>

                                    </dd>
                                </dl>

                                <dl class="cbox-dl-left w143">
                                    <dt><label class="element">To:</label> </dt>
                                    <dd class="clearfix">

                                        <div class="dp-input">
                                            <input type="text" name="dateto" id="dateto" size="29" disabled="disabled"/>
                                        </div>                             
                                    </dd>

                                </dl>

                                <dl class="cbox-dl-left">
                                    <dt><label class="element">Time:</label> </dt>
                                    <dd>
                                        <!-- make full -->
                                        <? echo makefull('fullto',15,'id="fullto" class="dd"'); ?>

                                    </dd>

                                </dl>

                                <div class="clearfix"></div>
                            </div>

                            <!--/BASIC DATA 2-->

                            <!--BASIC DATA 3 -->
                            <div class="basic-data-3" class="clearfix" style="display: none;">

                                <div class="chage-details">

                                    <input type="hidden" id="pickup_date" name="pickup_date" value="25.04.2012" />
                                    <input type="hidden" id="return_date" name="return_date" value="26.04.2012" />
                                    <input type="submit" class="submit" id="formReservationStep1Submit" name="formReservationStep1Submit" value="" />

                                </div>

                                <div style="clear: both;"></div> 

                            </div>     
                            <!--/BASIC DATA 3-->

                        </form>

                    </div>    

                </div>

            </div>            
            <!--/CHANGE BOX-->

            <script type="text/javascript">
                // perform JavaScript after the document is scriptable.
                $(function(e) {


                        // dd combobox style
                        try {
                            $("body select.dd").msDropDown();
                        } catch(e) {
                            alert(e.message);
                        }

                        // picup return selec script
                        $('#pickup_loc_id').live('change', function(){

                                var sID = $('#pickup_loc_id option:selected').val(); 
                                var $dd = $('#return_loc_id');
                                if ($dd.length > 0) { // make sure we found the select we were looking for

                                    // save the selected value
                                    var selectedVal = $dd.val();

                                    // get the options and loop through them
                                    var $options = $('option', $dd);
                                    var arrVals = [];
                                    $options.each(function(){

                                            if($(this).val()==sID||$(this).val()==1||$(this).val()==6||$(this).val()==11){

                                                $(this).removeAttr('disabled');

                                            }else{
                                                $(this).attr('disabled','disabled');
                                                //console.log($(this).text())
                                                //console.log($(this).val())
                                            }
                                    });
                                }
                                $('#return_loc_id').val(sID).trigger('change');


                        })

                        $('#pickup_loc_id').val(1).trigger('change');

                });
            </script>
            <script type="text/javascript">
                $(function(){
                        function init_app(){
                            /***********************************************************
                            * JQUERY UI Calendar with event
                            ***********************************************************/

                            console.log('init');

                            var date = new Date();    

                            //  limiter 1 WEBSITE PICUP DATE - today is not available
                            //  limiter 0 SYSTEM PICUP DATE - today is available
                            var limiter = 0;

                            if(typeof(user_name) != "undefined"){
                                limiter = 0;   
                            }

                            var m = date.getMonth(),
                            d = date.getDate() + limiter,
                            y = date.getFullYear();

                            img_url = base_url+'assets/img/backgnds/calendar.png';
                            // Disable all dates till today
                            $('#datefrom').datepicker({
                                    minDate: new Date(y, m, d),
                                    dateFormat: 'dd.mm.yy',
                                    showOn: 'button',
                                    buttonImage: img_url,
                                    buttonImageOnly: true,
                                    onSelect: function(dateStr) {

                                        var depart = $.datepicker.parseDate('dd.mm.yy', dateStr);
                                        depart.setDate(depart.getDate() + limiter);
                                        $('#dateto').datepicker("setDate", depart);
                                        $('#dateto').datepicker("option", "minDate", depart);

                                        $('#pickup_date').val($.datepicker.formatDate('dd.mm.yy', $('#datefrom').datepicker('getDate')));
                                        $('#return_date').val($.datepicker.formatDate('dd.mm.yy', $('#dateto').datepicker('getDate')));

                                    }
                            });

                            $('#dateto').datepicker({
                                    minDate: new Date(y, m, d),
                                    dateFormat: 'dd.mm.yy',
                                    showOn: 'button',
                                    buttonImage: img_url,
                                    buttonImageOnly: true,
                                    onSelect: function(dateStr) {
                                        $('#return_date').val($.datepicker.formatDate('dd.mm.yy', $('#dateto').datepicker('getDate')));
                                    }
                            })

                            // SET TIME & DATE
                            $('#fullfrom').val('08:00');
                            $('#fullto').val('08:00');

                            $('#datefrom').datepicker('setDate', new Date(y, m, d));
                            $('#dateto').datepicker('setDate', new Date(y, m, d+1));

                            $('#pickup_date').val($.datepicker.formatDate('dd.mm.yy', $('#datefrom').datepicker('getDate')));
                            $('#return_date').val($.datepicker.formatDate('dd.mm.yy', $('#dateto').datepicker('getDate')));


                        }
                        init_app();    
                })
            </script>


            <?}?>
    </div>
    <!--BOX ANIM HOLDER-->

    <!--CAR LIST -->
    <div id="carlist" class="clearfix">

        <?foreach($car_list as $val):?>


            <div class="carbox">
                <div class="b-top"></div>
                <div class="b-mid">

                    <div class="c-first">
                        <div class="car-image">

                            <a title="<?=$val->name?>" href="<?=$url?>details?id=<?=$val->id?>">

                                <?

                                    $pic_arr = explode('.',$val->f_name);
                                    $thumb_filename = 'thumbnail/'.$pic_arr[0].'_105x76_exacttop.'.$pic_arr[1];

                                ?>

                                <img alt="<?=$val->name?>" src="<?=$info_sis_url?>pro-gallery/<?=$val->g_path?>/<?=$thumb_filename?>" width="102">
                            </a>

                        </div>
                        <div class="car-consmp">
                            <ul>
                                <li class="co2"><span></span><?=$val->co2?> g/kg </li>
                                <li class="fuel"><span></span><?=number_format($val->fuel_consumption,1,',', ' ')?> l/100km</li>
                            </ul>
                        </div>
                    </div>
                    <div class="c-sec">
                        <div class="car-info">
                            <h3><a title="<?=$val->name?>" href="<?=$url?>details?id=<?=$val->id?>"><?=$val->name?></a></h3>
                            <p> <?=$val->description?></p>
                        </div>
                        <div class="car-include">
                            <ul class="clearfix pic_items">
                                <li><img alt="Seat Count" title="Seat Count" src="<?=$url?>assets/img/backgnds/parameters/seat_count.png" /></li>
                                <li><img alt="Number of doors" title="Number of doors" src="<?=$url?>assets/img/backgnds/parameters/no_doors.png" /></li>
                                <li><img alt="Luggage space capacity" title="Luggage space capacity" src="<?=$url?>assets/img/backgnds/parameters/luggage.png" /></li>
                                <li><img alt="A/T" title="A/T" src="<?=$url?>assets/img/backgnds/parameters/a_t.png" /></li>
                                <li><img alt="A/C" title="A/C" src="<?=$url?>assets/img/backgnds/parameters/a_c.png" /></li>
                                <li><img alt="Beznin" title="Beznin" src="<?=$url?>assets/img/backgnds/parameters/benzin.png" /></li>
                            </ul>

                            <ul class="clearfix pic_text">
                                <li><?=$val->seat_count?></li>
                                <li><?=$val->num_of_doors?></li>
                                <li><?=$val->luggage_capacity?></li>

                                <?if($val->auto_transmission){ $bool = 'yes'; }else{ $bool = 'no'; } ?>
                                <li <?if($bool == 'yes') echo 'class="ci-yes"';?>>                                    
                                    <img src="<?=$url?>assets/img/backgnds/<?=$bool?>.png" alt="<?=$bool?>" /></li>

                                <?if($val->ac){ $bool = 'yes'; }else{ $bool = 'no'; } ?>
                                <li <?if($bool == 'yes') echo 'class="ci-yes"';?>>
                                    <img src="<?=$url?>assets/img/backgnds/<?=$bool?>.png" alt="<?=$bool?>" /></li>   

                                <li><?if($val->diesel){ echo 'D'; }else{ echo 'B'; } ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="c-third">
                        <div class="car-score-price">

                            <div class="score">
                                <div class="indicator-bg">

                                    <?
                                        /* FIRST CALCULATE PERCENTAGE --> FORMULA X:100=CUR:TOTAL */                                    

                                        $x= (100*$val->score)/10;

                                    ?>

                                    <div class="indicator" <? echo 'style="width:'.$x.'%"';?>></div>
                                </div>
                                <div class="score-txt">Score: <?=$val->score?></div>
                            </div>

                            <div class="price">Day Price: 
                                <?
                                    if(isset($u_data['no_days'])){
                                        switch($u_data['no_days']){
                                            case $u_data['no_days']<=3:
                                                echo '1-3 days - '.$val->day13price*$u_data['no_days'];
                                                break;
                                            case $u_data['no_days']>=4 && $no_days<=7:
                                                echo '4-7 days - '.$val->day47price*$u_data['no_days'];
                                                break;
                                            case $u_data['no_days']>=8 && $no_days<=15:
                                                echo '8-15 days - '.$val->day815price*$u_data['no_days'];
                                                break;
                                        }
                                    }else{
                                        echo $val->day13price;
                                    }

                                ?>&euro; 
                            </div>

                        </div>  
                        <div class="car-booknow">

                            <? if(!isset($browse_fleet)){ ?>
                                <a href="<?=$url?>step_3?id=<?=$val->id?>" id="book-now"><img alt="Book now" src="<?=base_url()?>assets/img/backgnds/book-now.png" /></a>
                                <?}else{?>
                                <a href="<?=$url?>details?id=<?=$val->id?>" id="book-now"><img alt="Book now" src="<?=base_url()?>assets/img/backgnds/book-now.png" /></a>
                                <?}?>


                        </div> 
                    </div>


                </div>
                <div class="b-bot"></div>
            </div>  

            <?endforeach;?>

    </div>
    <!--/CAR LIST -->

    <div style="clear: both;"></div>

</div>

