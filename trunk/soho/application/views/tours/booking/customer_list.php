
<? foreach($book_infos as $info){?>
    <!--CHECK OUT CUSTOMER-->
    <div class="check_out">
        <form method="post" name="customer" id="customer">
            <input type="hidden" value="<?=$info['tid']?>" name="tid" />
            <input type="hidden" value="<?=$info['noadult']?>" name="noadult" />
            <input type="hidden" value="<?=$info['noch']?>" name="noch" />
            <input type="hidden" value="<?=$info['persons']?>" name="persons" />
            <input type="hidden" value="<?=$info['adultprice']?>" name="adultprice" />
            <input type="hidden" value="<?=$info['chprice']?>" name="chprice" />
            <input type="hidden" value="<?=$info['totalprice']?>" name="totalprice" />
            <input type="hidden" value="<?=$info['date']?>" name="date" />

            <!--TRAVELER DETAILS-->
            <div class="traveler_details">
                <h2>Traveler Details</h2>
                <div id="infomessage" style="display: none;"></div>
                <p class="label_header">                           
                    <label class="traveler_title" for="traveler_title">Title</label>
                    <label class="traveler_firstname" for="traveler_firstname">First Name / Given Name</label>
                    <label class="traveler_lastname" for="traveler_lastname">Last Name / Family Name</label>
                </p>
                <div class="traveler_list">
                    <!-- do adults first -->                              
                    <? for ($i=1; $i<=$info['noadult']; $i++){?>                   
                        <p class="alt" <? if ($i==1)echo 'style="border-top:1px dotted #f5c79f;"'?>>  <!--STYLE FIX :)-->
                            <span class="traveler_index">
                                <label class="required" for="traveler_firstname<?=$i;?>>" style="<? if($i!=1)echo 'background:none'; ?>">
                                    <em>*</em> Traveler <?=$i;?> (Adult)
                                </label>                                        
                            </span>
                            <select name="a_title<?=$i;?>" id="a_title<?=$i;?>" class="traveler_title">                                    
                                <option value="Mr">Mr</option>                                   
                                <option value="Mrs">Mrs</option>                           
                                <option value="Ms">Ms</option>                              
                                <option value="Miss">Miss</option>                                
                                <option value="Mstr">Mstr</option>                            
                            </select>
                            <input type="text"  name="a_firstName<?=$i;?>" maxlength="30" class="traveler_firstname pad_text_left" id="a_firstName<?=$i;?>" value="" />
                            <input type="text"  name="a_lastName<?=$i;?>" maxlength="30" class="traveler_firstname pad_text_left" id="a_lastName<?=$i;?>" value="" />
                        </p>
                        <?}?>
                    <!-- do child second -->
                    <? for ($j=1; $j<=$info['noch']; $j++){?>
                        <p class="alt">
                            <span class="traveler_index">
                                <label class="required" for="traveler_firstname<?=$i;?>>" style="background: none;">
                                    <em>*</em> Traveler <?=$i+$j;?> (Child)
                                </label>                                        
                            </span>
                            <select name="c_title<?=$i;?>" id="c_title<?=$i;?>" class="traveler_title">                                    
                                <option value="Mr">Mr</option>                                   
                                <option value="Mrs">Mrs</option>                           
                                <option value="Ms">Ms</option>                              
                                <option value="Miss">Miss</option>                                
                                <option value="Mstr">Mstr</option>                            
                            </select>
                            <input type="text"  name="c_firstName<?=$i;?>" maxlength="30" class="traveler_firstname pad_text_left" id="c_firstName<?=$i;?>" value="" />
                            <input type="text"  name="c_lastName<?=$i;?>" maxlength="30" class="traveler_firstname pad_text_left" id="c_lastName<?=$i;?>" value="" />
                        </p>
                        <?}?>        
                </div><!-- end of traveler_list -->
            </div><!-- end of traveler_details -->

            <!--CONTACT DETAILS-->
            <div class="contact_details">
                <h2>Contact Details</h2>
                <p>
                    <label class="email_address required" for="email_address"><em>*</em> Email address</label>
                    <input type="text" value="" name="email" class="email_address pad_text_left" id="email_address" style="width: 138px;">
                    <label class="verify_email_address required " for="verify_email_address"><em>*</em> Verify email address</label>
                    <input type="text" value="" name="email1" class="verify_email_address pad_text_left" id="verify_email_address" style="width: 138px;">
                </p>

                <!--NOTE BOX-->
                <div class="note_box">
                    <div class="note_body">

                        <div class="right_note">
                            <ul>
                                <li style="color: #848484;">SOHO Group - Montenegro will never sell, share or distribute your personal information.</li>
                            </ul>
                        </div>
                        <div class="left_note">
                            <strong class="note_title">Please note:</strong>
                        </div>
                        <br class="clearing" /> 
                    </div>
                </div>

            </div>

            <!--BOOK NOW-->
            <div style="float: right; margin: 20px 0 0 0">
                <div class="atlas_btn_big" style="margin-right:0;">
                    <a href="javascript:void(0)" id="book_now">Book Now</a>
                </div>
                <br class="clearing" /> 
            </div>

        </form> 
    </div>
    <?}?>