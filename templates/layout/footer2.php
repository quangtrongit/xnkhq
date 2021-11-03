<?php   

    

    $d->reset();
    $sql = "select photo from #_background where type='bg-footer2'";
    $d->query($sql);
    $bg_footer = $d->fetch_array(); 

    $d->reset();
    $sql = "select ten$lang as ten, noidung$lang as noidung from #_about where type='text-footer' limit 0,1";
    $d->query($sql);
    $text_footer = $d->fetch_array();

    $d->reset();
    $sql="select ten$lang as ten,mota$lang as mota from #_slider where type='showroom' and hienthi=1 order by stt,id desc"; 
    $d->query($sql);
    $ar_showroom=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,mota$lang as mota from #_slider where type='hotline' and hienthi=1 order by stt,id desc"; 
    $d->query($sql);
    $ar_hotline=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,mota$lang as mota from #_slider where type='xuong-sx' and hienthi=1 order by stt,id desc"; 
    $d->query($sql);
    $ar_xuongsx=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,link,id,photo from #_slider where hienthi=1 and type='social' order by stt,id desc";
    $d->query($sql);
    $social=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,tenkhongdau,id from #_news where type='ho-tro-khach-hang' and hienthi=1 and noibat=1 order by stt,id desc"; 
    $d->query($sql);
    $hotrokh=$d->result_array();
?>
<div id="w_footer" style="background-image:background.php">
    <div id="footer" >
        <div class="container">

            <div class="row">
               <div class="col-lg-4 col-md-4 col-12">
                    <div class="tt_footer2" data-duration="1s">
                        <?=$text_footer['ten']?>
                        <span class="chan_footer"></span> 
                    </div>
                    <div class="wow fadeIn" data-duration="1s">
                       <?=$text_footer['noidung']?>
                    </div>
                    <div class="nd_footer">
                        <?php foreach($ar_hotline as $val){ ?>
                        <div class="list_vertical" data-duration="1s"><i class="fa fa-phone"></i>&nbsp;&nbsp;<span><?=$val['ten'] ?>: <?=$val['mota']?></span></div>
                        <?php } ?>
                    </div>

                    <?php /* ?><div id="social_footer2" class="wow fadeIn" data-duration="1s">
                        <?php foreach($social as $k=>$v){?>
                          <a href="<?=$v['link']?>" title="<?=$v['ten']?>"><img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>"></a>
                      <?php }?>
                    </div> <?php */ ?>
                </div>
               <!-- <div class="col-lg-6 col-md-5 col-12">
                    <div class="tt_footer2" data-duration="1s">
                        Chính Sách Mua Hàng
                        <span class="chan_footer"></span> 
                    </div>
                    <div class="nd_footer">
                        <?php foreach($ar_showroom as $val){ ?>
                        <div class="list_vertical" data-duration="1s"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<span><?=$val['ten'] ?>: <?=$val['mota']?></span></div>
                        <?php } ?>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tt_footer2" data-duration="1s">
                        Chính Sách Mua Hàng
                        <span class="chan_footer"></span> 
                    </div>
                    <div class="nd_footer">
                        <?php foreach($hotrokh as $k => $v){ ?>
                        <div class="list_vertical" data-duration="1s"><a href="ho-tro-khach-hang/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tt_footer2" data-duration="1s">
                        Kết Nối Với Chúng Tôi
                        <span class="chan_footer"></span> 
                    </div>
                    <div class="nd_footer">
                        <?php foreach($ar_hotline as $val){ ?>
                        <div class="list_vertical" data-duration="1s"><i class="fa fa-phone"></i>&nbsp;&nbsp;<span><?=$val['ten'] ?>: <?=$val['mota']?></span></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>  
    </div><!---END #footer-->    
    <div class="div_footer_bottom">
        <div class="container">
             <div class="footer_bottom">
                 <div class="text-copy">Copyright 2020 by <span> Công Ty THHH Thương Mại Dịch Vụ Xuất Nhập Khẩu Hoa Quả Sơn</span>. All rights reserved.</div>
                 <!-- <ul>
                    <?php foreach ($hotrokh as $k => $v) {?>
                        <li><a href="ho-tro-khach-hang/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></li>
                    <?php }?>
                </ul> -->
             </div>
         </div>
    </div>
</div>


