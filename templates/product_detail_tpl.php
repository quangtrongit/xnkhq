<div class="box_container">
    <div class="div_info_product">
         <div class="zoom_slick">
            <a href="<?=_upload_sanpham_l.$row_detail['photo'];?>" id="img_product" class="MagicZoom" data-options="expandZoomMode: off;">
                <img src="<?=_upload_sanpham_l.$row_detail['photo'];?>">
            </a>
            <div class="mini_img_product" id="sl_hinhthem">
                <?php $count=count($hinhthem); if($count>0) {?>
                    <a data-zoom-id="img_product" href="<?=_upload_sanpham_l.$row_detail['photo'];?>" data-image="<?=_upload_sanpham_l.$row_detail['photo'];?>">
                        <img src="thumb/120x150x1x90/<?=_upload_sanpham_l.$row_detail['photo'];?>" alt="<?=$row_detail['ten']?>">
                    </a>
                    <?php for($j=0,$count_hinhthem=count($hinhthem);$j<$count_hinhthem;$j++){?>
                    <a data-zoom-id="img_product" href="<?=_upload_hinhthem_l.$hinhthem[$j]['photo'];?>" data-image="<?=_upload_hinhthem_l.$hinhthem[$j]['photo'];?>">
                        <img src="thumb/120x150x1x90/<?=_upload_hinhthem_l.$hinhthem[$j]['photo'];?>" alt="<?=$row_detail[$j]['ten']?>" />
                    </a>
                    <?php } ?> 
                <?php } ?>
            </div>
        </div>
        <ul class="info_product">
                <li class="my-flex-between no-border-bottom"><h2 class="tieude_detail"><?=$row_detail['ten']?></h2></li>

                 <?php if($row_detail['masp'] != '') { ?>
                    <li class="my-flex-between">
                        <span><?=_masanpham?>:</span>
                         <span><b><?=$row_detail['masp']?></b></span>
                    </li>
                <?php } ?>
                <li class="my-flex-between">
                    <span>Giá bán:</span>
                    <span>
                        <?php  if($row_detail['giakm'] != 0) { ?>
                        
                            <b class="gia"><?=number_format($row_detail['gia'],0, ',', '.').'<sup>đ</sup> / <span>Tấm</span>';?></b> &nbsp;
                            <b class="giakm"><?php echo number_format($row_detail['giakm'],0, ',', '.').' <sup>đ</sup><span class="txt_xanh"> / Tấm</span>'; ?></b>
                            <?php } else { ?>
                            <b class="motgia"><?php if($row_detail['gia'] != 0){echo number_format($row_detail['gia'],0, ',', '.').'<sup>đ</sup><span class="txt_xanh"> / Tấm</span>';} else { echo _lienhe;} ?></b>
                        
                         <?php } ?>
                     </span>
                </li>
                

                 <?php if($row_detail['mota'] != '') { ?>
                    <li ><?=nl2br($row_detail['mota'])?></li>
                <?php } ?>
                 <li class="my-flex-between"><span><?=_luotxem?>:</span> <span><?=$row_detail['luotxem']?></span></li>
                
                <li class="no-border-bottom">
                    <p><b><?=_soluong?>:</b></p>
                    <div class="product-qty">
                        <div >
                          <div class="controls">
                              <button class="fa fa-minus"></button>
                                <input type="text" value="1" readonly id="qty" />
                                <button class="fa fa-plus is-up"></button>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="cart">
                            <button class="add-cart" id="add-cart" data-id="<?=$row_detail['id']?>" data-name="<?=$row_detail['ten']?>" onclick="return addCart()">
                                <i class="fa fa-cart-plus"></i>
                                <span> <?=_themvaogiohang?></span>
                            </button>  
                        </div>
                    </div>
                 </li>
                  <li class="no-border-bottom">
                     <?php 
                        $d->reset();
                        $sql = "select noidung$lang as noidung from #_about where type='text-khuyenmai' limit 0,1";
                        $d->query($sql);
                        $text_khuyenmai = $d->fetch_array();
                         ?>
                        <div class="text_khuyenmai"><?=$text_khuyenmai['noidung']?></div>
                 </li>
                 <li class="no-border-bottom">
                     <a href="gio-hang.html" class="btn-mua-ngay" onclick="return addCart()">
                         <span>Mua ngay sản phẩm này</span>
                         <span style="text-transform: initial;font-weight: 400">Giao hàng tận nơi trong nội thành</span>
                     </a>
                     <div class="a_baogia">
                        <a href="tel:<?=$company['dienthoai']?>" class="goingay" target="_blank"><span>Bấm gọi ngay:</span> <span><?=$company['dienthoai']?></span></a>
                        <a href="<?=$company['zalo']?>" class="goingay" target="_blank">Chat Zalo báo giá</a>
                     </div>
                     
                 </li>
                 <div class="addthis_native_toolbox"></div>
        </ul>
    </div><!--.wap_pro-->
    <div id="tabs">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" href="#tab0" data-toggle="tab">Thông tin sản phẩm</a></li>
           <?php /* ?> <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab"><?=_danhgia?></a></li><?php */ ?>
        </ul>
        <div class="tab-content">
            <div class="content tab-pane fade show active" id="tab0">
                <?=$row_detail['noidung']?>
            </div>
            <?php /* ?><div class="content tab-pane fade" id="tab3">
                <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-numposts="5" data-width="100%"></div>
            </div><?php */ ?>
        </div><!---END #content_tabs-->
    </div><!---END #tabs-->
</div><!--.box_containerlienhe-->
<br />
<?php if(count($product)>0) { ?>
<div class="tieude_gc mb-30" ><span><?=_sanphamcungloai?></span></div>
<div class="row">
    <?php for($i=0,$count_product=count($product);$i<$count_product;$i++){ ?>
    <div class="col-lg-4 col-sm-4 col-12 mb-30">
        <div class="item item_sanpham">
            <div class="item_img hover_sang border_vien">
                <a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html">
                    <img src="<?=_upload_sanpham_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>"  onError="this.src='http://placehold.it/400x400';"  />
                </a>
            </div>
            <h3 class="item_name"><a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten']?></a></h3>
            <div class="item_gia">
                 <?php 
                if($product[$i]['giakm']!=0){
                    echo '<span class="del-gia">'.number_format($product[$i]['gia'],0, ',', '.').'<sup>đ</sup> / <span>Tấm</span></span>';
                    echo '<span class="gia-ban">'.number_format($product[$i]['giakm'],0, ',', '.').'<sup>đ</sup></span> / <span class="txt_xanh">Tấm</span>';
                }else{ 
                    if($product[$i]['gia']!=0){
                        echo '<span class="gia-ban">'.number_format($product[$i]['gia'],0, ',', '.').'<sup>đ</sup></span> / <span class="txt_xanh">Tấm</span>';
                    }else{
                        echo '<a href="lien-he.html" class="gia-ban">'._lienhe.'</a>';
                    }
                }?>
            </div>
            <?php /* ?><div class="item_button">
                <div class="cart">
                    <button class="add-cart active" onclick="return addCart1(<?=$product[$i]['id']?>,'<?=$product[$i]['ten']?>')" data-id="<?=$product[$i]['id']?>" data-name="<?=$product[$i]['ten']?>">
                        <i class="fa fa-cart-plus"></i><span class="mobi_none"> <?=_themvaogio?></span>
                    </button> 
                </div>
            </div><?php */ ?>
          </div><!---END .item-->
    </div>
    <?php } ?>
</div><!---END .wap_item-->
<?php } ?>
<div class="mb-30"></div>