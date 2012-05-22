<div class="box"> 
    <div id="exc_searchbox">
        <div id="searchtop"></div>
        <div id="searchContents">
            <div class="sp_title">
                <img alt="Soho Group" src="<?=base_url()?>assets/img/logo.jpg" style="padding-left: 10px;">
            </div>
            <br>
            <label for="eb_freetext">Free text:</label>
            <br>
            <input type="text" id="eb_freetext" name="eb_freetext" style="width: 177px; margin-bottom: 6px; border:1px solid #C0C0C0; color:#000080;"/> <br class="clearing" />

            <label for="exc_sort">Sort by:</label>
            <br>
            <select id="exc_sort" name="exc_sort" style="width: 180px; margin-top: 5px;">
                <option value="none">None</option>
                <option value="name">Name</option>
                <option value="price">Price</option>
            </select>

            <div class="s_btn">
                <div class="atlas_btn">
                    <a href="javascript:void(0)" id="exc_clear">Clear</a>
                </div>

                <div class="atlas_btn">
                    <a href="javascript:void(0)" id="exc_submit">Search</a>
                </div>
            </div>     
            
        </div>
        <div id="searchBottom"></div>
        <!--<div id="wba-winner">   
            <img alt="WBA Winner" src="http://www.globtourmontenegro.com/assets/img/page_menu/en/wba-award.gif">     
        </div>-->
    </div>
</div>