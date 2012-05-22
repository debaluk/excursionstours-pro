<div class="web_txt_web_col1" style="width: 897px;">

    <h1 style="margin-left: 19px;"><img alt="Globtour Montenegro | Rezervacija" src="<?=$url?>assets/img/titles/rentacar.png"></h1>


    <!--MODULE -->
    <div id="module" class="clearfix">

        <div id="m-left">
            <a href="<?=$url?>browse_fleet" id="sel-vehicle"><img alt="Select your vehicle" src="<?=base_url()?>assets/img/backgnds/sel-vehicle.png" /></a>
        </div> 

        <div id="m-mid">

            <div class="m-rentacar" >

                <h3>BASIC INFORMATION</h3>

                <div class="m-form">

                    <form id="formReservationBasicData" method="post" action="<?=$url?>step_2">

                        <!--BASIC DATA 1-->                                    
                        <div class="basic-data-1">
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

                            <dl>
                                <dt><label class="element">From:</label> </dt>
                                <dd class="clearfix">
                                    <div class="dp-input">
                                        <input type="text" name="datefrom" id="datefrom" size="29" disabled="disabled"/>
                                    </div>
                                </dd>

                            </dl>

                            <dl>
                                <dt><label class="element">Time:</label> </dt>
                                <dd>
                                    <!-- make full -->
                                    <? echo makefull('fullfrom',15,'id="fullfrom" class="dd"'); ?>

                                </dd>

                            </dl>
                        </div>

                        <!--/BASIC DATA 1-->

                        <!--BASIC DATA 2-->                                    
                        <div class="basic-data-2">
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

                            <dl>
                                <dt><label class="element">To:</label> </dt>
                                <dd class="clearfix">

                                    <div class="dp-input">
                                        <input type="text" name="dateto" id="dateto" size="29" disabled="disabled"/>
                                    </div>                             
                                </dd>

                            </dl>

                            <dl>
                                <dt><label class="element">Time:</label> </dt>
                                <dd>
                                    <!-- make full -->
                                    <? echo makefull('fullto',15,'id="fullto" class="dd"'); ?>

                                </dd>

                            </dl>
                        </div>

                        <!--/BASIC DATA 2-->

                        <div class="clearfix"></div>

                        <!--BASIC DATA 3-->
                        <div class="basic-data-3">

                            <dl>
                                <dd>
                                    <input type="hidden" id="pickup_date" name="pickup_date" value="25.04.2012" />
                                    <input type="hidden" id="return_date" name="return_date" value="26.04.2012" />
                                    <input type="submit" class="submit" id="formReservationStep1Submit" name="formReservationStep1Submit" value="" />
                                </dd>
                            </dl>

                        </div>
                        <!--/BASIC DATA 3-->

                    </form>

                </div>

            </div>
        </div>

        <div id="m-right"></div> 

    </div>

</div>

<!--/MODULE --> 

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
