
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
<div id="logo">
    <a href="<?=base_url()?>">
        <img alt="Sohotravel Montenegro" src="<?=base_url()?>assets/img/logo.jpg" />
    </a>
    <?//$language?>
</div>

<div id="myslidemenu" class="jqueryslidemenu">
    <ul class="clearfix">

        <li><a style="padding: 8px 13px 7px 13px " href="<?=base_url()?>reservation/view_all_reservations"><img src="<?=$url?>assets/img/icons/light/house.png" /></a></li>

         <li><a href="<?=base_url()?>excursions/booking">Book Excursion</a></li>
        <li><a href="<?=base_url()?>tours/booking">Book Tours</a></li> 
        <li><a href="<?=base_url()?>excursions/excursions/views">Excursions</a>
            <ul>
                <li><a href="<?=base_url()?>excursions/excursions/views">View</a></li>
                <li><a href="<?=base_url()?>excursions/excursions/add">Add</a></li>
            </ul>
        </li>
        <li><a href="<?=base_url()?>tours/tours/views">Tours</a>
            <ul>
                <li><a href="<?=base_url()?>tours/tours/views">View</a></li>
                <li><a href="<?=base_url()?>tours/tours/add">Add</a></li>
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