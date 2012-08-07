
<? foreach($book_infos as $info){?>
    <!--CHECK OUT CUSTOMER-->
    <div class="check_out">
        <form method="post" name="customer" id="customer">
            <input type="hidden" value="<?=$info['excid']?>" name="excid" />
            <input type="hidden" value="<?=$info['noadult']?>" name="noadult" />
            <input type="hidden" value="<?=$info['noch']?>" name="noch" />
            <input type="hidden" value="<?=$info['persons']?>" name="persons" />
            <input type="hidden" value="<?=$info['adultprice']?>" name="adultprice" />
            <input type="hidden" value="<?=$info['chprice']?>" name="chprice" />
            <input type="hidden" value="<?=$info['totalprice']?>" name="totalprice" />
            <input type="hidden" value="<?=$info['date']?>" name="date" />
            <input type="hidden" value="<?=$info['pickup_location']?>" name="pickup_location" />

            <!--TRAVELER DETAILS-->
            <div class="traveler_details">
                <h2><?=$langs['traveler_details'];?></h2>
                <div id="infomessage" style="display: none;"></div>
                <p class="label_header">                           
                    <label class="traveler_title" for="traveler_title"><?=$langs['title'];?></label>
                    <label class="traveler_firstname" for="traveler_firstname"><?=$langs['first_name'];?></label>
                    <label class="traveler_lastname" for="traveler_lastname"><?=$langs['last_name'];?></label>
                </p>
                <div class="traveler_list">
                    <!-- do adults first -->                              
                    <? for ($i=1; $i<=$info['noadult']; $i++){?>                   
                        <p class="alt" <? if ($i==1)echo 'style="border-top:1px dotted #f5c79f;"'?>>  <!--STYLE FIX :)-->
                            <span class="traveler_index">
                                <label class="required" for="traveler_firstname<?=$i;?>>" style="<? if($i!=1)echo 'background:none'; ?>">
                                    <em>*</em> <?=$langs['traveler'];?> <?=$i;?> (<?=$langs['adult'];?>)
                                </label>                                        
                            </span>
                            <select name="a_title<?=$i;?>" id="a_title<?=$i;?>" class="traveler_title">                                    
                                <option value="Mr">Mr</option>                                   
                                <option value="Mrs">Mrs</option>                           
                                <option value="Ms">Ms</option>                              
                                <option value="Miss">Miss</option>                                
                                <option value="Mstr">Mstr</option>                            
                            </select>
                            <input type="text"  name="a_firstName<?=$i;?>" maxlength="30" class="traveler_firstname iconname" id="a_firstName<?=$i;?>" value="" />
                            <input type="text"  name="a_lastName<?=$i;?>" maxlength="30" class="traveler_firstname pad_text_left" id="a_lastName<?=$i;?>" value="" />
                        </p>
                        <?}?>
                    <!-- do child second -->
                    <? for ($j=1; $j<=$info['noch']; $j++){?>
                        <p class="alt">
                            <span class="traveler_index">
                                <label class="required" for="traveler_firstname<?=$i;?>>" style="background: none;">
                                    <em>*</em> <?=$langs['traveler'];?> <?=$i+$j;?> (<?=$langs['child'];?>)
                                </label>                                        
                            </span>
                            <select name="c_title<?=$i;?>" id="c_title<?=$i;?>" class="traveler_title">                                    
                                <option value="Mr">Mr</option>                                   
                                <option value="Mrs">Mrs</option>                           
                                <option value="Ms">Ms</option>                              
                                <option value="Miss">Miss</option>                                
                                <option value="Mstr">Mstr</option>                            
                            </select>
                            <input type="text"  name="c_firstName<?=$i;?>" maxlength="30" class="traveler_firstname" id="c_firstName<?=$i;?>" value="" style="width: 185px;" />
                            <input type="text"  name="c_lastName<?=$i;?>" maxlength="30" class="traveler_firstname pad_text_left" id="c_lastName<?=$i;?>" value="" />
                        </p>
                        <?}?>        
                </div><!-- end of traveler_list -->
            </div><!-- end of traveler_details -->

            <!--CONTACT DETAILS-->
            <div class="contact_details">
                <h2><?=$langs['contact_details'];?></h2>
                <p>
                    <label class="email_address required" for="email_address"><em>*</em> <?=$langs['email'];?></label>
                    <input type="text" value="" name="email" class="email_address iconemail" id="email_address" style="width: 138px;">
                    <label class="verify_email_address required " for="verify_email_address"><em>*</em> <?=$langs['verify_email'];?></label>
                    <input type="text" value="" name="email1" class="verify_email_address pad_text_left" id="verify_email_address" style="width: 138px;">
                </p>

                <p style="margin: 0 0 0 11px">
                    <label class="phone" for="phone" style="padding-right: 2px;">Kontakt telefon</label>
                    <input type="text" value="" name="phone" class="phone" id="phone" style="width: 161px;">
                </p>

                <!--NOTE BOX-->
                <div class="note_box">
                    <div class="note_body">

                        <div class="right_note">
                            <ul>
                                <li style="color: #848484;"><?=$langs['globtour_montenegro_will_never_sell'];?></li>
                            </ul>
                        </div>
                        <div class="left_note">
                            <strong class="note_title"><?=$langs['please_note'];?>:</strong>
                        </div>
                        <br class="clearing" /> 
                    </div>
                </div>

            </div>

            <!--BOOK NOW-->
            <div style="float: right; margin: 20px 0 0 0">
                <div class="atlas_btn_big" style="margin-right:0;">
                    <a href="javascript:void(0)" id="book_now"><?=$langs['book_now'];?></a>
                </div>
                <br class="clearing" /> 
            </div>

        </form> 
    </div>
    <?}?>