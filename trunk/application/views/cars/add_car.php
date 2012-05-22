<h2> <img src="<?=$url?>assets/img/titles/car_add.png" /> </h2>
    <div id="infomessage" style="display: none;"></div>
    <form id="addcar" name="addcar" method="post" action="javascript:void(null);">
        <div class="lineinput">
            <label>
                Car name:<br /> 
                <input name="name" id="name" value="" type="text" class="inputbox" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Car description:<br /> 
                <textarea id="description" name="description" rows="5" class="inputbox" cols="40"></textarea>
            </label>
        </div>

        <div class="lineinput">
            <label>
                Price  1-3 days:<br />    
                <input name="day13price" id="day13price" class="inputbox" value="" type="text" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Price  4-7 days:<br /> 
                <input name="day47price" id="day47price" class="inputbox" value="" type="text" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Price  8-15 days:<br />   
                <input name="day815price" id="day815price" class="inputbox" value="" type="text" />*
            </label>
        </div>

        <div class="lineinput">
            <h2 style="font-size: 18px; font-weight: bold;">Car accessories</h2> 
            <div class="lineinput">
                <input type="checkbox" checked="checked" name="abs" id="abs" value="1" class="first" /> ABS
                <input type="checkbox" checked="checked" name="ac" id="ac" value="1" /> AC
                <input type="checkbox" checked="checked" name="cd" id="cd" value="1" /> CD
                <input type="checkbox" checked="checked" name="airbag" id="airbag" value="1" />AirBag
                <input type="checkbox" name="diesel" id="diesel" value="1" />Diesel
                <input type="checkbox"  name="auto_transmission" id="auto_transmission" value="1" />Auto transmission
            </div>
        </div>

        <div class="lineinput" class="inputbox">
            <h2 style="font-size: 18px; font-weight: bold;">Add on during car booking</h2>             

            <div class="lineinput">
                <input type="checkbox" name="bs" id="bs" value="1" checked="checked" class="first" /> &euro; 7 Baby Seat 
                <input type="checkbox" name="gp" id="gp" value="2" checked="checked"/> &euro; 10 GPS
                <input type="checkbox" name="wd" id="wd" value="3" checked="checked"/> &euro; 15 With Driver
            </div> 
        </div>

        <div class="lineinput">
            <label>
                Seat count:<br />
                <input name="seat_count" id="seat_count" value="" type="text" class="inputbox" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Number of doors:<br />
                <input name="num_of_doors" id="num_of_doors" value="" type="text" class="inputbox" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Luggage capacity:<br />
                <input name="luggage_capacity" id="luggage_capacity" value="" type="text" class="inputbox" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                CO2:<br />
                <input name="co2" id="co2" value="" type="text" class="inputbox" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Score:<br />
                <input name="score" id="score" value="" type="text" class="inputbox" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Fuel Consumption:<br />
                <input name="fuel_consumption" id="fuel_consumption" value="" type="text" class="inputbox" />*
                <br />
                <span class="description">Use "." as separator. For example 4.7</span>
            </label>
        </div>

        <div class="lineinput">
            <label>
                Engine:<br />
                <input name="engine" id="engine" value="" type="text" class="inputbox" />*
                <br />
                <span class="description">Use "." as separator. For example 1.4</span>
            </label>
        </div>

        <div class="lineinput">
            <label>
                Max power:<br />
                <input name="maxpower" id="maxpower" value="" type="text" class="inputbox" />*
            </label>
        </div>

        <div class="lineinput">
            <label>
                Max speed:<br />
                <input name="maxspeed" id="maxspeed" value="" type="text" class="inputbox" />*

                <br />
                <span class="description">km/h</span>
            </label>
        </div>

        <div class="lineinput">
            <label>
                Equipment<br />
                <textarea id="equipment" name="equipment" class="inputbox" rows="5" cols="40"></textarea>
            </label>
        </div>

        <div class="lineinput" style="margin-top: 20px;">
            <label>
                <input type="submit" value="Add Car" class="button-primary" id="addcar" />
            </label>
        </div>

    </form>
</div>