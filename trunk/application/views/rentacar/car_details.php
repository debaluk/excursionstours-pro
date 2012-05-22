<div class="web_txt_web_col1 finish details clearfix" style="width: 897px;">

    <h1 style="margin-left: 19px; margin-bottom: 11px;"><img alt="Globtour Montenegro | Rezervacija" src="<?=$url?>assets/img/titles/rentacar.png"></h1>

    <?
        if($this->session->userdata('pickup_date'))
            $ispost = TRUE;
    ?>

    <!--BOX ANIM HOLDER-->
    <div class="box-anim-holder">

        <!--INFO BOX-->
        <div class="info-box" <?if(isset($ispost)){echo 'style="display:block"';}else {echo 'style="display:none"';}?>>
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
        <div class="change-box" <?if(isset($ispost)){echo 'style="display:none"';}else {echo 'style="display:block"';}?>>

            <div class="info-top">
                <h4>Reservation details</h4>
            </div>

            <div class="info-bot"> 

                <div class="m-form">

                    <form id="formReservationBasicData" method="post" action="<?=$url?>getCarQuote">

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
                        <div class="basic-data-2" <?if(isset($ispost)){echo 'style="display:none"';}else {echo 'style="display:block"';}?>>

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
                        <div class="basic-data-3" class="clearfix" <?if(isset($ispost)){echo 'style="display:none"';}else {echo 'style="display:block"';}?>>

                            <div class="chage-details">

                                <input type="hidden" name="carid" value="<?=$car[0]->id?>" />
                                <input type="hidden" name="pickup_date" id="pickup_date">
                                <input type="hidden" name="return_date" id="return_date">
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

                        //console.log('init');

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

    </div>
    <!--BOX ANIM HOLDER-->

    <!--BOOKING SUMMARY -->
    <div id="summary" class="clearfix">

        <div class="f-left"></div>

        <div class="f-mid">

            <div class="f-first ">

                <div class="f-image">

                    <?

                        $pic_arr = explode('.',$car[0]->f_name);
                        $big_filename = 'thumbnail/'.$pic_arr[0].'_800x600_exacttop.'.$pic_arr[1];
                        $thumb_filename = 'thumbnail/'.$pic_arr[0].'_210x151_exacttop.'.$pic_arr[1];

                    ?>

                    <a rel="lightbox" title="<?=$car[0]->name?>" href="<?=$info_sis_url?>pro-gallery/<?=$car[0]->g_path?>/<?=$big_filename?>">
                        <img alt="<?=$car[0]->name?>" src="<?=$info_sis_url?>pro-gallery/<?=$car[0]->g_path?>/<?=$thumb_filename?>" width="210">
                    </a>
                </div>

                <div class="f-description">
                    <h3><?=$car[0]->name?></h3>
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
                            <li><?=$car[0]->seat_count?></li>
                            <li><?=$car[0]->num_of_doors?></li>
                            <li><?=$car[0]->luggage_capacity?></li>

                            <?if($car[0]->auto_transmission){ $bool = 'yes'; }else{ $bool = 'no'; } ?>
                            <li <?if($bool == 'yes') echo 'class="ci-yes"';?>>                                    
                                <img src="<?=$url?>assets/img/backgnds/<?=$bool?>.png" alt="<?=$bool?>" /></li>

                            <?if($car[0]->ac){ $bool = 'yes'; }else{ $bool = 'no'; } ?>
                            <li <?if($bool == 'yes') echo 'class="ci-yes"';?>>
                                <img src="<?=$url?>assets/img/backgnds/<?=$bool?>.png" alt="<?=$bool?>" /></li>   

                            <li><?if($car[0]->diesel){ echo 'D'; }else{ echo 'B'; } ?></li>
                        </ul>

                        <div class="score">
                            <div class="indicator-bg">

                                <?
                                    /* FIRST CALCULATE PERCENTAGE --> FORMULA X:100=CUR:TOTAL */                                    

                                    $x= (100*$car[0]->score)/10;

                                ?>

                                <div class="indicator" <? echo 'style="width:'.$x.'%"';?>></div>
                            </div>
                            <div class="score-txt">Score: <?=$car[0]->score?></div>
                        </div> 
                    </div>

                </div>

            </div>

            <div class="f-sec clearfix">

                <?if(isset($ispost)){?><div class="price" style="float: right; height: 43px; line-height: 43px"><strong class="green-text">Price:</strong><strong><?=$this->session->userdata('tot_price');?> &euro;</strong>  </div> <?}?> 


                <?if(isset($ispost)){?>
                    <a class="submit" id="formReservationStep3Submit" title="Book now" href="<?=$url?>step_3?id=<?=$car[0]->id?>"></a>
                    <?}else{?>
                    <a class="submit" id="formReservationStep3Submit" title="Book now" onclick="alert('Please fill in the dates and locations in the form on the left side of this page'); return false;" href="javascript:"></a>
                    <?}?>




            </div>

            <div class="hr"></div>

            <!--PARAMETERS-->              
            <div class="parameter">

                <!--<div class="bonus-box">
                <div class="inline-b-box">
                <h3>Bonus equipment &ndash; exclusively with us</h3>
                <ul>

                <li><b>GPS Navigation</b></li>

                </ul>
                </div>
                </div>-->

                <strong>engine</strong>: <?=$car[0]->engine?><br />
                <strong>max power</strong>: <?=$car[0]->maxpower?><br />

                <strong>maximal speed</strong>: <?=$car[0]->maxspeed?>km/h<br />
                <strong >consumption</strong>: <?=number_format($car[0]->fuel_consumption,1,',', ' ')?>l/100km<br />
                <strong>transmission</strong>: 
                <?
                    if($car[0]->auto_transmission){
                        echo 'automatic';
                    }else echo 'manual';
                ?>
                <br />
                <strong >luggage space capacity</strong>:<?=$car[0]->luggage_capacity?>l<br />
            </div>
            <!--/PARAMETERS-->

            <div class="hr"></div>

            <!--EQUIPMENT-->
            <div class="parameter">
                <h3>Vehicle equipmnet</h3>
                <p style="padding: 13px 0; text-align: left;"><?=$car[0]->equipment?></p>
            </div>
            <!--/EQUIPMENT-->

            <!-- GALLERY -->
            <div class="hr"></div>
            <div class="gallery">
                <h3>Gallery</h3>
                <ul class="items" style="padding: 13px 0;">

                    <?
                        //print_r($images);
                        if (isset($images)){
                            $skip = FALSE;
                            foreach($images as $image):
                                //skip first
                                if(!$skip){
                                    $skip = TRUE;                                          
                                }else{

                                    $pic_arr = explode('.',$image->filename);
                                    $big_filename = 'thumbnail/'.$pic_arr[0].'_800x600_exacttop.'.$pic_arr[1];
                                    $thumb_filename = 'thumbnail/'.$pic_arr[0].'_210x151_exacttop.'.$pic_arr[1];

                                ?>
                                <li class="item">
                                    <div class="item-image">
                                        <a rel="lightbox" title="<?=$car[0]->name?>" href="<?=$info_sis_url?>pro-gallery/<?=$car[0]->g_path?>/<?=$big_filename?>" >
                                            <img alt="car_<?=$car[0]->name;?>" src="<?=$info_sis_url?>pro-gallery/<?=$car[0]->g_path?>/<?=$thumb_filename?>" width="167">
                                        </a>
                                    </div>
                                </li>
                                <?}
                                endforeach;
                        }else echo 'No images';
                    ?>

                </ul>
            </div>
            <!-- /GALLERY -->

            <!-- VIDEO  -->
            <div class="videos">
                <div class="hr"></div>
                <h3>Video</h3>

                <div class="youtube" style="padding: 13px 0;">
                    <?if (isset($video)){?>
                        <iframe width="522" height="318" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/<?=$video[0]->link?>?rel=0&amp;wmode=transparent" type="text/html" class="youtube-player" title="YouTube video player"></iframe>
                        <?}else echo 'No video.';?>
                </div>
            </div>
        </div>

        <div class="f-right"></div>

    </div>

</div>

<script type="text/javascript">
    $(function() {

            $('a[rel=lightbox]').lightBox({
                    overlayBgColor: '#000',
                    overlayOpacity: 0.6,
                    imageLoading: base_url+'assets/img/lightbox/loading.gif',
                    imageBtnClose: base_url+'assets/img/lightbox/close.gif',
                    imageBtnPrev: base_url+'assets/img/lightbox/prev.gif',
                    imageBtnNext: base_url+'assets/img/lightbox/next.gif',
                    imageBlank : base_url+'assets/img/lightbox/blank.gif',
                    containerResizeSpeed: 350,
                    txtImage: 'Image',
                    txtOf: 'of'
            });
    });
</script>