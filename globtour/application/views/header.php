
<script type="text/javascript">
    $(document).ready(function() {

            function relaod_page(data){
                if(data)
                    window.location.reload();
            }

            $('.change_lang').live('click',function(){
                    /*console.log($(this).attr('rel'));*/
                    $.ajax({
                            url:base_url+'reservation/change_lang',
                            dataType:'JSON',
                            type:'POST',
                            data:{'lang':$(this).attr('rel')},
                            success: relaod_page,
                            error:function(xhr, textStatus, errorThrown){ alert('Error:'+xhr+':'+textStatus+':'+errorThrown)}
                    })
            })

    });
</script>

<!--<div id="system-slogan">
<img alt="IT Montenegro" src="<?=base_url()?>assets/img/system-logo.png" />
</div>
-->
<div id="langs">
    <ul>
        <li><a href="javascript:" class="change_lang" rel="en"><img src="<?=$url;?>assets/img/flags/en.png" alt="English" title="English" /></a></li>
        <li><a href="javascript:" class="change_lang" rel="me"><img src="<?=$url;?>assets/img/flags/me.png" alt="Crnogorski" title="Crnogorski" /></a></li>
        <li><a href="javascript:" class="change_lang" rel="de"><img src="<?=$url;?>assets/img/flags/de.png" alt="Deutsch" title="Deutsch" /></a></li>
        <li><a href="javascript:" class="change_lang" rel="cz"><img src="<?=$url;?>assets/img/flags/cz.png" alt="Český" title="Český" /></a></li>
        <li><a href="javascript:" class="change_lang" rel="ru"><img src="<?=$url;?>assets/img/flags/ru.png" alt="Rусский" title="Rусский" /></a></li>
        <li><a href="javascript:" class="change_lang" rel="sl"><img src="<?=$url;?>assets/img/flags/sl.png" alt="Slovenski" title="Slovenski" /></a></li>
        <li><a href="javascript:" class="change_lang" rel="cn"><img src="<?=$url;?>assets/img/flags/cn.png" alt="中国的" title="中国的" /></a></li>
    </ul>
</div>   
<div id="logo">
    <a href="<?=base_url()?>">
        <img alt="Sohotravel Montenegro" src="<?=base_url()?>assets/img/logo.jpg" />
    </a>
    <?echo $language?>
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
        </li> -->

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