
<!--<div id="system-slogan">
    <img alt="IT Montenegro" src="<?=base_url()?>assets/img/system-logo.png" />
</div>
          -->
<div id="langs">
    <ul>
        <li><a href="javascript:" rel="me"><img alt="ME" src="<?=base_url()?>assets/img/flags/me.png" /></a></li>
        <li><a href="javascript:" rel="en"><img alt="EN" src="<?=base_url()?>assets/img/flags/en.png" /></a></li>
        <li><a href="javascript:" rel="ru"><img alt="RU" src="<?=base_url()?>assets/img/flags/ru.png" /></a></li>
        <li><a href="javascript:" rel="fr"><img alt="FR" src="<?=base_url()?>assets/img/flags/fr.png" /></a></li>
        <li><a href="javascript:" rel="al"><img alt="Al" src="<?=base_url()?>assets/img/flags/al.png" /></a></li>
    </ul>
</div>   
<div id="logo" style="height: 73px;">
    <a href="<?=base_url()?>" style="padding-top: 13px;">
        <img alt="IT Montenegro" src="<?=base_url()?>assets/img/it-montenegro.png" />
    </a>
    <?//$language?>
</div>

<div id="myslidemenu" class="jqueryslidemenu">
    <ul class="clearfix">

        <li><a style="padding: 8px 13px 7px 13px " href="<?=base_url()?>reservation/view_all_reservations"><img src="<?=$url?>assets/img/icons/light/house.png" /></a></li>
        
        <li><a href="<?=base_url()?>reservation/view_all_reservations"><span>Bookings</span></a>
            <ul>
                <li><a href="<?=base_url()?>reservation/view_all_reservations"><span>All Bookings</span></a></li>
                <li><a href="<?=base_url()?>reservation/view_finish_reservations" class="last"><span>Completed Bookings</span></a></li>
            </ul>
        </li>

        <li><a href="<?=base_url()?>car/view_all_cars"><span>Cars</span></a>
            <ul>
                <li><a href="<?=base_url()?>car/view_all_cars"><span>All Cars</span></a></li>
                <li ><a href="<?=base_url()?>car/view_new_car" class="last"><span>Add Car</span></a></li>
            </ul>
        </li>

        <li><a href="<?=base_url()?>gallery/view_all_galleries"><span>Gallery</span></a>
            <ul>
                <li ><a href="<?=base_url()?>gallery/view_all_galleries"><span>All Galleries</span></a></li>
                <li><a href="<?=base_url()?>gallery/view_new_gallery" class="last"><span>Add Gallery / Img + Vid</span></a></li>
            </ul>
        </li>
        
        <!--<li><a href="<?=base_url()?>settings/view_all_thimbnail_size">Settings</a>
            <ul>
                <li><a href="<?=base_url()?>settings/view_all_thimbnail_size">Thumbnail size</a>
                    <ul>
                        <li><a href="<?=base_url()?>settings/view_all_thimbnail_size">All Sizes</a></li>
                        <li><a href="<?=base_url()?>settings/view_add_thimbnail_size" class="last">Add Size</a></li>
                    </ul>
                </li>

            </ul>
        </li>-->
        
        <li><a href="<?=base_url()?>rentacar"><span>Online Booking</span></a></li>

        <li><a href="<?=base_url()?>transactions/view_all_transactions" class="last"><span>Transactions</span></a>
            <ul>
                    <li><a href="<?=base_url()?>transactions/confirm_cbd" class="last"><span>Close Business Day</span> </a></li>
            </ul>
        </li> 
        
        <li><a href="javascript:" class="last"><span></span><?=$this->session->userdata('name')?></a>
            <ul>
                <li><a href="<?=base_url();?>login/logout" class="last">logut</a></li>
            </ul>
        </li>  

    </ul>      
</div>