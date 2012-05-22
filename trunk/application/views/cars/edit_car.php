<h2> <img src="<?=$url?>assets/img/titles/car_edit.png" height="32" /> </h2>
<div id="infomessage" style="display: none;"></div>
<form id="editcar" name="addcar" method="post" action="javascript:void(null);">
    <div class="lineinput">
        <label>
           Car name:<br />
            <input name="name" id="name" value="<?=$car['name']?>" type="text" class="inputbox" />*
        </label>
    </div>

    <div class="lineinput">
        <label>
            Car description:<br />
            <textarea id="description" name="description" class="inputbox" rows="5" cols="40"><?=$car['description']?></textarea>
        </label>
    </div>

    <div class="lineinput">
        <label>
            Price  1-3 days:<br />
            <input name="day13price" id="day13price" value="<?=number_format($car['day13price'], 2, '.', '')?>" type="text" class="inputbox" />*
        </label>
    </div>

    <div class="lineinput">
        <label>
            Price  4-7 days:<br /> 
            <input name="day47price" id="day47price" value="<?=number_format($car['day47price'], 2, '.', '')?>" type="text" class="inputbox" />*
        </label>
    </div>

    <div class="lineinput">
        <label>
            Price  8-15 days:<br /> 
            <input name="day815price" id="day815price" value="<?=number_format($car['day815price'], 2, '.', '')?>" type="text" class="inputbox" />*
        </label>
    </div>

    <h2 style="font-size: 18px; font-weight: bold;">Car accessories </h2>
    <div class="lineinput">
        <input type="checkbox" <? if($car['abs'] == 1)echo 'checked="checked"'?> name="abs" id="abs" value="1" class="first" /> ABS
        <input type="checkbox" <? if($car['ac'] == 1)echo 'checked="checked"'?> name="ac" id="ac" value="1" /> AC
        <input type="checkbox" <? if($car['cd'] == 1)echo 'checked="checked"'?> name="cd" id="cd" value="1" /> CD
        <input type="checkbox" <? if($car['airbag'] == 1)echo 'checked="checked"'?> name="airbag" id="airbag" value="1" />AirBag
        <input type="checkbox" <? if($car['diesel'] == 1)echo 'checked="checked"'?> name="diesel" id="diesel" value="1" />Diesel
        <input type="checkbox" <? if($car['auto_transmission'] == 1)echo 'checked="checked"'?> name="auto_transmission" id="auto_transmission" value="1" />Auto transmission
    </div>

    <div class="lineinput" class="inputbox">
        <h2 style="font-size: 18px; font-weight: bold;">Add on during car booking</h2>             
        <?

            $bs = 0;
            $gp = 0;
            $wd = 0;

            $acdata = $this->car_model->readAccessoriesForCar($car['id']);
            foreach($acdata as $one_ac) {

                //echo "- one -";
                switch($one_ac['accessoryId']) {
                    case 1: $bs=1;
                        break;
                    case 2: $gp=1;
                        break;
                    case 3: $wd=1;
                        break;
                }

            } 
        ?>
        <div class="lineinput">
            <input type="checkbox" <? if($bs == 1)echo 'checked="checked"'?> name="bs" id="bs" value="1" class="first" /> &euro; 7 Baby Seat 
            <input type="checkbox" <? if($gp == 1)echo 'checked="checked"'?> name="gp" id="gp" value="2" /> &euro; 10 GPS
            <input type="checkbox" <? if($wd == 1)echo 'checked="checked"'?> name="wd" id="wd" value="3" /> &euro; 15 With Driver
        </div> 
    </div>
    
    <div class="lineinput">
        <label>
            Seat count:<br />
            <input name="seat_count" id="seat_count" value="<?=$car['seat_count']?>" type="text" class="inputbox" />*
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Number of doors:<br />
            <input name="num_of_doors" id="num_of_doors" value="<?=$car['num_of_doors']?>" type="text" class="inputbox" />*
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Luggage capacity:<br />
            <input name="luggage_capacity" id="luggage_capacity" value="<?=$car['luggage_capacity']?>" type="text" class="inputbox" />*
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            CO2:<br />
            <input name="co2" id="co2" value="<?=$car['co2']?>" type="text" class="inputbox" />*
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Score:<br />
            <input name="score" id="score" value="<?=$car['score']?>" type="text" class="inputbox" />*
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Fuel Consumption:<br />
            <input name="fuel_consumption" id="fuel_consumption" value="<?=$car['fuel_consumption']?>" type="text" class="inputbox" />*
            <br />
            <span class="description">Use "." as separator. For example 4.7</span>
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Engine:<br />
            <input name="engine" id="engine" value="<?=$car['engine']?>" type="text" class="inputbox" />*
            <br />
            <span class="description">Use "." as separator. For example 1.4</span>
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Max power:<br />
            <input name="maxpower" id="maxpower" value="<?=$car['maxpower']?>" type="text" class="inputbox" />*
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Max speed:<br />
            <input name="maxspeed" id="maxspeed" value="<?=$car['maxspeed']?>" type="text" class="inputbox" />*
            
            <br />
            <span class="description">km/h</span>
        </label>
    </div>
    
    <div class="lineinput">
        <label>
            Equipment<br />
            <textarea id="equipment" name="equipment" class="inputbox" rows="5" cols="40"><?=$car['equipment']?></textarea>
        </label>
    </div>
    
    
    <div class="lineinput" style="margin-top: 20px;"> 
        <label>
            <input type="hidden" value="<?=$car['id']?>" name="carid" />
            
        </label>
        <input type="submit" value="Edit Car" class="button-primary" id="editcar" />   
    </div>

</form>