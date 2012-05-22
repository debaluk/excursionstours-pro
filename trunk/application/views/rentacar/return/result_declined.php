<div class="web_txt_web_col1">
    <h1 style="margin-left: 19px;"><img src="<?=base_url();?>assets/img/content/h1/online-booking.gif" alt="Online Booking"/></h1>
    <div id="content" class="content">
        <div class="web-content">
            <div id="content-top" style="min-height: 300px;">
                <script type="text/javascript" charset="utf-8" src="<?=base_url()?>assets/js/book.result_fail.js"></script>      
                <div id="rent_div_" style="margin-left: 22px; margin-right: 0px;">
                    <p>
                        Dear Sir or Madam, <br /><br />

                        Your reservation is <b>not</b> successfully recorded and confirmed by the agency.<br /><br />

                        <!-- Result from informacionisistem.com -->

                        <div class="booking_result" style="width: 600px; height: 60px;">
                            <table width="100%" cellpadding="0" cellspacing="0" class="finish-table">
                                <thead>
                                    <tr>
                                        <td>Credit Card Processing</td>
                                        <td style="text-align: center;">Code</td>
                                        <td style="text-align: center;">Response No</td>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    <tr>
                                        <td><b><?=$trans->result?></b></td>
                                        <td style="text-align: center;"><?=$trans->result_code?></td>
                                        <td style="text-align: center;"><?=$trans->card_number?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td style="text-align:center;">Processing:</td>
                                        <td style="text-align: center;"><b><?=$trans->result?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br /> <br /> 
                        Please contact Globtour Montenegro.<br /> <br /> 
                    </p>
                    <p>
                        Globtour Montenegro 85 310 Budva, Dositejeva 4 <br />
                        Mail: info@globtour.me                         <br />
                        Web: http://www.globtourmontenegro.com         <br />
                        Tel: + 382 33 451-020, 455-683                 <br />
                        Fax: +382 33 452-827                           <br />
                        Mob-tel: + 382 69 322 226; 69 333 564          <br />
                    </p>

                </div>
                <div style="height: 150px;"></div>
            </div>
        </div>
    </div>
</div>
