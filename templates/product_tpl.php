<div class="row">
<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){	?>
    <div class="col-lg-3 col-sm-3 col-6 mb-30">
        <div class="item item_sanpham">
            <div class="item_img hover_sang border_vien">
                <a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html">
                  <img src="thumb/480x320x1x90/<?=_upload_sanpham_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>"  onError="this.src='http://placehold.it/400x400';"  />
                </a>
                
            </div>
            <h3 class="item_name">
              <a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten']?></a>
            </h3>
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
                }
              ?>
            </div>
            <?php /* ?><div class="item_button">
                <div class="cart">
                    <button class="add-cart active" onclick="return addCart1(<?=$product[$i]['id']?>,'<?=$product[$i]['ten']?>')" data-id="<?=$product[$i]['id']?>" data-name="<?=$product[$i]['ten']?>">
                        <i class="fa fa-cart-plus"></i><span class="mobi_none"> <?=_themvaogio?></span>
                    </button> 
                </div>
            </div><?php */ ?>
        </div><!---END .item-->
    </div><!---END .col-->
<?php } ?>
</div><!---END row-->
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="mb-30"></div>
