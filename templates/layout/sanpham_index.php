<?php 

$d->reset();
$sql="select ten$lang as ten,mota$lang as mota, tenkhongdau, photo from #_product where hienthi=1 and type='san-pham' and noibat=1  order by stt,id,ngaytao desc limit 0,12";
$d->query($sql);
$product = $d->result_array();
 ?>
<div class="w_sanpham">
	<div class="container">
		<div class="tieude_gc mb-40">
			<span>Sản Phẩm Của Chúng Tôi</span>

		</div>
<p class="sub_tieude_gc">Chúng tôi cung cấp nhiều sản phẩm với mẫu mã đa dạng</p>
<div class="row">
<?php for($i=0,$count=count($product);$i<$count;$i++){	?>
    <div class="col-lg-3 col-sm-3 col-6 mb-30">
        <div class="item item_sanpham">
            <div class="item_img hover_sang border_vien">
                <a href="san-pham/<?=$product[$i]['tenkhongdau']?>.html">
                  <img src="thumb/400x400x1x90/<?=_upload_sanpham_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>"/>
                </a>
                
            </div>
            <h3 class="item_name">
              <a href="san-pham/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten']?></a>
            </h3>
            <div class="item_gia">
              <?php
               	if($product[$i]['giakm']!=0){
               		echo '<span class="del-gia">'.number_format($product[$i]['gia'],0, ',', '.').'<sup>đ</sup> / <span>Kg</span></span>';
               		echo '<span class="gia-ban">'.number_format($product[$i]['giakm'],0, ',', '.').'<sup>đ</sup></span> / <span class="txt_xanh">Kg</span>';
               	}else{
               		if($product[$i]['gia']!=0){
               			echo '<span class="gia-ban">'.number_format($product[$i]['gia'],0, ',', '.').'<sup>đ</sup></span> / <span class="txt_xanh">Kg</span>';
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
<div id="btn_xemthem">
   <div class="btn_xemthem-click"><a href="san-pham.html"><button>Xem thêm >> </button></a></div></div> 
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="mb-30"></div>
