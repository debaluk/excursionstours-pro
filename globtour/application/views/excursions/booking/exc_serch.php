<div class="box"> 
    <div id="exc_searchbox">
        <div id="searchtop"></div>
        <div id="searchContents">
            <div class="sp_title">
                <img alt="Globtour Montenegro" src="<?=base_url()?>assets/img/logo.jpg" style="padding-left: 10px;">
            </div>
            <br>
            <label for="eb_starting"><?=$langs['sel_weekday'];?>:</label>
            <br>
            <select id="eb_starting" style="width: 180px; margin-top: 5px;">

                <option selected="selected" value="Any"><?=$langs['week_any'];?></option>
                
                <option value="Monday"><?=$langs['week_days'][0]?></option>
                <option value="Tuesday"><?=$langs['week_days'][1]?></option>
                <option value="Wednesday"><?=$langs['week_days'][2]?></option>
                <option value="Thursday"><?=$langs['week_days'][3]?></option>
                <option value="Friday"><?=$langs['week_days'][4]?></option>
                <option value="Saturday"><?=$langs['week_days'][5]?></option>
                <option value="Sunday"><?=$langs['week_days'][6]?></option>
                

            </select>   
            <br class="clearing" />

            <label for="eb_freetext"><?=$langs['free_text'];?>:</label>
            <br>
            <input type="text" id="eb_freetext" name="eb_freetext" style="width: 177px; margin-bottom: 6px; border:1px solid #C0C0C0;"/> <br class="clearing" />

            <label for="exc_sort"><?=$langs['sort_by'];?>:</label>
            <br>
            <select id="exc_sort" name="exc_sort" style="width: 180px; margin-top: 5px;">
                <option value="none"><?=$langs['none'];?></option>
                <option value="name"><?=$langs['name'];?></option>
                <option value="price"><?=$langs['price'];?></option>
            </select>

            <div class="s_btn">
                <div class="atlas_btn">
                    <a href="javascript:void(0)" id="exc_clear"><?=$langs['clear'];?></a>
                </div>

                <div class="atlas_btn">
                    <a href="javascript:void(0)" id="exc_submit"><?=$langs['search'];?></a>
                </div>
            </div>     

        </div>
        
        <div id="searchBottom"></div>

    </div>
</div>